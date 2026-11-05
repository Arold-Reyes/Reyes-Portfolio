@extends('layouts.app')

@section('title', 'Arold Mina Reyes | IT Student & Technical Instructor')

{{--
    Open Graph / social sharing + structured data.
    Uses url('/') so the canonical host comes from the actual request;
    set APP_URL correctly in production so generated links never point at localhost.
--}}
@push('head')
    @php
        $portfolioUrl = url('/');
        $portfolioDescription = 'Arold Mina Reyes — IT Student & Technical Instructor based in Abra, Philippines. Explore skills in IT infrastructure, networking, system administration, projects, certifications, and experience.';
        $portfolioImage = asset('images/og-image.png');
        $portraitImage = asset('images/profile.jpg');
    @endphp

    <link rel="canonical" href="{{ $portfolioUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Arold Mina Reyes — Portfolio">
    <meta property="og:title" content="Arold Mina Reyes — IT Student & Technical Instructor">
    <meta property="og:description" content="{{ $portfolioDescription }}">
    <meta property="og:url" content="{{ $portfolioUrl }}">
    <meta property="og:image" content="{{ $portfolioImage }}">
    <meta property="og:image:alt" content="Arold Mina Reyes — IT Student & Technical Instructor">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_PH">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Arold Mina Reyes — IT Student & Technical Instructor">
    <meta name="twitter:description" content="{{ $portfolioDescription }}">
    <meta name="twitter:image" content="{{ $portfolioImage }}">
    <meta name="twitter:image:alt" content="Arold Mina Reyes — IT Student & Technical Instructor">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'Arold Mina Reyes',
            'url' => $portfolioUrl,
            'image' => $portraitImage,
            'jobTitle' => 'IT Student & Technical Instructor',
            'description' => $portfolioDescription,
            'email' => 'mailto:' . $profile['email'],
            'telephone' => $profile['phoneHref'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Pilar',
                'addressRegion' => 'Abra',
                'addressCountry' => 'PH',
            ],
            'sameAs' => [
                $profile['github'],
                $profile['facebook'],
                $profile['youtube'],
            ],
            'alumniOf' => [
                '@type' => 'CollegeOrUniversity',
                'name' => 'Data Center College of the Philippines - Bangued',
            ],
            'knowsAbout' => [
                'IT Infrastructure',
                'Networking',
                'System Administration',
                'Computer Systems Servicing',
                'Web Development',
                'Game Development',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
{{-- ============ HOME / HERO ============ --}}
<section id="home" class="scroll-mt-20 relative flex flex-col justify-center pt-24 md:pt-32 pb-24 md:pb-32 overflow-hidden">
    {{-- Ambient glow orbs + dotted grid (subtle depth, behind content) --}}
    <div class="hero-bg dark:opacity-100 opacity-40">
        <div class="bg-blob hero-bg-blob-1"></div>
        <div class="bg-blob hero-bg-blob-2"></div>
        <div class="bg-blob hero-bg-blob-3"></div>
    </div>
    <div class="bg-grid" aria-hidden="true"></div>
    <div class="glow-orb w-72 h-72 bg-cyan-400/15 dark:bg-cyan-500/20 -top-16 -left-16" aria-hidden="true"></div>
    <div class="glow-orb w-96 h-96 bg-blue-500/10 dark:bg-blue-600/20 bottom-0 -right-20" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex flex-col md:flex-row items-center gap-14 justify-between">
            {{-- Left column --}}
            <div class="md:w-1/2 text-center md:text-left">
                <div class="reveal" data-direction="left" style="--reveal-delay: 0.1s">
                    <span class="section-badge mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                        IT Student &amp; Instructor
                    </span>
                    <h1 class="font-display text-5xl md:text-7xl font-bold leading-[1.05] tracking-tight mb-5 text-gray-900 dark:text-white">
                        Arold <span class="text-accent">Mina<br class="hidden md:block"> Reyes</span>
                    </h1>
                    <h2 class="text-xl md:text-2xl font-semibold mb-6 text-gray-600 dark:text-gray-300">
                        IT Student <span class="text-sky-500 dark:text-sky-400">&amp;</span> Technical Instructor
                    </h2>
                    <p class="text-lg text-gray-500 dark:text-gray-400 mb-9 max-w-xl mx-auto md:mx-0 leading-relaxed tracking-wide">
                        Currently completing my On-the-Job Training at DICT — applying IT
                        Infrastructure, Networking, and System Administration in a real-world environment.
                    </p>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4 items-center">
                        <a href="{{ asset('assets/resume.pdf') }}"
                           target="_blank"
                           download="Arold_M_Reyes_Resume.pdf"
                           class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold shadow-lg shadow-blue-600/25 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-600/30 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></svg>
                            Download Resume
                        </a>
                        <a href="#projects"
                           class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full border-2 border-sky-500/60 text-sky-600 dark:text-sky-400 font-semibold hover:-translate-y-1 hover:border-sky-500 hover:bg-sky-500/10 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="M10 14 21 3"/></svg>
                            View My Work
                        </a>
                        <a href="#contact"
                           class="inline-flex items-center gap-2 px-5 py-3.5 rounded-full text-sky-600 dark:text-sky-400 font-semibold hover:-translate-y-1 hover:bg-sky-500/10 transition-all duration-300 ease-in-out"
                           aria-label="Book a training session — go to contact">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Book a Training Session
                        </a>
                    </div>
                    <div class="mt-8 flex items-center justify-center md:justify-start gap-3" role="list" aria-label="Social links">
                        <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub profile" role="listitem"
                           class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.27-.01-1.17-.02-2.12-3.2.7-3.88-1.36-3.88-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.72-1.54-2.55-.29-5.24-1.28-5.24-5.68 0-1.26.45-2.28 1.18-3.09-.12-.29-.51-1.46.11-3.05 0 0 .97-.31 3.17 1.18a11 11 0 0 1 5.78 0c2.2-1.49 3.16-1.18 3.16-1.18.63 1.59.24 2.76.12 3.05.74.81 1.18 1.83 1.18 3.09 0 4.41-2.7 5.38-5.27 5.66.42.36.78 1.07.78 2.16 0 1.56-.01 2.82-.01 3.2 0 .31.21.68.8.56A10.02 10.02 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                        </a>
                        <a href="{{ $profile['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook profile" role="listitem"
                           class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.09 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.09 24 18.1 24 12.07z"/></svg>
                        </a>
                        <a href="{{ $profile['youtube'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube channel" role="listitem"
                           class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/></svg>
                        </a>
                        <a href="mailto:{{ $profile['email'] }}" aria-label="Send email to {{ $profile['email'] }}" role="listitem"
                           class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </a>
                        <a href="tel:{{ $profile['phoneHref'] }}" aria-label="Call {{ $profile['phone'] }}" role="listitem"
                           class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right column: profile wrapper card --}}
            <div class="md:w-1/2 flex justify-center">
                <div class="reveal" data-direction="right" style="--reveal-delay: 0.2s">
                    <div class="glass rounded-[2rem] p-6 md:p-10">
                        @php
                            $hasHeroImg = file_exists(public_path('images/profile.jpg'));
                        @endphp
                        <div class="profile-image-wrapper mx-auto">
                        @if($hasHeroImg)
                            <img
                                src="{{ asset('images/profile.jpg') }}"
                                alt="Arold Mina Reyes"
                                class="rounded-2xl w-full h-full object-cover object-center"
                                width="288" height="288"
                                fetchpriority="high"
                                decoding="async"
                            >
                        @else
                            <div class="flex items-center justify-center w-full h-full rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white text-7xl font-black font-display" aria-label="AR">
                                AR
                            </div>
                        @endif
                        </div>
                        <div class="mt-5 text-center">
                            <p class="font-display font-bold text-xl text-gray-900 dark:text-white tracking-wide">Arold Mina Reyes</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 tracking-wide">BSIT · 4th Year</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ ABOUT ============ --}}
