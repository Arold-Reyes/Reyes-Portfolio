{{-- Back-to-top control: appears after scrolling, hidden until needed --}}
<button type="button"
        x-data="backToTop()"
        x-show="visible"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        @click="scrollToTop()"
        aria-label="Back to top"
        title="Back to top"
        class="back-to-top fixed bottom-5 right-4 sm:bottom-8 sm:right-6 z-30 flex items-center justify-center w-12 h-12 rounded-full glass text-gray-700 dark:text-gray-200 shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="m18 15-6-6-6 6"/>
    </svg>
</button>
