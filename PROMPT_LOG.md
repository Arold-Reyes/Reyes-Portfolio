# AI Collaboration Prompt Log (`PROMPT_LOG.md`)

**Student Name:** Arold Mina Reyes  
**Program & Year:** Bachelor of Science in Information Technology (4th Year Student)  
**Institution:** Data Center College of the Philippines - Bangued  
**Course:** Integrative Programming (Activity 3: Developer Portfolio with AI Collaboration)  
**Instructor:** Adrian D. Baruela  

---

## Log Entries

### Entry 1: Base Project Architecture & Personal Context Setup
- **Prompt:**  
  > "Create a complete, modern, responsive single-page scrollable portfolio website ('spaghetti site') for Arold Mina Reyes, an IT student and Technical Instructor, starting from the existing project setup. Include personal profile info (BSIT 4th Year, OJT objective, phone: 09063555720, email: torolreyes0615@gmail.com, location: Poblacion, Pilar, Abra), education (Data Center College of the Philippines - Bangued, Abra High School Main Campus), certifications (TESDA NC II CSS, DICT CAR, CHED SEEDLING), teaching experience (OCTA IT Services, Tagodtod National High School), and categorized technical skills."
- **AI Output Summary:**  
  Provided a structured single-page HTML/Blade layout with sections for Hero, About, Skills, Experience, Certifications, Education, and Contact.
- **Action Taken:**  
  **Accepted with edits.** Applied the core section structures and updated the exact text to reflect my 4th-year BSIT standing, teaching roles at Tagodtod NHS and OCTA, and TESDA NC II certifications.

---

### Entry 2: Light/Dark Mode System Implementation
- **Prompt:**  
  > "Implement a fully functional Light Mode and Dark Mode theme system for my portfolio. Add a Sun/Moon toggle button in the sticky top navigation bar with ARIA attributes. Save preference in localStorage under key 'theme' and check window.matchMedia for system preferences. Set Dark theme default to deep navy with slate glassmorphism cards and electric blue accents; Light theme to crisp off-white with pure white glassmorphism cards and cobalt blue accents. Add smooth CSS body transitions."
- **AI Output Summary:**  
  Provided Alpine.js `themeManager()` component with `localStorage` checking, system theme fallback, dynamic SVG Sun/Moon icon swapping, and CSS transition rules.
- **Action Taken:**  
  **Accepted as-is.** Integrated into the main Blade layout (`resources/views/portfolio.blade.php`) and confirmed theme persistence across page refreshes.

---

### Entry 3: Project Screenshot Scanning & Asset Gallery
- **Prompt:**  
  > "I have added multiple project screenshot images to my public/images/project assets folder. Please inspect my project directory to locate these image files, then update my project views/components to showcase them in a clean image gallery or carousel section. For the freelance portfolio make it empty, no pictures yet."
- **AI Output Summary:**  
  Generated responsive multi-image layout components for projects linked to `public/images/project/` and built an empty state for the freelance portfolio section.
- **Action Taken:**  
  **Accepted as-is.** Verified that project screenshots render cleanly on desktop and mobile viewports.

---

### Entry 4: Navbar & Modal Z-Index Stacking Fix
- **Prompt:**  
  > "Fix the UI z-index and positioning issue where clicking on a Project or Certificate item opens a view/modal that overlaps or bleeds under the navbar. Set the Navbar to a lower z-index (z-30 or z-40) and set Project/Certificate view overlay container to a higher z-index (z-50 or z-[9999])."
- **AI Output Summary:**  
  Updated navbar CSS to `z-40` and modal lightbox container to `z-[9999]`. Added `scroll-mt-20` for smooth section targeting.
- **Action Taken:**  
  **Accepted as-is.** Fixed the modal bleeding issue so overlays appear over the entire viewport.

---

### Entry 5: Projects Categorization & Filter Tabs
- **Prompt:**  
  > "Reorganize the Projects section in my portfolio by categorizing all projects into distinct tabs/filters and separate sub-sections (All, Web Projects, Games, Offline / Desktop Apps). Add category tags to project entries, category badges on project cards, and smooth fade-in transitions."
- **AI Output Summary:**  
  Created Alpine.js tab-filtering state (`activeTab`), categorized project cards, and added badge metadata tags.
- **Action Taken:**  
  **Accepted as-is.** Verified tab switching and filtering behavior.

---

### Entry 6: Badges Category & Cisco PDF Lightbox Viewer
- **Prompt:**  
  > "Under certificates I want to add a badge choice (Certificates and Badges). I will paste the badge picture and pdf to public/images/badge. In the portfolio, the picture of the badge will show, and when clicking it, it will display the PDF of it."
