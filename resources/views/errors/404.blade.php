@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4 pt-16">
    <div class="text-center">
        <h1 class="font-display text-6xl sm:text-8xl font-extrabold bg-gradient-to-r from-blue-600 to-cyan-400 bg-clip-text text-transparent mb-4">404</h1>
        <p class="text-xl text-gray-500 dark:text-gray-400 mb-8 tracking-wide">Page not found</p>
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold rounded-full shadow-lg shadow-blue-600/25 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-600/30 transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Go Home
        </a>
    </div>
</section>
@endsection