<section id="about" class="scroll-mt-20 py-24 md:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">Who I Am</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">About Me</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                A bit about who I am, what drives me, and where I'm headed.
            </p>
        </div>

        <div class="reveal grid grid-cols-1 lg:grid-cols-3 gap-8" data-direction="up">
            <div class="lg:col-span-2 glass rounded-2xl p-9">
                <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed tracking-wide">
                    I'm <span class="font-semibold text-gray-900 dark:text-white">Arold Mina Reyes</span>, a 4th-year
                    BSIT student and a Technical Instructor. I split my time between learning information technology
                    in school and teaching it to others — a combination that gives me a deep, practical understanding
                    of the fundamentals.
                </p>
                <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed tracking-wide">
                    As an instructor, I've delivered IT training on network and hardware troubleshooting and guided
                    learners through TESDA Computer Systems Servicing (NC II) certification. I'm passionate about
                    IT infrastructure and enjoy breaking down technical concepts into clear, hands-on lessons.
                </p>
                <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed tracking-wide">
                    I'm currently completing my On-the-Job Training at the
                    <span class="font-semibold text-gray-900 dark:text-white">Department of Information and Communications Technology (DICT)</span>,
                    where I'm applying hands-on skills in <span class="font-semibold text-gray-900 dark:text-white">IT
                    Infrastructure, Networking, and System Administration</span> — putting what I've learned to work
                    in a real-world environment and growing every day.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="w-2 h-2 rounded-full bg-sky-500 shrink-0"></span>
                        Hardware &amp; Systems Troubleshooting
                    </div>
                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="w-2 h-2 rounded-full bg-cyan-500 shrink-0"></span>
                        Network Configuration
                    </div>
                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="w-2 h-2 rounded-full bg-sky-500 shrink-0"></span>
                        Teaching &amp; Mentoring
                    </div>
                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <span class="w-2 h-2 rounded-full bg-cyan-500 shrink-0"></span>
                        Continuous Learning
                    </div>
                </div>
            </div>

            <div class="glass rounded-2xl p-8 space-y-6 flex flex-col justify-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Location</p>
                    <p class="text-gray-700 dark:text-gray-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-sky-500" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Poblacion, Pilar, Abra
                    </p>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Phone</p>
                    <a href="tel:{{ $profile['phoneHref'] }}" class="text-gray-700 dark:text-gray-200 flex items-center gap-2 hover:text-sky-600 dark:hover:text-sky-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-sky-500" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        {{ $profile['phone'] }}
                    </a>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Email</p>
                    <a href="mailto:{{ $profile['email'] }}" class="text-gray-700 dark:text-gray-200 flex items-center gap-2 hover:text-sky-600 dark:hover:text-sky-400 transition-colors break-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-sky-500 shrink-0" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        {{ $profile['email'] }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ SKILLS ============ --}}
<section id="skills" class="section-alt scroll-mt-20 py-24 md:py-28 relative overflow-hidden">
    <div class="absolute -top-24 left-1/4 -z-10 w-96 h-96 rounded-full bg-sky-500/10 blur-3xl dark:bg-sky-600/10"></div>
    <div class="glow-orb w-80 h-80 bg-cyan-400/10 dark:bg-cyan-500/15 bottom-10 -left-24" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">What I Bring</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Technical Proficiency</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                My stack across hardware, systems, programming, and networking.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($skills as $skillGroup)
                <div class="reveal glass rounded-2xl p-7"
                     data-direction="up" style="--reveal-delay: {{ $loop->index * 0.1 }}s">
                    <div class="flex items-center gap-4 mb-5">
                        <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                            @if($skillGroup['icon'] === 'cpu')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M1 9h3M1 15h3M20 9h3M20 15h3"/></svg>
                            @elseif($skillGroup['icon'] === 'monitor')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                            @elseif($skillGroup['icon'] === 'code')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                            @elseif($skillGroup['icon'] === 'network')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>
                            @elseif($skillGroup['icon'] === 'game')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/></svg>
                            @endif
                        </span>
                        <h3 class="font-display text-lg font-bold tracking-wide text-gray-900 dark:text-white">{{ $skillGroup['section'] }}</h3>
                    </div>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach($skillGroup['items'] as $item)
                            <span class="px-3.5 py-1.5 rounded-full bg-sky-100 dark:bg-sky-900/40 text-sky-700 dark:text-sky-300 text-sm font-medium border border-transparent hover:border-sky-400/40 hover:-translate-y-0.5 transition-all duration-300 ease-in-out">
                                {{ $item }}
                             </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ PROJECTS ============ --}}