- **AI Output Summary:**  
  Provided category filtering for Certificates vs. Badges, mapped thumbnail assets from `public/images/badge/`, and added an Alpine.js embedded PDF iframe lightbox modal (`activePdf`).
- **Action Taken:**  
  **Accepted as-is.** Confirmed clicking Cisco digital badges opens the credential PDF cleanly.

---

### Entry 7: Resume Download & Hero Section CTA Updates
- **Prompt:**  
  > "Update my portfolio's Resume section with primary 'Download Resume' button linking to assets/resume.pdf with target='_blank' and download attribute. Change secondary button to 'View My Work' scrolling to #projects, and remove the download link from top navigation bar."
- **AI Output Summary:**  
  Reconfigured Hero action buttons to display 'Download Resume' (solid primary button) and 'View My Work' (outlined secondary button) side-by-side using Tailwind flex classes. Updated navbar links accordingly.
- **Action Taken:**  
  **Accepted as-is.** Tested resume download functionality and verified smooth scroll down to `#projects`.

---

### Entry 8: Git History Re-Alignment Strategy
- **Prompt:**  
  > "Provide instructions on how to re-create a clean, step-by-step Git commit history feature-by-feature for my completed project without violating course requirements."
- **AI Output Summary:**  
  Provided sequential `git add` and `git commit` commands mapped to individual feature milestones.
- **Action Taken:**  
  **Accepted as-is.** Applied commands step-by-step to build a multi-commit history.

---

### Entry 9: Project Demo & Repository Links, Hero Badge, and Card Link Buttons
- **Prompt:**  
  > "in my projects the webdev activities i will provide a link for demo a link in repositories same with the Portfolio website" and "show it in the project the Demo and the github link, not just by clicking the project."
- **AI Output Summary:**  
  Added `liveDemoUrl` and `githubUrl` values for the Portfolio Website (`/` demo, `https://github.com/Arold-Reyes/Reyes-Portfolio`) and Web-Dev Activities (`https://ram.infinityfree.me/`, `https://github.com/Arold-Reyes/Reyes-WebDev`). Updated the hero section badge text from "On OJT at DICT" to "IT Student & Instructor". Rendered "Live Demo" and "GitHub" buttons directly on the project cards so links are always visible without opening the detail modal.
- **Action Taken:**  
  **Accepted as-is.** Verified the demo/repo buttons display on the project cards for projects with links set, while other projects remain unaffected.

---

### Entry 10: Git Commit & Prompt Log Update
- **Prompt:**  
  > "create me a git commit in commiting or pushing the changed code i ask also add it to my promptlog the prompt."
- **AI Output Summary:**  
  Checked working tree status, found no uncommitted changes (branch is 1 commit ahead of origin). Added this prompt as Entry 10 to PROMPT_LOG.md.
- **Action Taken:**  
  **Accepted as-is.** Working tree was already clean; updated PROMPT_LOG.md with this entry.

---

### Entry 11: Fully Responsive, Adaptive Portfolio with Accessibility & Ergonomics
- **Prompt:**  
  > "Act as an expert frontend engineer. Build a fully responsive, adaptive personal portfolio website that delivers an optimal UI/UX across mobile, tablet, desktop, and ultra-wide screens. Key Requirements: Mobile-First Design (fluid CSS Grid, Flexbox, dynamic typography with clamp(), responsive spacing), Adaptive Navigation (sticky/fixed navbar on desktop, accessible hamburger drawer on mobile), Device Ergonomics (minimum 44x44px touch targets, hover effects gated behind @media (hover: hover) queries), Core Components (Hero, Projects, Skills/Experience, Contact grids scaling from 1-column to multi-column), Best Practices (semantic HTML5, zero CLS, accessible ARIA attributes, high contrast ratios). Apply this prompt in my PROMPT_LOG and commit it in my github."
- **AI Output Summary:**  
  Enhanced the portfolio with comprehensive responsive, accessibility, and ergonomic improvements. Added fluid typography via clamp() in CSS, gated all hover effects behind @media (hover: hover) and (pointer: fine) queries to prevent sticky touch states, enforced 44x44px minimum touch targets on all interactive elements for mobile, added a skip-to-content link for keyboard/screen-reader users, added semantic ARIA attributes (role, aria-label, aria-expanded, aria-controls, aria-modal) across navbar and modals, improved CLS prevention with aspect-ratio reservation on the hero profile image, added high-contrast mode support via @media (forced-colors), comprehensive reduced-motion support via @media (prefers-reduced-motion: reduce), print stylesheet, and focused-visible ring for keyboard navigation. Updated navbar with proper mobile menu ARIA attributes and touch-friendly sizing.
- **Action Taken:**  
  **Accepted as-is.** Applied all changes across app.css, navbar.blade.php, footer.blade.php, app.blade.php, and home.blade.php.