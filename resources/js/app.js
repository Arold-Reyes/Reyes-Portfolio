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
    lastFocused: null,

    init() {
        // Escape closes the menu; Tab stays inside the dialog while it is open
        document.addEventListener('keydown', (event) => {
            if (!this.open) return;
            if (event.key === 'Escape') {
                this.close();
                return;
            }
            if (event.key === 'Tab') this.trapFocus(event);
        });

        // Close the overlay if the viewport grows into the desktop layout
        window.addEventListener('resize', () => {
            if (this.open && window.innerWidth >= 1024) this.close();
        });
    },

    toggle() {
        this.set(!this.open);
    },

    close() {
        this.set(false);
    },

    set(open) {
        if (this.open === open) return;
        this.open = open;
        document.body.style.overflow = open ? 'hidden' : '';

        if (open) {
            this.lastFocused = document.activeElement;
            setTimeout(() => {
                const target = document.querySelector('#mobile-menu [data-menu-focus]')
                    || document.querySelector('#mobile-menu a, #mobile-menu button');
                if (target) target.focus();
            }, 50);
        } else {
            const previous = this.lastFocused;
            this.lastFocused = null;
            if (previous && typeof previous.focus === 'function' && document.contains(previous)) {
                previous.focus();
            }
        }
    },

    trapFocus(event) {
        const dialog = document.getElementById('mobile-menu');
        if (!dialog) return;

        const focusables = Array.from(dialog.querySelectorAll(
            'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )).filter(el => el.offsetParent !== null);

        if (!focusables.length) return;

        const first = focusables[0];
        const last = focusables[focusables.length - 1];
        const activeInside = dialog.contains(document.activeElement);

        if (event.shiftKey && (document.activeElement === first || !activeInside)) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && (document.activeElement === last || !activeInside)) {
            event.preventDefault();
            first.focus();
        }
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
                if (isActive) {
                    link.setAttribute('aria-current', 'page');
                } else {
                    link.removeAttribute('aria-current');
                }
            });
        });
    }, {
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0
    });

    sections.forEach(section => observer.observe(section));
}

// Smooth scrolling for anchor links (also moves keyboard focus to the target)
function initSmoothScroll() {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#') return;

            const target = document.getElementById(targetId.slice(1));
            if (!target) return;

            e.preventDefault();
            const headerOffset = 80;
            const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;

            window.scrollTo({
                top: Math.max(elementPosition - headerOffset, 0),
                behavior: reduceMotion ? 'auto' : 'smooth'
            });

            if (history.replaceState) {
                history.replaceState(null, '', targetId);
            }

            if (!target.hasAttribute('tabindex')) {
                target.setAttribute('tabindex', '-1');
            }
            target.focus({ preventScroll: true });
        });
    });
}

// Add a subtle shadow to the sticky navbar once the page is scrolled
function initNavbarShadow() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const onScroll = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

// Contact form
Alpine.data('contactModal', () => ({
    open: false,
    sending: false,
    toastType: null,
    toastMessage: '',
    showToast: false,
    errors: {},
    _toastTimer: null,

    clearError(field) {
        if (this.errors[field]) {
            this.errors[field] = '';
        }
    },

    async submitForm(event) {
        event.preventDefault();
        if (this.sending) return;

        const form = event.target;
        const data = new FormData(form);
        const payload = Object.fromEntries(data.entries());

        this.sending = true;
        this.errors = {};
        this.toastType = null;
        this.toastMessage = '';
        this.showToast = false;

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

        try {
            const response = await fetch('/api/sendmail', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            });

            let result = {};
            try {
                result = await response.json();
            } catch (error) {
                result = {};
            }

            if (response.status === 422 && result.errors) {
                this.errors = Object.fromEntries(
                    Object.entries(result.errors).map(([field, messages]) => [
                        field,
                        Array.isArray(messages) ? messages[0] : messages,
                    ])
                );
                this.toastType = 'failure';
                this.toastMessage = 'Please check the highlighted fields and try again.';

                this.$nextTick(() => {
                    const firstField = Object.keys(this.errors)[0];
                    if (firstField) document.getElementById(firstField)?.focus();
                });
            } else if (!response.ok || result.status !== 'success') {
                this.toastType = response.status === 429 ? 'warning' : 'failure';
                this.toastMessage = result.message || 'Failed to send your message. Please try again later.';
            } else {
                this.toastType = 'success';
                this.toastMessage = result.message || 'Your message has been sent successfully.';
                form.reset();
            }
        } catch (err) {
            this.toastType = 'failure';
            this.toastMessage = 'Failed to send your message. Please try again later.';
        } finally {
            this.sending = false;
            this.showToast = true;
            this.startToastTimer(6000);
        }
    },

    startToastTimer(delay = 6000) {
        clearTimeout(this._toastTimer);
        this._toastTimer = setTimeout(() => {
            this.showToast = false;
        }, delay);
    },

    pauseToast() {
        clearTimeout(this._toastTimer);
    },

    resumeToast() {
        if (this.showToast) this.startToastTimer(4000);
    },

    dismissToast() {
        clearTimeout(this._toastTimer);
        this.showToast = false;
    }
}));