<section id="projects" class="scroll-mt-20 py-24 md:py-28 relative overflow-hidden" x-data="projectViewer({{ Js::from($projects) }})">
    <div class="absolute -top-20 left-1/4 -z-10 w-96 h-96 rounded-full bg-sky-500/10 blur-3xl dark:bg-sky-600/10"></div>
    <div class="glow-orb w-80 h-80 bg-cyan-400/10 dark:bg-cyan-500/15 -right-24 top-1/3" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">Portfolio</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Projects</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                A selection of projects I've built. Filter by category, then open any project to view its details and screenshots.
            </p>
        </div>

        {{-- Category filter tabs --}}
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10 reveal"
             role="group" aria-label="Filter projects by category">
            @foreach($projectFilters as $filter)
                <button type="button"
                        @click="setFilter('{{ $filter['key'] }}')"
                        :aria-pressed="activeFilter === '{{ $filter['key'] }}' ? 'true' : 'false'"
                        aria-controls="project-grid"
                        :class="activeFilter === '{{ $filter['key'] }}'
                            ? 'bg-gradient-to-r from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/25 border-transparent'
                            : 'bg-white dark:bg-slate-800/60 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-white/10 hover:border-sky-500/50 hover:text-sky-600 dark:hover:text-sky-400'"
                        class="px-4 sm:px-5 py-2.5 rounded-full border text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer">
                    {{ $filter['label'] }}
                </button>
            @endforeach
        </div>

        <p class="sr-only" role="status" aria-live="polite"
           x-text="'Showing ' + filteredCount + (filteredCount === 1 ? ' project' : ' projects')"></p>

        <div id="project-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $index => $project)
                <article class="reveal glass rounded-2xl overflow-hidden flex flex-col w-full h-full transition-all duration-300 ease-in-out hover:-translate-y-1.5 focus-within:ring-2 focus-within:ring-sky-500/40"
                         x-show="isVisible(allProjects[{{ $index }}])"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         data-direction="up" style="--reveal-delay: {{ ($index % 3) * 0.1 }}s">
                    @if($project['thumbnail'])
                        <button type="button"
                                @click='openModal(allProjects[{{ $index }}])'
                                aria-label="Open {{ $project['title'] }} details"
                                class="block w-full text-left cursor-pointer group">
                            <span class="relative block aspect-video overflow-hidden">
                                <img src="{{ $project['thumbnail'] }}" alt="{{ $project['title'] }} screenshot"
                                     class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105"
                                     loading="lazy" decoding="async">
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-sky-500/90 text-white text-xs font-semibold backdrop-blur">{{ $project['badge'] ?? $project['category'] }}</span>
                            </span>
                        </button>
                    @else
                        <button type="button"
                                @click='openModal(allProjects[{{ $index }}])'
                                aria-label="Open {{ $project['title'] }} details"
                                class="block w-full text-left cursor-pointer">
                            <span class="relative flex aspect-video items-center justify-center bg-gradient-to-br from-blue-600/15 to-cyan-400/15 dark:from-blue-500/10 dark:to-cyan-400/10 border-b border-gray-200/60 dark:border-white/10 overflow-hidden">
                                <span class="w-14 h-14 flex items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                                </span>
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-sky-500/90 text-white text-xs font-semibold backdrop-blur">{{ $project['badge'] ?? $project['category'] }}</span>
                            </span>
                        </button>
                    @endif
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-display text-lg font-bold tracking-wide text-gray-900 dark:text-white mb-2">
                            <button type="button"
                                    @click='openModal(allProjects[{{ $index }}])'
                                    class="text-left cursor-pointer hover:text-sky-600 dark:hover:text-sky-400 transition-colors">
                                {{ $project['title'] }}
                            </button>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-4">{{ $project['shortDescription'] }}</p>
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach($project['technologies'] as $tech)
                                <span class="px-2.5 py-1 rounded-full bg-gray-100 dark:bg-slate-700/50 text-gray-600 dark:text-gray-300 text-xs font-medium">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="flex flex-col gap-2 mt-auto">
                        @if($project['liveDemoUrl'] || $project['githubUrl'])
                             <div class="flex flex-wrap items-center gap-2">
                                @if($project['liveDemoUrl'])
                                    <a href="{{ $project['liveDemoUrl'] }}" target="_blank" rel="noopener noreferrer"
                                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-emerald-600 to-teal-500 text-white text-sm font-semibold shadow-md shadow-emerald-600/20 hover:shadow-emerald-600/40 hover:-translate-y-0.5 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                                        Live Demo
                                    </a>
                                @endif
                                @if($project['githubUrl'])
                                    <a href="{{ $project['githubUrl'] }}" target="_blank" rel="noopener noreferrer"
                                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700/60 text-gray-700 dark:text-gray-200 text-sm font-semibold hover:bg-gray-200 dark:hover:bg-slate-600/60 hover:-translate-y-0.5 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.81 8.21 11.39.6.11.82-.26.82-.58 0-.28-.01-1.02-.02-2-3.34.73-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.81 1.3 3.5.99.11-.78.42-1.31.76-1.61-2.67-.3-5.47-1.34-5.47-5.95 0-1.31.47-2.39 1.24-3.23-.12-.3-.54-1.53.12-3.18 0 0 1.01-.32 3.3 1.23.96-.27 1.98-.4 3-.4 1.02 0 2.04.13 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.65.25 2.88.12 3.18.77.84 1.24 1.92 1.24 3.23 0 4.62-2.81 5.64-5.49 5.94.43.37.81 1.1.81 2.22 0 1.61-.01 2.9-.01 3.29 0 .32.22.7.83.58C20.56 21.81 24 17.31 24 12 24 5.37 18.63 0 12 0z"/></svg>
                                        GitHub
                                    </a>
                                @endif
                            </div>
                        @endif
                        <button type="button"
                                @click='openModal(allProjects[{{ $index }}])'
                                class="mt-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-400 text-white text-sm font-semibold shadow-lg shadow-blue-600/20 hover:shadow-blue-600/40 transition-all duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 22h4a2 2 0 0 0 2-2V6l-6-6H6a2 2 0 0 0-2 2v4"/><path d="M10 14l2 2 4-4"/><path d="M8 21v-2a3 3 0 0 1 3-3h1"/></svg>
                            View Details &amp; Screenshots
                        </button>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Empty state --}}
        <div x-show="filteredCount === 0"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-cloak
             class="text-center py-16">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gray-100 dark:bg-slate-800/60 text-gray-400 dark:text-gray-500 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </div>
            <h3 class="font-display text-xl font-bold text-gray-800 dark:text-white mb-2">No projects found in this category</h3>
            <p class="text-gray-500 dark:text-gray-400">Try switching to the "All" tab to browse everything.</p>
            <button type="button"
                    @click="setFilter('all')"
                    class="mt-6 inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-sky-500/50 text-sky-600 dark:text-sky-400 text-sm font-semibold hover:bg-sky-500/10 transition-colors">
                Show all projects
            </button>
        </div>
    </div>

    {{-- ===== PROJECT DETAILS / LIGHTBOX MODAL ===== --}}
    <div x-cloak
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-ref="modal"
         role="dialog" aria-modal="true"
         :aria-label="project ? project.title : 'Project details'"
         @click.self="closeModal()"
         class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-6">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-md" aria-hidden="true" @click="closeModal()"></div>

        {{-- Modal card --}}
        <div class="relative w-full max-w-4xl max-h-[92vh] flex flex-col modal-panel rounded-2xl overflow-hidden shadow-2xl"
             @keydown="onKeydown($event)">
            {{-- Header --}}
            <div class="flex items-start justify-between gap-4 px-6 py-4 sm:px-7 sm:py-5 border-b border-gray-200/70 dark:border-white/10">
                <div class="min-w-0">
                    <h3 class="font-display text-lg sm:text-xl font-bold tracking-wide leading-snug text-gray-900 dark:text-white" x-text="project?.title"></h3>
                    <span class="mt-2 inline-block px-2.5 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-semibold" x-text="project?.category"></span>
                </div>
                <button type="button" data-project-focus
                        @click="closeModal()"
                        aria-label="Close modal"
                        class="shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-700/60 text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600/60 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            {{-- Body: scrollable content --}}
            <div class="modal-body flex-1 min-h-0 overflow-y-auto">
                {{-- Gallery --}}
                <div class="px-6 sm:px-7 pt-5" x-show="hasImages">
                    <div class="relative rounded-2xl overflow-hidden border border-gray-200 dark:border-white/10 bg-gray-900/40 aspect-video"
                         @touchstart.passive="onTouchStart($event)"
                         @touchend.passive="onTouchEnd($event)">
                        <img :src="currentImage" :alt="'Screenshot ' + (currentImageIndex + 1) + ' of ' + project?.title"
                             class="w-full h-full object-contain" loading="lazy" decoding="async">
                        {{-- Prev / Next --}}
                        <template x-if="imageCount > 1">
                            <button type="button" @click.prevent="prevImage()" aria-label="Previous screenshot"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-slate-900/60 text-white backdrop-blur hover:bg-slate-900/80 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
                            </button>
                        </template>
                        <template x-if="imageCount > 1">
                            <button type="button" @click.prevent="nextImage()" aria-label="Next screenshot"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-slate-900/60 text-white backdrop-blur hover:bg-slate-900/80 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                            </button>
                        </template>
                        <template x-if="imageCount > 0">
                            <span class="absolute bottom-3 right-3 px-2.5 py-1 rounded-full bg-slate-900/70 text-white text-xs font-semibold backdrop-blur"
                                  x-text="(currentImageIndex + 1) + ' / ' + imageCount"></span>
                        </template>
                    </div>

                    {{-- Thumbnails --}}
                    <template x-if="imageCount > 1">
                        <div class="flex gap-3 mt-4 overflow-x-auto pb-2" role="group" aria-label="Screenshot thumbnails">
                            <template x-for="(img, i) in project.galleryImages" :key="i">
                                <button type="button"
                                        @click="setImage(i)"
                                        :aria-label="'Show screenshot ' + (i + 1) + ' of ' + imageCount"
                                        :aria-pressed="currentImageIndex === i ? 'true' : 'false'"
                                        class="shrink-0 w-20 h-14 rounded-lg overflow-hidden border-2 cursor-pointer transition-colors"
                                        :class="currentImageIndex === i ? 'border-sky-400 dark:border-sky-400' : 'border-transparent opacity-70 hover:opacity-100'">
                                    <img :src="img" :alt="'Thumbnail ' + (i + 1)" class="w-full h-full object-cover" loading="lazy" decoding="async">
                                </button>
                            </template>
                        </div>
                    </template>
                </div>

                {{-- Placeholder when no screenshots yet --}}
                <div class="px-6 sm:px-7 pt-5" x-show="!hasImages">
                    <div class="flex flex-col items-center justify-center text-center gap-3 rounded-2xl border-2 border-dashed border-gray-300 dark:border-white/15 bg-white/60 dark:bg-slate-800/40 px-6 py-12">
                        <span class="flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                        </span>
                        <div>
                            <p class="font-display font-semibold text-gray-800 dark:text-white">Screenshots coming soon</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 max-w-sm">Images for this project aren't available yet. Please check back later.</p>
                        </div>
                    </div>
                </div>

                {{-- Info: description + tech + links --}}
                <div class="px-6 sm:px-7 py-6">
                    <h4 class="font-display text-base font-bold tracking-wide text-gray-900 dark:text-white mb-3">About this project</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed whitespace-pre-line" x-text="project?.fullDescription"></p>

                    <h4 class="font-display text-base font-bold tracking-wide text-gray-900 dark:text-white mt-6 mb-3">Tech Stack</h4>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="tech in project?.technologies ?? []" :key="tech">
                            <span class="px-3 py-1.5 rounded-full bg-gray-100 dark:bg-slate-700/50 text-gray-600 dark:text-gray-300 text-xs font-medium" x-text="tech"></span>
                        </template>
                    </div>

                    {{-- Links --}}
                    <template x-if="project?.liveDemoUrl || project?.githubUrl">
                        <div class="flex flex-col sm:flex-row gap-3 mt-7">
                            <template x-if="project?.liveDemoUrl">
                                <a :href="project.liveDemoUrl" target="_blank" rel="noopener noreferrer"
                                   class="flex-1 inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/25 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-blue-600/30 transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="M10 14 21 3"/></svg>
                                    Live Demo
                                </a>
                            </template>
                            <template x-if="project?.githubUrl">
                                <a :href="project.githubUrl" target="_blank" rel="noopener noreferrer"
                                   class="flex-1 inline-flex items-center justify-center gap-2 rounded-full border border-blue-600/40 dark:border-blue-400/40 text-blue-700 dark:text-blue-300 px-5 py-3 text-sm font-semibold hover:bg-blue-600/10 dark:hover:bg-blue-400/10 hover:-translate-y-0.5 transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                                    GitHub Repository
                                </a>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ EXPERIENCE & EDUCATION ============ --}}
