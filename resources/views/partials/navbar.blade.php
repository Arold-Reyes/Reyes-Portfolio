<header class="sticky top-0 z-40 glass-nav" role="banner">
    <nav class="max-w-7xl mx-auto flex items-center justify-between py-4 px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
        {{-- Brand --}}
        <a href="#home" @click="$store.menu.close()" class="flex items-center gap-2.5 group" aria-label="Arold Reyes - Home">
            <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-400 text-white text-sm font-black shadow-lg shadow-blue-600/30 group-hover:scale-105 transition-transform font-display" aria-hidden="true">
                AR
            </span>
            <span class="hidden sm:inline font-display font-bold tracking-wide text-gray-900 dark:text-white">
                AROLD REYES
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <ul class="hidden md:flex items-center space-x-6 lg:space-x-8" role="menubar">
            @foreach($navLinks as $link)
                <li role="none">
                    <a href="{{ '#'.$link['id'] }}"
                       data-section="{{ $link['id'] }}"
                       role="menuitem"
                       class="nav-link text-sm font-medium text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white transition-colors py-2">
                        {{ $link['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Right actions --}}
        <div class="flex items-center gap-3">
            <a href="#contact"
               class="hidden md:inline-flex px-5 py-2.5 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 text-white text-sm font-semibold shadow-lg shadow-blue-600/20 transition-all duration-300 ease-in-out"
               aria-label="Contact me - Hire Me">
                Hire Me
            </a>

            {{-- Theme toggle --}}
            <button @click="$store.theme.toggle()"
                    type="button"
                    aria-label="Toggle Light and Dark Mode"
                    :aria-pressed="$store.theme.dark ? 'true' : 'false'"
                    title="Toggle Light and Dark Mode"
                    class="flex items-center justify-center w-11 h-11 rounded-full text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors">
                <template x-if="$store.theme.dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                </template>
                <template x-if="!$store.theme.dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </template>
            </button>

            {{-- Mobile hamburger --}}
            <button @click="$store.menu.toggle()"
                    type="button"
                    :aria-expanded="$store.menu.open ? 'true' : 'false'"
                    aria-controls="mobile-menu"
                    aria-label="Toggle navigation menu"
                    class="md:hidden flex items-center justify-center w-11 h-11 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" aria-hidden="true" x-show="!$store.menu.open"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" aria-hidden="true" x-show="$store.menu.open" x-cloak><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    </nav>

    {{-- Full-width mobile overlay menu --}}
    <div id="mobile-menu"
         x-show="$store.menu.open" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         role="dialog"
         aria-modal="true"
         aria-label="Navigation menu"
         class="fixed inset-0 z-40 md:hidden bg-gray-950/95 dark:bg-black/95 backdrop-blur-xl flex flex-col mobile-nav-overlay">
        <nav class="flex-1 flex flex-col justify-center px-8">
            <ul class="flex flex-col space-y-2" role="menu">
                @foreach($navLinks as $link)
                    <li role="none">
                        <a href="{{ '#'.$link['id'] }}"
                           @click="$store.menu.close()"
                           role="menuitem"
                           class="flex items-center min-h-[48px] text-2xl font-semibold text-gray-200 hover:text-sky-400 transition-colors py-3">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="mt-12">
                <a href="#contact" @click="$store.menu.close()"
                   class="inline-flex items-center justify-center px-6 py-3.5 min-h-[48px] rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold shadow-lg shadow-blue-600/20 transition-all duration-300 ease-in-out"
                   role="menuitem">
                    Hire Me
                </a>
            </div>
        </nav>
    </div>
</header>
