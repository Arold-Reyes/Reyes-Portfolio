import Alpine from 'alpinejs';
import './constellation';

window.Alpine = Alpine;

// Theme management
Alpine.store('theme', {
    dark: document.documentElement.classList.contains('dark'),
    _timer: null,

    _apply(dark) {
        const root = document.documentElement;
        // Briefly enable cross-fade transitions only for the switch moment
        root.classList.add('theme-switching');
        clearTimeout(this._timer);
        this._timer = setTimeout(() => root.classList.remove('theme-switching'), 400);
        this.dark = dark;
        root.classList.remove('light', 'dark');
        root.classList.add(dark ? 'dark' : 'light');
    },

    init() {
        // Keep store in sync with whatever the anti-FOUC inline script applied
        this.dark = document.documentElement.classList.contains('dark');

        // Live OS preference listener — only applies when user hasn't chosen explicitly
        const mql = window.matchMedia('(prefers-color-scheme: dark)');
        const handler = (e) => {
            if (!localStorage.getItem('theme')) this._apply(e.matches);
        };
        mql.addEventListener('change', handler);
    },

    toggle() {
        this._apply(!this.dark);
        localStorage.setItem('theme', this.dark ? 'dark' : 'light');
    }
});

// Mobile menu store
Alpine.store('menu', {
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    }
});

// Scroll-triggered reveal animations
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal:not(.is-visible)').forEach(el => {
        observer.observe(el);
    });
}

// Scroll spy: highlight active nav link based on section in view
function initScrollSpy() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    if (!sections.length || !navLinks.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const id = entry.target.getAttribute('id');
            navLinks.forEach(link => {
                const isActive = link.getAttribute('data-section') === id;
                link.classList.toggle('active-link', isActive);
            });
        });
    }, {
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0
    });

    sections.forEach(section => observer.observe(section));
}

// Smooth scrolling for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#') return;
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: elementPosition - headerOffset,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Contact form
Alpine.data('contactModal', () => ({
    open: false,
    sending: false,
    toastType: null,
    toastMessage: '',
    showToast: false,

    async submitForm(event) {
        event.preventDefault();

        this.toastType = 'warning';
        this.toastMessage = 'Ongoing process — this message feature is still under development.';
        this.showToast = true;

        setTimeout(() => {
            this.showToast = false;
        }, 3000);
    }
}));

// Certificate viewer modal
Alpine.data('certViewer', () => ({
    open: false,
    cert: null,
    zoomed: false,
    lastFocused: null,

    openModal(cert) {
        this.lastFocused = document.activeElement;
        this.cert = cert || null;
        this.zoomed = false;
        this.open = true;
        document.body.style.overflow = 'hidden';
        document.addEventListener('keydown', this.onKeydown);
        this.$nextTick(() => {
            const el = this.$refs.modal && this.$refs.modal.querySelector('[data-modal-focus]');
            if (el) el.focus();
        });
    },

    closeModal() {
        if (!this.open) return;
        this.open = false;
        document.body.style.overflow = '';
        document.removeEventListener('keydown', this.onKeydown);
        if (this.lastFocused) this.lastFocused.focus();
    },

    onKeydown(e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            this.closeModal();
            return;
        }
        // Basic focus trap: keep Tab cycling inside the modal
        if (e.key === 'Tab' && this.$refs.modal) {
            const focusables = this.$refs.modal.querySelectorAll(
                'button, [href], iframe, [tabindex]:not([tabindex="-1"])'
            );
            if (!focusables.length) return;
            const first = focusables[0];
            const last = focusables[focusables.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    },

    onBackdropClick(e) {
        if (e.target === e.currentTarget) this.closeModal();
    },

    toggleZoom() {
        this.zoomed = !this.zoomed;
    },

    hasPdf() {
        return this.cert && this.cert.pdfUrl;
    }
}));

// Project details / lightbox modal
Alpine.data('projectViewer', (projects = []) => ({
    open: false,
    project: null,
    currentImageIndex: 0,
    lastFocused: null,
    activeFilter: 'all',
    allProjects: projects,

    setFilter(key) {
        if (this.activeFilter === key) return;
        this.activeFilter = key;
    },

    isVisible(project) {
        return this.activeFilter === 'all' || project.group === this.activeFilter;
    },

    get filteredCount() {
        return this.activeFilter === 'all'
            ? this.allProjects.length
            : this.allProjects.filter(p => p.group === this.activeFilter).length;
    },

    get imageCount() {
        return this.project && Array.isArray(this.project.galleryImages)
            ? this.project.galleryImages.length
            : 0;
    },

    get hasImages() {
        return this.imageCount > 0;
    },

    get currentImage() {
        return this.hasImages ? this.project.galleryImages[this.currentImageIndex] : null;
    },

    openModal(project) {
        this.lastFocused = document.activeElement;
        this.project = project || null;
        this.currentImageIndex = 0;
        this.open = true;
        document.body.style.overflow = 'hidden';
        document.addEventListener('keydown', this.onKeydown);
        this.$nextTick(() => {
            const el = this.$refs.modal && this.$refs.modal.querySelector('[data-project-focus]');
            if (el) el.focus();
        });
    },

    closeModal() {
        if (!this.open) return;
        this.open = false;
        document.body.style.overflow = '';
        document.removeEventListener('keydown', this.onKeydown);
        if (this.lastFocused) this.lastFocused.focus();
    },

    onKeydown(e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            this.closeModal();
            return;
        }
        if (this.hasImages) {
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                this.nextImage();
                return;
            }
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                this.prevImage();
                return;
            }
        }
        if (e.key === 'Tab' && this.$refs.modal) {
            const focusables = this.$refs.modal.querySelectorAll(
                'button, [href], [tabindex]:not([tabindex="-1"])'
            );
            if (!focusables.length) return;
            const first = focusables[0];
            const last = focusables[focusables.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    },

    onBackdropClick(e) {
        if (e.target === e.currentTarget) this.closeModal();
    },

    nextImage() {
        if (!this.hasImages) return;
        this.currentImageIndex = (this.currentImageIndex + 1) % this.imageCount;
    },

    prevImage() {
        if (!this.hasImages) return;
        this.currentImageIndex = (this.currentImageIndex - 1 + this.imageCount) % this.imageCount;
    },

    setImage(index) {
        this.currentImageIndex = index;
    }
}));

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
    initScrollSpy();
    initSmoothScroll();
});

Alpine.start();