<section id="education-experience" class="scroll-mt-20 py-24 md:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">Journey &amp; Foundation</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Experience &amp; Education</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                My professional journey and academic background, side by side.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14">
            {{-- Left: Experience --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </span>
                    <h3 class="font-display text-2xl font-bold tracking-wide text-gray-900 dark:text-white">Experience</h3>
                </div>
                <div class="relative space-y-8">
                    <div class="absolute left-1.5 top-2 bottom-2 w-0.5 bg-gradient-to-b from-blue-500 to-cyan-400"></div>
                    @foreach($timeline as $index => $item)
                        @if($item['kind'] === 'work')
                            <div class="relative pl-8">
                                <div class="absolute left-1.5 top-2 -translate-x-1/2 w-3 h-3 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 border-2 border-white dark:border-gray-950"></div>
                                <div class="reveal glass rounded-2xl p-6"
                                     data-direction="up"
                                     style="--reveal-delay: {{ $index * 0.1 }}s">
                                    <div class="flex flex-wrap items-center gap-2 mb-3">
                                        <span class="text-xs font-semibold uppercase tracking-wider text-sky-600 dark:text-sky-400">{{ $item['date'] }}</span>
                                        <span class="px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-medium text-gray-600 dark:text-gray-300">{{ $item['type'] }}</span>
                                    </div>
                                    <h3 class="font-display text-xl font-bold tracking-wide text-gray-900 dark:text-white">{{ $item['title'] }}</h3>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4 tracking-wide">{{ $item['subtitle'] }}</p>
                                    <ul class="space-y-2.5 text-gray-600 dark:text-gray-300 leading-relaxed">
                                        @foreach($item['points'] as $point)
                                            <li class="flex items-start gap-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 text-sky-500 shrink-0" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Right: Education --}}
            <div class="lg:pt-16">
                <div class="flex items-center gap-3 mb-8">
                    <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-400 text-white shadow-lg shadow-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </span>
                    <h3 class="font-display text-2xl font-bold tracking-wide text-gray-900 dark:text-white">Education</h3>
                </div>
                <div class="relative space-y-8">
                    <div class="absolute left-1.5 top-2 bottom-2 w-0.5 bg-gradient-to-b from-emerald-500 to-teal-400"></div>
                    @foreach($timeline as $index => $item)
                        @if($item['kind'] === 'education')
                            <div class="relative pl-8">
                                <div class="absolute left-1.5 top-2 -translate-x-1/2 w-3 h-3 rounded-full bg-gradient-to-br from-emerald-500 to-teal-400 border-2 border-white dark:border-gray-950"></div>
                                <div class="reveal glass rounded-2xl p-6"
                                     data-direction="up"
                                     style="--reveal-delay: {{ $index * 0.1 }}s">
                                    <div class="flex flex-wrap items-center gap-2 mb-3">
                                        <span class="text-xs font-semibold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">{{ $item['date'] }}</span>
                                        <span class="px-2.5 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300 text-xs font-medium">Education</span>
                                    </div>
                                    <h3 class="font-display text-xl font-bold tracking-wide text-gray-900 dark:text-white">{{ $item['title'] }}</h3>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4 tracking-wide">{{ $item['subtitle'] }}</p>
                                    <ul class="space-y-2.5 text-gray-600 dark:text-gray-300 leading-relaxed">
                                        @foreach($item['points'] as $point)
                                            <li class="flex items-start gap-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 text-emerald-500 shrink-0" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ CERTIFICATIONS ============ --}}
