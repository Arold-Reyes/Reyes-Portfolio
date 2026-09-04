<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $profile = [
            'name' => 'Arold Mina Reyes',
            'shortName' => 'Arold Reyes',
            'fullTitle' => 'Bachelor of Science in Information Technology (4th Year Student)',
            'objective' => 'Seeking an On-the-Job Training (OJT) / Internship position in IT Infrastructure, Networking, or System Administration.',
            'tagline' => 'IT Student & Technical Instructor',
            'phone' => '09063555720',
            'phoneHref' => '+639063555720',
            'email' => 'torolreyes0615@gmail.com',
            'location' => 'Poblacion, Pilar, Abra',
            'github' => 'https://github.com/Arold-Reyes',
            'facebook' => 'https://www.facebook.com/reyes.arold.92',
            'youtube' => 'https://www.youtube.com/@s4db0igaming76',
            'resume' => '/resume/reyesresume.jpg',
        ];

        $skills = [
            [
                'section' => 'Hardware & Infrastructure',
                'icon' => 'cpu',
                'items' => [
                    'PC Assembly / Disassembly',
                    'Hardware Diagnostics',
                    'Troubleshooting',
                    'Device Drivers Installation',
                ],
            ],
            [
                'section' => 'Operating Systems & Systems',
                'icon' => 'monitor',
                'items' => [
                    'Windows Server',
                    'Windows 10 / 11',
                    'Linux (Ubuntu / Debian)',
                    'MS Office Suite',
                ],
            ],
            [
                'section' => 'Programming & Web',
                'icon' => 'code',
                'items' => [
                    'HTML / CSS',
                    'C#',
                    'JavaScript',
                    'PHP',
                    'MySQL',
                ],
            ],
            [
                'section' => 'Networking & Tools',
                'icon' => 'network',
                'items' => [
                    'Cisco Packet Tracer',
                    'Network Configuration',
                ],
            ],
            [
                'section' => 'Game Development',
                'icon' => 'game',
                'items' => [
                    'Unity',
                    'C#',
                    '2D Game Development',
                    'Tilemap Design',
                ],
            ],
        ];

        $certifications = [
            [
                'id' => 'tesda-nc2-css',
                'title' => 'TESDA National Certificate II (NC II)',
                'subtitle' => 'Computer Systems Servicing (CSS)',
                'issuer' => 'TESDA',
                'date' => '2025',
                'badge' => 'Technical Certification',
                'featured' => true,
                'pdfUrl' => '/certificates/NC.pdf',
            ],
            [
                'id' => 'dict-data-analytics-2025',
                'title' => 'Data Analytics and Visualization Essentials',
                'issuer' => 'DICT CAR',
                'date' => 'Dec 2025',
                'badge' => 'Technical Certification',
                'pdfUrl' => '/certificates/Arold_M_Reyes_Data_Analytics_Certificate.pdf',
            ],
            [
                'id' => 'dict-ict-career-prep-2025',
                'title' => 'Empowering the Next Gen: ICT Career Prep Essentials',
                'issuer' => 'DICT CAR',
                'date' => 'June 2025',
                'badge' => 'Webinar',
                'pdfUrl' => '/certificates/Empowering_the_next_Gen_ICT_Career_Prep_Essentials_Webinar.pdf',
            ],
            [
                'id' => 'ched-seedling-cyber-awareness-2026',
                'title' => 'Stay Alert, Stay Secure: Promoting Cyber Awareness and Online Scam Prevention',
                'issuer' => 'CHED SEEDLING Project / DICT CAR',
                'date' => 'July 23, 2026',
                'badge' => 'Cybersecurity',
                'pdfUrl' => '/certificates/Arold_M_Reyes_CHED_Certificate.pdf',
            ],
            [
                'id' => 'webinar-online-safety-netiquette',
                'title' => 'Online Safety Through Netiquette',
                'issuer' => 'Webinar Certificate',
                'date' => '2025',
                'badge' => 'Webinar',
                'pdfUrl' => '/certificates/76.pdf',
            ],
            [
                'id' => 'webinar-industrial-cybersecurity',
                'title' => 'Industrial Cybersecurity Essentials',
                'issuer' => 'Webinar Certificate',
                'date' => '2025',
                'badge' => 'Cybersecurity',
                'pdfUrl' => '/certificates/Industrial_Cybersecurity_Essentials_certificate_torolreyes0615-gmail-com_3bbac569-ccb2-4af1-b5b9-fc12e81cb13e.pdf',
            ],
            [
                'id' => 'certificate-of-appearance',
                'title' => 'Certificate of Appearance',
                'issuer' => 'Certificate of Appearance',
                'date' => '2026',
                'badge' => 'Certificate',
                'pdfUrl' => '/certificates/Certificate_of_Appearance_Arold_M_Reyes.pdf',
            ],
        ];

        $timeline = [
            [
                'kind' => 'work',
                'title' => 'Instructor / Trainer',
                'subtitle' => 'OCTA Information Technology Services',
                'type' => 'Remote',
                'date' => '2025 - Present',
                'sort' => 2025,
                'points' => [
                    'Delivers IT training modules focused on network and hardware troubleshooting.',
                    'Teaches core IT principles to learners through structured sessions.',
                ],
            ],
            [
                'kind' => 'work',
                'title' => 'Computer Systems Servicing (CSS) NC II Instructor',
                'subtitle' => 'Tagodtod National High School',
                'type' => 'On-site',
                'date' => '2025 - 2026',
                'sort' => 2025,
                'points' => [
                    'Facilitated NC II certification training for learners.',
                    'Covered PC assembly, OS installation, networking, and basic server configuration.',
                ],
            ],
            [
                'kind' => 'education',
                'title' => 'Bachelor of Science in Information Technology (BSIT)',
                'subtitle' => 'Data Center College of the Philippines - Bangued',
                'date' => '2023 - Present',
                'sort' => 2023,
                'points' => [
                    '4th-year student pursuing a degree in Information Technology.',
                ],
            ],
            [
                'kind' => 'education',
                'title' => 'Senior High School (GAS Strand)',
                'subtitle' => 'Abra High School Main Campus',
                'date' => '2021 - 2023',
                'sort' => 2021,
                'points' => [
                    'Completed General Academic Strand during senior high school.',
                ],
            ],
        ];

        usort($timeline, fn ($a, $b) => $b['sort'] <=> $a['sort']);

        $projects = [
            [
                'id' => 'portfolio-website',
                'title' => 'Portfolio Website',
                'category' => 'Web Development',
                'group' => 'web',
                'badge' => 'Web App',
                'shortDescription' => 'An interactive single-page e-portfolio built with Laravel showcasing my skills, certifications, and projects.',
                'fullDescription' => 'Designed and built this very portfolio site from scratch as a professional showcase of my skills, experience, and certifications. The site features a fully responsive layout, a light/dark theme system with persistence, an animated particle background, a certificate PDF viewer, and an interactive project gallery lightbox. It was an opportunity to practice real-world full-stack development using a modern MVC framework.',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Alpine.js', 'Vite'],
                'thumbnail' => '/images/projects/portfolio_img/Portfolio_01.png',
                'galleryImages' => [
                    '/images/projects/portfolio_img/Portfolio_01.png',
                    '/images/projects/portfolio_img/Portfolio_02.png',
                    '/images/projects/portfolio_img/Portfolio_03.png',
                ],
                'liveDemoUrl' => '/',
                'githubUrl' => null,
            ],
            [
                'id' => 'lms',
                'title' => 'Learning Management System (LMS)',
                'category' => 'Desktop Application',
                'group' => 'desktop',
                'badge' => 'Offline App',
                'shortDescription' => 'A desktop learning management system for managing courses, lessons, and student progress.',
                'fullDescription' => 'A Learning Management System built as a Windows desktop application. It lets instructors create and organize course modules, track learner progress, and manage enrolments through a straightforward graphical interface backed by a relational database.',
                'technologies' => ['C#', 'Microsoft Visual Studio 2010', 'Windows Forms', 'SQL Server'],
                'thumbnail' => '/images/projects/lms_img/2_dashboard.png',
                'galleryImages' => [
                    '/images/projects/lms_img/1_login.png',
                    '/images/projects/lms_img/2_dashboard.png',
                    '/images/projects/lms_img/3_reports.png',
                    '/images/projects/lms_img/4_loans.png',
                    '/images/projects/lms_img/5_payments.png',
                    '/images/projects/lms_img/6_clients.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'web-dev-activities',
                'title' => 'Web-Dev Activities',
                'category' => 'Web Development',
                'group' => 'web',
                'badge' => 'Web App',
                'shortDescription' => 'A collection of web development activities covering dynamic pages, CRUD, and database operations.',
                'fullDescription' => 'A collection of hands-on web development activities built during OJT. It covers building dynamic web pages, user registration and login flows, CRUD operations, and connecting a PHP backend to a MySQL database to store and retrieve data.',
                'technologies' => ['PHP', 'MySQL', 'HTML', 'CSS', 'Bootstrap', 'JavaScript'],
                'thumbnail' => '/images/projects/webdev_img/1_login.png',
                'galleryImages' => [
                    '/images/projects/webdev_img/1_login.png',
                    '/images/projects/webdev_img/2_registration.png',
                    '/images/projects/webdev_img/3_dashboard.png',
                    '/images/projects/webdev_img/4_pictures.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'microsoft-access-database',
                'title' => 'Microsoft Access Database',
                'category' => 'Database',
                'group' => 'tools',
                'badge' => 'Utility Tool',
                'shortDescription' => 'A relational database project with normalized tables, queries, forms, and reports.',
                'fullDescription' => 'A relational database project built in Microsoft Access demonstrating data modeling best practices. It includes normalized tables, relationships, useful queries, data-entry forms, and printable reports to turn raw data into usable information.',
                'technologies' => ['Microsoft Access', 'SQL', 'Database Design', 'Queries & Reports'],
                'thumbnail' => '/images/projects/microsoftaccess_img/img1.png',
                'galleryImages' => [
                    '/images/projects/microsoftaccess_img/img1.png',
                    '/images/projects/microsoftaccess_img/img2.png',
                    '/images/projects/microsoftaccess_img/img3.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'abra-quest-rpg',
                'title' => 'Abra Quest — 2D RPG',
                'category' => 'Game Development',
                'group' => 'game',
                'badge' => 'Game',
                'shortDescription' => 'An ongoing 2D role-playing game set in the province of Abra, built in Unity.',
                'fullDescription' => 'Abra Quest is an in-progress 2D role-playing game developed in Unity (C#). It features a custom game world inspired by the province of Abra, character movement and combat systems, tile-based level design, and an evolving story. Actively developing gameplay mechanics and level assets.',
                'technologies' => ['C#', 'Unity', '2D Game Development', 'Tilemap'],
                'thumbnail' => '/images/projects/abraquest_img/1_mainmenu.png',
                'galleryImages' => [
                    '/images/projects/abraquest_img/1_mainmenu.png',
                    '/images/projects/abraquest_img/2_option.png',
                    '/images/projects/abraquest_img/3_play.png',
                    '/images/projects/abraquest_img/4_prologue.png',
                    '/images/projects/abraquest_img/5_gameplay.png',
                    '/images/projects/abraquest_img/6_npcinteraction.png',
                    '/images/projects/abraquest_img/7_pause.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'allan-paint-center-management-system',
                'title' => 'Allan Paint Center Management System',
                'category' => 'Desktop Application',
                'group' => 'desktop',
                'badge' => 'Offline App',
                'shortDescription' => 'A desktop system for managing paint center inventory, sales, and records.',
                'fullDescription' => 'An Allan Paint Center Management System desktop application that streamlines day-to-day store operations. It handles product inventory, sales transactions, customer records, and reporting, reducing manual record-keeping and improving accuracy for the business.',
                'technologies' => ['C#', 'Microsoft Visual Studio 2010', 'Windows Forms', 'SQL Server'],
                'thumbnail' => '/images/projects/allanpaintcenter_img/2_dashboard.png',
                'galleryImages' => [
                    '/images/projects/allanpaintcenter_img/1_login.png',
                    '/images/projects/allanpaintcenter_img/2_dashboard.png',
                    '/images/projects/allanpaintcenter_img/3_items.png',
                    '/images/projects/allanpaintcenter_img/4_sales.png',
                    '/images/projects/allanpaintcenter_img/5_reports.png',
                    '/images/projects/allanpaintcenter_img/6_stocks.png',
                    '/images/projects/allanpaintcenter_img/7_usermanagement.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'student-registration-system',
                'title' => 'Student Registration System',
                'category' => 'Desktop Application',
                'group' => 'desktop',
                'badge' => 'Offline App',
                'shortDescription' => 'A desktop application for capturing and organizing student registration information.',
                'fullDescription' => 'A Student Registration System that provides an intuitive interface for entering, validating, and storing student information. Includes search and update capabilities, making it easy to maintain an accurate student roster.',
                'technologies' => ['C#', 'Microsoft Visual Studio 2010', 'Windows Forms', 'SQL Server'],
                'thumbnail' => '/images/projects/studentregistration_img/img1.png',
                'galleryImages' => [
                    '/images/projects/studentregistration_img/img1.png',
                    '/images/projects/studentregistration_img/img2.png',
                ],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
            [
                'id' => 'freelance-website-portfolio',
                'title' => 'Freelance Website Portfolio',
                'category' => 'Web Development',
                'group' => 'web',
                'badge' => 'Web App',
                'shortDescription' => 'An in-progress freelance portfolio site being built for a client.',
                'fullDescription' => 'A client-facing freelance website portfolio currently under development. The project focuses on presenting a clean personal brand online with responsive design and modern web standards. Pictures will be added later.',
                'technologies' => ['Laravel', 'PHP', 'Tailwind CSS', 'Responsive Design'],
                'thumbnail' => null,
                'galleryImages' => [],
                'liveDemoUrl' => null,
                'githubUrl' => null,
            ],
        ];

        $projectFilters = [
            ['key' => 'all', 'label' => 'All'],
            ['key' => 'web', 'label' => 'Web Projects'],
            ['key' => 'game', 'label' => 'Games'],
            ['key' => 'desktop', 'label' => 'Offline / Desktop Apps'],
            ['key' => 'tools', 'label' => 'Utility Tools'],
        ];

        return view('pages.home', compact(
            'profile',
            'skills',
            'timeline',
            'certifications',
            'projects',
            'projectFilters'
        ));
    }
}