// Profile photo cards: hover previews a photo in front, click pins it there
Alpine.data('profileCards', (images = []) => ({
    images,
    front: 0,
    preview: null,

    isFront(index) {
        return index === (this.preview !== null ? this.preview : this.front);
    },

    setPreview(index) {
        this.preview = index;
    },

    clearPreview() {
        this.preview = null;
    },

    pin(index) {
        this.front = index;
    }
}));

// Certificate viewer modal
Alpine.data('certViewer', (certs = []) => ({
    open: false,
    cert: null,
    zoomed: false,
    lastFocused: null,
    activeFilter: 'all',
    searchQuery: '',
    allCerts: certs,

    setFilter(key) {
        if (this.activeFilter === key) return;
        this.activeFilter = key;
    },

    matchesSearch(cert) {
        const q = (this.searchQuery || '').trim().toLowerCase();
        if (!q) return true;
        if (!cert) return false;
        const haystack = [cert.title, cert.subtitle || '', cert.issuer || '', cert.badge || '', cert.date || '']
            .join(' ').toLowerCase();
        return haystack.includes(q);
    },

    isVisible(cert) {
        if (!cert) return false;
        const inFilter = this.activeFilter === 'all' || cert.group === this.activeFilter;
        return inFilter && this.matchesSearch(cert);
    },

    countFor(key) {
        if (key === 'all') return this.allCerts.length;
        return this.allCerts.filter(cert => cert.group === key).length;
    },

    get filteredCount() {
        return this.allCerts.filter(cert => this.isVisible(cert)).length;
    },

    resetSearch() {
        this.searchQuery = '';
        this.activeFilter = 'all';
    },

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
    touchStartX: null,

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
    },

    onTouchStart(event) {
        if (!this.hasImages) return;
        this.touchStartX = event.changedTouches[0].clientX;
    },

    onTouchEnd(event) {
        if (!this.hasImages || this.touchStartX === null) return;
        const distance = event.changedTouches[0].clientX - this.touchStartX;
        this.touchStartX = null;
        if (Math.abs(distance) < 50) return;
        distance < 0 ? this.nextImage() : this.prevImage();
    }
}));

// Back-to-top control
Alpine.data('backToTop', () => ({
    visible: false,

    init() {
        this._onScroll = () => {
            this.visible = window.scrollY > 600;
        };
        window.addEventListener('scroll', this._onScroll, { passive: true });
        this._onScroll();
    },

    scrollToTop() {
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });

        const landing = document.getElementById('home');
        if (landing) {
            if (!landing.hasAttribute('tabindex')) landing.setAttribute('tabindex', '-1');
            landing.focus({ preventScroll: true });
        }
    }
}));

// Scroll progress bar width update
function initScrollProgress() {
    const bar = document.getElementById('scroll-progress');
    if (!bar) return;

    const update = () => {
        const doc = document.documentElement;
        const total = doc.scrollHeight - doc.clientHeight;
        const percent = total > 0 ? (window.scrollY / total) * 100 : 0;
        bar.style.width = percent + '%';
    };

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
    update();
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
    initScrollSpy();
    initSmoothScroll();
    initNavbarShadow();
    initScrollProgress();
});

Alpine.start();