<section id="certifications" class="scroll-mt-20 py-24 md:py-28 relative overflow-hidden" x-data="certViewer({{ Js::from($certifications) }})">
    <div class="absolute -bottom-24 right-1/4 -z-10 w-96 h-96 rounded-full bg-sky-500/10 blur-3xl dark:bg-sky-600/10"></div>
    <div class="glow-orb w-80 h-80 bg-blue-500/10 dark:bg-blue-600/15 top-20 -right-24" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">Milestones</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Certificates &amp; Webinars</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                Browse every certificate and webinar below. Click a card to preview the document and download the official PDF when available.
            </p>
        </div>

        {{-- Search certificates --}}
        <div class="max-w-xl mx-auto mb-6 reveal">
            <label for="cert-search" class="sr-only">Search certificates by title, issuer, or year</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400 dark:text-gray-500" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </span>
                <input id="cert-search"
                       type="search"
                       x-model="searchQuery"
                       aria-controls="certification-grid"
                       placeholder="Search by title, issuer, or year…"
                       class="w-full rounded-full border border-gray-200 dark:border-white/10 bg-white dark:bg-slate-800/60 py-2.5 pl-11 pr-10 text-sm text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/40 transition-colors">
                <button type="button"
                        x-show="searchQuery"
                        x-cloak
                        @click="searchQuery = ''"
                        aria-label="Clear certificate search"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Category filter tabs --}}
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10 reveal"
             role="group" aria-label="Filter certificates by category">
            @foreach($certificationFilters as $filter)
                <button type="button"
                        @click="setFilter('{{ $filter['key'] }}')"
                        :aria-pressed="activeFilter === '{{ $filter['key'] }}' ? 'true' : 'false'"
                        aria-controls="certification-grid"
                        :class="activeFilter === '{{ $filter['key'] }}'
                            ? 'bg-gradient-to-r from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/25 border-transparent'
                            : 'bg-white dark:bg-slate-800/60 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-white/10 hover:border-sky-500/50 hover:text-sky-600 dark:hover:text-sky-400'"
                        class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full border text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer">
                    {{ $filter['label'] }}
                    <span :class="activeFilter === '{{ $filter['key'] }}'
                            ? 'bg-white/20 text-white'
                            : 'bg-gray-100 dark:bg-slate-700/60 text-gray-500 dark:text-gray-400'"
                          class="inline-flex items-center justify-center min-w-5 px-1.5 py-0.5 rounded-full text-xs font-bold transition-colors"
                          x-text="countFor('{{ $filter['key'] }}')"
                          aria-label="countFor('{{ $filter['key'] }}') certificates"></span>
                </button>
            @endforeach
        </div>

        <p class="sr-only" role="status" aria-live="polite"
           x-text="'Showing ' + filteredCount + (filteredCount === 1 ? ' certificate' : ' certificates') + (searchQuery ? ' matching &quot;' + searchQuery + '&quot;' : '')"></p>

        <div id="certification-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($certifications as $index => $cert)
                <article x-show="isVisible(allCerts[{{ $index }}])"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="reveal group glass relative rounded-2xl overflow-hidden flex flex-col w-full transition-transform duration-300 ease-in-out hover:-translate-y-1.5 {{ ($cert['featured'] ?? false) ? 'ring-1 ring-sky-400 dark:ring-sky-500' : '' }}"
                        data-direction="up" style="--reveal-delay: {{ ($index % 3) * 0.1 }}s">
                    {{-- Always-visible document preview --}}
                    <div class="relative w-full h-52 sm:h-56 overflow-hidden border-b border-gray-200/60 dark:border-white/10 bg-slate-100 dark:bg-slate-900/60">
                        @if(!empty($cert['previewImage']))
                            <img src="{{ $cert['previewImage'] }}"
                                 alt="Preview of the {{ $cert['title'] }} certificate"
                                 loading="lazy" decoding="async"
                                 class="h-full w-full object-contain p-2.5 transition-transform duration-500 ease-out group-hover:scale-[1.03]">
                        @else
                            <div class="h-full w-full flex flex-col items-center justify-center gap-2.5 bg-slate-100 dark:bg-slate-900/60 px-6 text-center">
                                <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                </span>
                                <span class="font-display text-sm font-semibold tracking-wide text-gray-800 dark:text-white">Protected document</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 tracking-wide">Open to preview this certificate</span>
                            </div>
                        @endif

                        {{-- Hover affordance --}}
                        <div class="pointer-events-none absolute inset-0 flex items-end justify-end p-3 bg-gradient-to-t from-slate-900/45 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" aria-hidden="true">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1.5 text-xs font-semibold text-slate-900 shadow-lg shadow-slate-900/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/><path d="M11 8v6"/><path d="M8 11h6"/></svg>
                                Click to preview
                            </span>
                        </div>

                        @if($cert['featured'] ?? false)
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-sky-100/95 dark:bg-sky-900/80 text-sky-700 dark:text-sky-300 text-xs font-semibold shadow-sm backdrop-blur">Featured</span>
                        @endif
                    </div>

                    <div class="flex flex-col flex-1 p-6">
                        @if(isset($cert['badge']))
                            <span class="self-start mb-3 px-2.5 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-semibold">{{ $cert['badge'] }}</span>
                        @endif
                        <h3 class="font-display text-lg font-bold tracking-wide text-gray-900 dark:text-white mb-1">{{ $cert['title'] }}</h3>
                        @if(isset($cert['subtitle']))
                            <p class="text-sm font-medium text-sky-600 dark:text-sky-400 mb-1">{{ $cert['subtitle'] }}</p>
                        @endif
                        <div class="mt-auto pt-4 flex items-center justify-between gap-3 text-sm text-gray-500 dark:text-gray-400 tracking-wide border-t border-gray-200/60 dark:border-white/10">
                            <span class="min-w-0 font-medium truncate">{{ $cert['issuer'] }}</span>
                            <span class="shrink-0">{{ $cert['date'] }}</span>
                        </div>
                        <span class="mt-4 inline-flex items-center justify-center gap-2 rounded-xl border border-blue-600/30 dark:border-blue-400/30 px-4 py-2 text-sm font-semibold text-blue-700 dark:text-blue-300 transition-colors duration-300 ease-in-out group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-cyan-400 group-hover:text-white group-hover:border-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            View Certificate
                        </span>
                    </div>

                    {{-- Full-card click target (keeps the markup valid while preserving the card look) --}}
                    <button type="button"
                            @click='openModal(allCerts[{{ $index }}])'
                            aria-label="View certificate: {{ $cert['title'] }}"
                            class="absolute inset-0 z-20 rounded-2xl cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-sky-500">
                        <span class="sr-only">View certificate: {{ $cert['title'] }}</span>
                    </button>
                </article>
            @endforeach
        </div>

        {{-- Empty state --}}
        <div x-show="filteredCount === 0"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-cloak
             class="text-center py-16">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gray-100 dark:bg-slate-800/60 text-gray-400 dark:text-gray-500 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </div>
            <h3 class="font-display text-xl font-bold text-gray-800 dark:text-white mb-2">
                <span x-text="searchQuery ? 'No certificates match &quot;' + searchQuery + '&quot;' : 'No certificates found in this category'"></span>
            </h3>
            <p class="text-gray-500 dark:text-gray-400" x-text="searchQuery ? 'Try a different term, or clear the search to browse everything.' : 'Try switching to the All tab to browse everything.'"></p>
            <button type="button"
                    @click="resetSearch()"
                    class="mt-6 inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-sky-500/50 text-sky-600 dark:text-sky-400 text-sm font-semibold hover:bg-sky-500/10 transition-colors">
                <span x-text="searchQuery ? 'Clear search & show all' : 'Show all certificates'"></span>
            </button>
        </div>
    </div>
    <div x-cloak
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-ref="modal"
         role="dialog" aria-modal="true"
         :aria-label="cert ? cert.title : 'Certificate viewer'"
         @click.self="closeModal()"
         class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-6">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-md" aria-hidden="true" @click="closeModal()"></div>

        {{-- Modal card --}}
        <div class="relative w-full max-w-4xl max-h-[92vh] flex flex-col modal-panel rounded-2xl overflow-hidden shadow-2xl"
             @keydown="onKeydown($event)">
            {{-- Header --}}
            <div class="flex items-start justify-between gap-4 px-6 py-4 sm:px-7 sm:py-5 border-b"
                 :class="zoomed ? 'hidden' : ''">
                <div class="min-w-0">
                    <h3 class="font-display text-lg sm:text-xl font-bold tracking-wide leading-snug text-gray-900 dark:text-white" x-text="cert?.title"></h3>
                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                        <span class="px-2.5 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 font-semibold" x-text="cert?.badge"></span>
                        <span class="font-medium text-gray-500 dark:text-gray-400" x-text="cert?.issuer"></span>
                        <span class="text-gray-400 dark:text-gray-500" x-text="cert?.date"></span>
                    </div>
                </div>
                <button type="button" data-modal-focus
                        @click="closeModal()"
                        aria-label="Close modal"
                        class="shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 dark:bg-slate-700/60 text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600/60 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            {{-- Body / media preview --}}
            <div class="modal-body relative flex-1 min-h-0 overflow-hidden">
                <div class="h-full w-full flex items-center justify-center p-4 sm:p-6">
                    <template x-if="hasPdf()">
                        <div class="w-full h-[56vh] sm:h-[60vh] md:h-[64vh] relative flex flex-col"
                             :class="zoomed ? 'cursor-zoom-out' : 'cursor-zoom-in'"
                             @click="toggleZoom()">
                            <iframe :src="cert.pdfUrl" class="modal-zoom w-full h-full rounded-2xl border border-gray-200 dark:border-white/10 bg-white"
                                    :class="zoomed ? 'is-zoomed' : ''"
                                    title="Certificate PDF preview"
                                    loading="lazy"></iframe>
                        </div>
                    </template>
                    <template x-if="!hasPdf()">
                        <div class="w-full max-h-[62vh] flex flex-col items-center justify-center text-center gap-4 rounded-xl border-2 border-dashed border-gray-300 dark:border-white/15 bg-white/60 dark:bg-slate-800/40 px-6 py-14">
                            <span class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
                            </span>
                            <div>
                                <p class="font-display font-semibold text-gray-800 dark:text-white">PDF coming soon</p>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 max-w-sm">The official document for this certificate isn't available yet. Please check back later.</p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Action footer --}}
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 px-6 py-4 sm:px-7 sm:py-5 border-t border-gray-200/70 dark:border-white/10">
                <template x-if="hasPdf()">
                    <a :href="cert.pdfUrl" target="_blank" rel="noopener noreferrer"
                       class="flex-1 inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/25 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-blue-600/30 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="M10 14 21 3"/></svg>
                        View / Open Full PDF
                    </a>
                </template>
                <template x-if="hasPdf()">
                    <a :href="cert.pdfUrl" download
                       class="flex-1 inline-flex items-center justify-center gap-2 rounded-full border border-blue-600/40 dark:border-blue-400/40 text-blue-700 dark:text-blue-300 px-5 py-3 text-sm font-semibold hover:bg-blue-600/10 dark:hover:bg-blue-400/10 hover:-translate-y-0.5 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></svg>
                        Download PDF
                    </a>
                </template>
                <template x-if="!hasPdf()">
                    <button type="button" @click="closeModal()"
                            class="flex-1 inline-flex items-center justify-center gap-2 rounded-full bg-gray-200 dark:bg-slate-700/70 text-gray-700 dark:text-gray-200 px-5 py-3 text-sm font-semibold hover:bg-gray-300 dark:hover:bg-slate-600/60 hover:-translate-y-0.5 transition-all duration-300 ease-in-out">
                        Close
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>

