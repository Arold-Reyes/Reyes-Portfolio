# PROMPT LOG — ReyesPortfolio

A chronological, organized record of every prompt used to build and refine the ReyesPortfolio website. This log merges the prompts captured in `PROMPT_LOG.docx` with the prompts issued in the interactive coding sessions.

---

## Table of Contents
1. [Project Kickoff & Initial Build](#1-project-kickoff--initial-build)
2. [Theme System (Light/Dark Mode)](#2-theme-system-lightdark-mode)
3. [Design System & Visual Polish](#3-design-system--visual-polish)
4. [Project Screenshots & Gallery](#4-project-screenshots--gallery)
5. [Modal / Z-Index Fix](#5-modal--z-index-fix)
6. [Projects Reorganization & Filtering](#6-projects-reorganization--filtering)
7. [Content Updates (OJT at DICT)](#7-content-updates-ojt-at-dict)
8. [Technical Proficiency — Game Development](#8-technical-proficiency--game-development)
9. [Contact Form — Design Only](#9-contact-form--design-only)
10. [Certificates / Badges](#10-certificates--badges)
11. [Resume Section & Buttons](#11-resume-section--buttons)
12. [Project Cards Cleanup](#12-project-cards-cleanup)

---

## 1. Project Kickoff & Initial Build

**Prompt (from PROMPT_LOG.docx):**
> IMPORTANT INSTRUCTIONS: Create a complete, professional, responsive e-portfolio website for me as a Student and Instructor, starting from the existing project folder.

> Create a complete, modern, responsive single-page scrollable portfolio website ("spaghetti site") for Arold Mina Reyes, an IT student and Technical Instructor, starting from the existing project setup.

**Requirements captured:**
- **Personal Profile:** Full Name: Arold Mina Reyes; Title: BSIT (4th Year Student); Objective: Seeking an OJT/Internship position in IT Infrastructure, Networking, or System Administration.
- **Contact:** Phone 09063555720, Email torolreyes0615@gmail.com, Location Poblacion, Pilar, Abra.
- **Education:** DCCP Bangued (BSIT 2023–Present), Abra High School Main Campus (GAS Strand 2021–2023).
- **Certifications:** TESDA NC II (CSS), DICT CAR Data Analytics, DICT ICT Career Prep Webinar, CHED SEEDLING Cyber Awareness, Online Safety Through Netiquette, Industrial Cybersecurity Essentials.
- **Work Experience:** Instructor/Trainer — OCTA IT Services (2025–Present); CSS NC II Instructor — Tagodtod NHS (2025–2026).
- **Technical Skills:** Hardware & Infrastructure; Operating Systems & Systems; Programming & Web; Networking & Tools.
- **Single-page layout sections:** Hero, About, Skills, Experience, Certifications, Education, Contact — with sticky nav, active-link tracking (Intersection Observer), mobile burger menu, and smooth scrolling.

---

## 2. Theme System (Light/Dark Mode)

**Prompt (from PROMPT_LOG.docx):**
> Please implement a fully functional, robust Light Mode and Dark Mode theme system for my single-page portfolio website, ensuring seamless color switching, smooth transitions, and persistent user preferences.

**Requirements captured:**
- Sun/Moon toggle in the sticky navbar (accessible on mobile and desktop, with ARIA attributes).
- Initial load: check `localStorage('theme')`, fall back to `prefers-color-scheme`, apply immediately (avoid FOUC).
- Toggle switches `.dark`/`.light` on `html`/`body`, saves to `localStorage`, and listens to OS-level changes.
- Dual color schemes (Deep Navy dark theme, crisp Off-White light theme) with accent highlights.
- Smooth transitions (`transition: background-color, color, border-color 0.3s ease`).
- Full readability across all elements in both themes.

---

## 3. Design System & Visual Polish

**Prompt (from PROMPT_LOG.docx):**
> Apply a modern, creative visual design system to the portfolio website, moving completely away from generic student templates while keeping it strictly professional, elegant, and polished.

**Requirements captured:**
- High-impact display font for headings; clean sans-serif for body with `tracking-wide` / `leading-relaxed`.
- Generous whitespace (`py-20` to `py-32`), symmetrical multi-column grids.
- Ambient radial background glows, glassmorphism cards (`backdrop-blur-md`), faint borders.
- Interactive canvas network/particle effect in the hero.
- Hover micro-interactions (`transition-all duration-300 ease-in-out`, `-translate-y-1`), scroll-triggered fade/slide animations.

---

## 4. Project Screenshots & Gallery

**Prompt (from PROMPT_LOG.docx):**
> I have added multiple project screenshot images to my public/images/ project assets folder. Please inspect my project directory to locate these image files, then update my project views/components to showcase them in a clean image gallery or carousel section.

**Requirements captured:**
- Scan and detect screenshot images in the assets/public folder.
- Locate where project details/portfolio items are rendered.
- Implement a responsive multi-image gallery, grid, or slider.
- Ensure image paths, alt tags, and responsive CSS are correctly configured for mobile and desktop.

**Follow-up (from PROMPT_LOG.docx):**
> For the freelance portfolio make it empty, no pictures yet.

---

## 5. Modal / Z-Index Fix

**Prompt (from PROMPT_LOG.docx):**
> Fix the UI z-index and positioning issue where clicking on a Project or Certificate item opens a view/modal that overlaps or bleeds under the navbar.

**Requirements captured:**
- Locate the Navbar and the Project/Certificate detail components (modal/drawer/lightbox).
- Ensure the Navbar has a lower z-index (e.g., `z-30` or `z-40`).
- Set the modal/overlay container to a higher z-index (e.g., `z-50` or `z-[9999]`) so it overlaps the navbar.
- If rendered inline, add `scroll-mt-20` or top padding/margin so the fixed navbar doesn't obscure the opened component.

---

## 6. Projects Reorganization & Filtering

**Prompt (from PROMPT_LOG.docx):**
> Reorganize the Projects section in my portfolio by categorizing all projects into distinct tabs/filters and separate sub-sections (e.g., Web Apps, Games, Offline/Desktop Applications, Utility Tools).

**Requirements captured:**
- **Category Filtering / Tabs:** Add a clean category filter bar (All, Web Projects, Games, Offline / Desktop Apps) that smoothly filters the displayed project cards.
- **Category Metadata:** Add a category tag/attribute to each project data entry; display a subtle category badge on each card.
- **Fallback & Smooth Transitions:** Show all projects on the "All" tab by default; fade in/out when switching; show a "No projects found in this category" state when a category is empty.

---

## 7. Content Updates (OJT at DICT)

**Prompt (from interactive session):**
> change in about me and home the seeking an onjob training , im already on the site on ojt in DICT change it make it nice

**Result:** Updated the home hero badge ("On OJT at DICT") and the description, and the About section to reflect that the user is currently completing their OJT at the Department of Information and Communications Technology (DICT).

---

## 8. Technical Proficiency — Game Development

**Prompt (from interactive session):**
> in my technical Technical Proficiency add the game dev? is it ok?

**Result:** Added a "Game Development" skill group (Unity, C#, 2D Game Development, Tilemap Design) with a game-controller icon to the Technical Proficiency section.

---

## 9. Contact Form — Design Only

**Prompt (from interactive session):**
> in the contacts part in where they can send message, make that as a design only when they try to send message it will pop a ON GOING PROCESS, because that part is not done chose what message to pops

**Result:** Made the contact form design-only — submitting now shows a yellow toast: "Ongoing process — this message feature is still under development." No API call is made.

---

## 10. Certificates / Badges

**Prompt (from interactive session):**
> I have saved my badge thumbnail images and corresponding PDF files inside the public/images/badge/ folder. Please update my portfolio's Certificates/Badges component and data structures to use these assets.

**Requirements:**
- Set thumbnail source to `/images/badge/...` and PDF source to `/images/badge/...pdf`.
- Render the thumbnail inside the Badge card; update click event to open the PDF (lightbox modal or new tab).
- Use the `asset()` path helper so links render correctly in dev and production.

**Rollback (from interactive session):**
> returt to the last remove the badge now dont add na recover the last

**Result:** The badge/thumbnail implementation was fully reverted to the original certificate cards (icon-based, original `/certificates/...` PDFs).

---

## 11. Resume Section & Buttons

**Prompt (from interactive session):**
> I want to update my portfolio's Resume section with two action buttons: one for downloading my PDF resume and another to view my resume on the platform where it was created.

**Requirements captured:**
- **Primary — Download Resume:** links to `{{ asset('assets/resume.pdf') }}` with `target='_blank'` and `download='Arold_M_Reyes_Resume.pdf'`.
- **Secondary — View Live Resume:** links to the online resume URL with `target='_blank' rel='noopener noreferrer'`.
- **UI Layout:** side-by-side buttons in the Hero (`flex flex-wrap gap-4 items-center`), solid filled button for Download and outlined button for View.

**Follow-ups (from interactive session):**
> change the view live resume to, view my work, also in top nav bar remove the resume download

> when cliking the view my work it will gou ti projects

**Result:** Renamed the secondary button to **"View My Work"**, removed the Resume button from the navbar, and changed "View My Work" to anchor to the `#projects` section.

---

## 12. Project Cards Cleanup

**Prompt (from interactive session):**
> remove the last fetures we added the live demo and the others for the projects

**Result:** Removed the GitHub / Live Demo button row from the project cards, leaving only the image, title, description, tech tags, and the "View Details & Screenshots" button.

---

_Last updated: September 4, 2026_