{{-- ============ CONTACT ============ --}}
<section id="contact" class="scroll-mt-20 py-24 md:py-28 relative overflow-hidden">
    <div class="absolute top-10 left-1/4 -z-10 w-72 h-72 rounded-full bg-sky-500/10 blur-3xl dark:bg-sky-600/10"></div>
    <div class="glow-orb w-96 h-96 bg-cyan-400/10 dark:bg-cyan-500/15 -bottom-24 left-1/4" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center mb-16">
            <div class="flex justify-center mb-6"><span class="section-badge">Say Hello</span></div>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Get In Touch</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed tracking-wide">
                Have a question, an opportunity, or just want to connect? Reach out.
            </p>
        </div>

        <div class="reveal glass rounded-[2rem] p-8 md:p-12" data-direction="up"
             x-data="contactModal()">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                {{-- Left: contact details --}}
                <div>
                    <h3 class="font-display text-2xl font-bold tracking-wide mb-7 text-gray-900 dark:text-white">Contact Details</h3>
                    <div class="space-y-6">
                        <a href="tel:{{ $profile['phoneHref'] }}" class="flex items-center gap-4 group">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20 group-hover:scale-105 group-hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </span>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Phone</p>
                                <p class="font-semibold text-gray-900 dark:text-white tracking-wide">{{ $profile['phone'] }}</p>
                            </div>
                        </a>
                        <a href="mailto:{{ $profile['email'] }}" class="flex items-center gap-4 group">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20 group-hover:scale-105 group-hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </span>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                <p class="font-semibold text-gray-900 dark:text-white break-all tracking-wide">{{ $profile['email'] }}</p>
                            </div>
                        </a>
                        <div class="flex items-center gap-4">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white shadow-lg shadow-blue-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            </span>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Location</p>
                                <p class="font-semibold text-gray-900 dark:text-white tracking-wide">Poblacion, Pilar, Abra</p>
                            </div>
                        </div>
                            <div class="pt-3 border-t border-gray-200 dark:border-white/10">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Follow Me</p>
                                <div class="flex items-center gap-3" role="list" aria-label="Social media links">
                                    <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub profile" role="listitem"
                                       class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.27-.01-1.17-.02-2.12-3.2.7-3.88-1.36-3.88-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.72-1.54-2.55-.29-5.24-1.28-5.24-5.68 0-1.26.45-2.28 1.18-3.09-.12-.29-.51-1.46.11-3.05 0 0 .97-.31 3.17 1.18a11 11 0 0 1 5.78 0c2.2-1.49 3.16-1.18 3.16-1.18.63 1.59.24 2.76.12 3.05.74.81 1.18 1.83 1.18 3.09 0 4.41-2.7 5.38-5.27 5.66.42.36.78 1.07.78 2.16 0 1.56-.01 2.82-.01 3.2 0 .31.21.68.8.56A10.02 10.02 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                                    </a>
                                    <a href="{{ $profile['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook profile" role="listitem"
                                       class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.09 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.09 24 18.1 24 12.07z"/></svg>
                                    </a>
                                    <a href="{{ $profile['youtube'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube channel" role="listitem"
                                       class="social-link flex items-center justify-center w-11 h-11 rounded-full glass text-gray-600 dark:text-gray-300 hover:text-white hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-400 transition-all duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/></svg>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>

                {{-- Right: contact form --}}
                <div class="glass rounded-2xl p-6 md:p-8">
                    <form @submit="submitForm($event)" class="flex flex-col gap-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label for="name" class="font-medium text-gray-700 dark:text-gray-300">Name</label>
                                <input type="text" id="name" name="name" required minlength="2" maxlength="255" placeholder="Your name" autocomplete="name"
                                       :aria-invalid="errors.name ? 'true' : 'false'"
                                       aria-describedby="name-error"
                                       @input="clearError('name')"
                                       class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white/60 dark:bg-gray-800/60 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/30 focus:outline-none transition-all duration-300 ease-in-out">
                                <p id="name-error" x-show="errors.name" x-text="errors.name"
                                   class="text-sm font-medium text-red-600 dark:text-red-400"></p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="email" class="font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" id="email" name="email" required maxlength="255" placeholder="you@example.com" autocomplete="email"
                                       :aria-invalid="errors.email ? 'true' : 'false'"
                                       aria-describedby="email-error"
                                       @input="clearError('email')"
                                       class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white/60 dark:bg-gray-800/60 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/30 focus:outline-none transition-all duration-300 ease-in-out">
                                <p id="email-error" x-show="errors.email" x-text="errors.email"
                                   class="text-sm font-medium text-red-600 dark:text-red-400"></p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="message" class="font-medium text-gray-700 dark:text-gray-300">Message</label>
                            <textarea id="message" name="message" rows="5" required minlength="5" maxlength="5000" placeholder="Your message"
                                      :aria-invalid="errors.message ? 'true' : 'false'"
                                      aria-describedby="message-error"
                                      @input="clearError('message')"
                                      class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white/60 dark:bg-gray-800/60 px-4 py-3 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/30 focus:outline-none transition-all duration-300 ease-in-out resize-none"></textarea>
                            <p id="message-error" x-show="errors.message" x-text="errors.message"
                               class="text-sm font-medium text-red-600 dark:text-red-400"></p>
                        </div>

                        <button type="submit" :disabled="sending"
                                :aria-busy="sending ? 'true' : 'false'"
                                class="mt-2 w-full rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 px-4 py-3.5 text-center text-lg font-semibold text-white shadow-lg shadow-blue-600/25 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-600/30 disabled:cursor-not-allowed disabled:opacity-60 transition-all duration-300 ease-in-out">
                            <template x-if="sending">
                                <span class="inline-flex items-center space-x-2">
                                    <svg class="animate-spin" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Sending</span>
                                </span>
                            </template>
                            <template x-if="!sending">
                                <span>Send Message</span>
                            </template>
                        </button>
                        <p class="text-center text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                            Your details are only used to reply to your message.
                        </p>
                    </form>
                </div>
            </div>

            {{-- Toast (teleported to <body> so fixed positioning is viewport-relative) --}}
            <template x-teleport="body">
            <div x-show="showToast" x-cloak
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 :role="toastType === 'failure' ? 'alert' : 'status'"
                 :aria-live="toastType === 'failure' ? 'assertive' : 'polite'"
                 aria-atomic="true"
                 @mouseenter="pauseToast()"
                 @mouseleave="resumeToast()"
                 @focusin="pauseToast()"
                 @focusout="resumeToast()"
                 class="fixed inset-x-4 top-20 sm:inset-x-auto sm:right-6 sm:top-24 z-[99999] flex items-start gap-3 rounded-xl px-4 py-3.5 font-semibold text-white shadow-2xl"
                 :class="{
                     'bg-emerald-500': toastType === 'success',
                     'bg-yellow-500': toastType === 'warning',
                     'bg-red-600': toastType === 'failure'
                 }">
                <svg x-show="toastType === 'success'" class="h-5 w-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <svg x-show="toastType !== 'success'" class="h-5 w-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                <span class="text-sm leading-relaxed flex-1" x-text="toastMessage"></span>
                <button type="button" @click="dismissToast()"
                        aria-label="Dismiss notification"
                        class="-mr-2 -mt-2 flex items-center justify-center w-11 h-11 rounded-full text-white/80 hover:text-white hover:bg-white/15 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            </template>
        </div>
    </div>
</section>
@endsection
