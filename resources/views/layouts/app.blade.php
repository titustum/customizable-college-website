<!DOCTYPE html>
<html lang="en" style="
    --primary-color: {{ $institution->primary_color ?? '#FF5722' }};
    --primary-color-rgb: {{ $institution->primary_color_rgb ?? '255,87,34' }};
    --primary-font: 'Plus Jakarta Sans', sans-serif, 'Inter', sans-serif;
">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="{{ $institution->name }} offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <link rel="canonical" href="https://www.tetutvc.ac.ke" />

    <!-- Fonts -->
    <!-- Fonts: Clash Display (editorial) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('storage/'. $institution->logo) }}" type="image/jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tetutvc.ac.ke/">
    <meta property="og:title" content="{{ $institution->name }} | Quality Education in Kenya">
    <meta property="og:description"
        content="{{ $institution->name }} offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="og:image" content="{{ asset('storage/'.$institution->logo) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.tetutvc.ac.ke/">
    <meta property="twitter:title" content="{{ $institution->name }} | Quality Education in Kenya">
    <meta property="twitter:description"
        content="{{ $institution->name }} offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="twitter:image" content="{{ asset('storage/'.$institution->logo) }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="antialiased text-gray-800 ">

    <!-- TOP HEADER BAR (unchanged) -->
    <div class="bg-gray-900 text-gray-300 text-sm py-2 px-4">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-y-2">
            <div class="flex flex-wrap items-center gap-4">
                <a href="tel:+254758660300" class="flex items-center gap-1.5 hover:text-orange-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.7" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    +254 758 660 300
                </a>
                <a href="mailto:info@tetutvc.ac.ke"
                    class="flex items-center gap-1.5 hover:text-orange-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.7" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    info@tetutvc.ac.ke
                </a>
            </div>
            <div class="flex items-center gap-5">
                <div class="hidden sm:flex items-center gap-4 border-r border-gray-700 pr-5">
                    <a href="#" class="hover:text-orange-500 transition-colors">Tenders</a>
                    <a href="#" class="hover:text-orange-500 transition-colors">Vacancies</a>
                    <a href="#" class="hover:text-orange-500 transition-colors font-semibold text-orange-400">ODeL</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#" aria-label="Facebook" class="hover:text-orange-500 transition-colors"><svg
                            class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg></a>
                    <a href="#" aria-label="TikTok" class="hover:text-orange-500 transition-colors"><svg class="w-4 h-4"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.67a8.18 8.18 0 004.79 1.52V6.74a4.85 4.85 0 01-1.02-.05z" />
                        </svg></a>
                    <a href="#" aria-label="Twitter" class="hover:text-orange-500 transition-colors"><svg
                            class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg></a>
                    <a href="#" aria-label="YouTube" class="hover:text-orange-500 transition-colors"><svg
                            class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg></a>
                </div>
            </div>
        </div>
    </div>

    <!-- STICKY NAVBAR (updated: removed old mobile menu block, added drawer trigger) -->
    <nav id="navbar" class="sticky top-0 z-50 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                    <img src="{{ asset('storage/'.$institution->logo) }}" alt="Logo" class="h-10 w-auto object-contain">
                    <div class="leading-tight">
                        <div class="font-display font-bold text-gray-900 text-lg leading-none">TETU TVC</div>
                        <div class="text-xs text-gray-500 tracking-wide">Skills for Industrial Growth</div>
                    </div>
                </a>

                <!-- Desktop nav (unchanged) -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}"
                        class="nav-link px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">Home</a>
                    <a href="{{ route('about') }}"
                        class="nav-link px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">About
                        Us</a>
                    <div class="dropdown relative px-1">
                        <button
                            class="nav-link flex items-center gap-1 px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">Administration
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div class="dropdown-menu rounded-b-lg overflow-hidden">
                            <a href="{{ route('principal.office') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Principal's
                                Office</a>
                            <a href="{{ route('deputy.admin') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Deputy
                                Principal – Administration</a>
                            <a href="{{ route('deputy.academics') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Deputy
                                Principal – Academics</a>
                            <a href="{{ route('staff.members') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Our
                                Staff Team</a>
                        </div>
                    </div>
                    <div class="dropdown relative px-1">
                        <button
                            class="nav-link flex items-center gap-1 px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">Departments
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div class="dropdown-menu mega rounded-b-lg p-6">
                            @php
                            $academicDepts = $departments->where('type', 'academic');
                            $nonAcademicDepts = $departments->where('type', 'non-academic');
                            @endphp
                            <div class="grid grid-cols-2 gap-6">
                                @if ($academicDepts->isNotEmpty())
                                <div>
                                    <div class="text-xs font-bold uppercase tracking-widest text-orange-600 mb-3">Academic</div>
                                    <div class="space-y-1">
                                        @foreach ($academicDepts as $dept)
                                        <a href="{{ route('academic.department', $dept->slug) }}" class="flex items-center gap-2 py-1.5 text-sm hover:text-orange-600">{{ $dept->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if ($nonAcademicDepts->isNotEmpty())
                                <div>
                                    <div class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-3">Non-Academic</div>
                                    <div class="space-y-1">
                                        @foreach ($nonAcademicDepts as $dept)
                                        <a href="{{ route('non.academic.department', $dept->slug) }}" class="flex items-center gap-2 py-1.5 text-sm hover:text-orange-600">{{ $dept->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('courses') }}"
                        class="nav-link px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">Courses</a>
                    <div class="dropdown relative px-1">

                        <button
                            class="nav-link flex items-center gap-1 px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">
                            More
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg></button>
                        <div class="dropdown-menu rounded-b-lg overflow-hidden">
                            <a href="{{ route('gallery') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Gallery</a>
                            <a href="{{ route('news') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">News
                                & Updates</a>
                            <a href="{{ route('downloads') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Downloads</a>
                            <a href="{{ route('past.papers') }}"
                                class="block px-5 py-3 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Past
                                Papers</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}"
                        class="nav-link px-3 py-2 text-sm font-semibold text-gray-800 hover:text-orange-600 transition-colors">Contact
                        Us</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admissions') }}"
                        class="hidden sm:inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-bold px-5 py-2.5 rounded-lg transition-colors shadow-sm"><svg
                            class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>Apply Now</a>
                    <button id="menu-drawer-btn" aria-label="Open menu"
                        class="lg:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors"><svg
                            class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- LEFT SLIDING MOBILE DRAWER (off-canvas) + OVERLAY -->
    <div id="drawer-overlay" class="drawer-overlay fixed inset-0 bg-black/60 z-50 backdrop-blur-sm"></div>
    <div id="mobile-drawer"
        class="mobile-drawer fixed top-0 left-0 h-full w-[85%] max-w-sm bg-white shadow-2xl z-[60] flex flex-col overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-100 px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-orange-600 rounded-lg flex items-center justify-center"><svg
                        class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347" />
                    </svg></div><span class="font-bold text-gray-800">Menu</span>
            </div>
            <button id="close-drawer-btn" class="p-2 -mr-2 text-gray-500 hover:text-orange-600"><svg class="w-6 h-6"
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg></button>
        </div>
        <div class="px-4 py-4 flex flex-col gap-2">
            <a href="{{ route('home') }}"
                class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Home</a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg">About
                Us</a>
            <details class="group">
                <summary
                    class="flex items-center justify-between px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg cursor-pointer list-none">
                    Administration<svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg></summary>
                <div class="ml-4 mt-1 space-y-1 border-l-2 border-orange-200 pl-3">
                    <a href="{{ route('principal.office') }}" class="block py-2 text-sm">Principal's Office</a>
                    <a href="{{ route('deputy.admin') }}" class="block py-2 text-sm">Deputy Principal –
                        Administration</a>
                    <a href="{{ route('deputy.academics') }}" class="block py-2 text-sm">Deputy Principal –
                        Academics</a>
                    <a href="{{ route('staff.members') }}" class="block py-2 text-sm">Our Staff Team</a>
                </div>
            </details>
            <details class="group">
                <summary
                    class="flex items-center justify-between px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg cursor-pointer list-none">
                    Departments<svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg></summary>
                <div class="ml-4 mt-1 border-l-2 border-orange-200 pl-3 space-y-2">
                    @php
                    $academicDepts = $departments->where('type', 'academic');
                    $nonAcademicDepts = $departments->where('type', 'non-academic');
                    @endphp
                    @if ($academicDepts->isNotEmpty())
                    <div class="text-xs font-bold uppercase text-orange-600 pt-1">Academic</div>
                    @foreach ($academicDepts as $dept)
                    <a href="{{ route('academic.department', $dept->slug) }}" class="block py-1 text-sm">{{ $dept->name }}</a>
                    @endforeach
                    @endif
                    @if ($nonAcademicDepts->isNotEmpty())
                    <div class="text-xs font-bold uppercase text-gray-500 pt-1">Non-Academic</div>
                    @foreach ($nonAcademicDepts as $dept)
                    <a href="{{ route('non.academic.department', $dept->slug) }}" class="block py-1 text-sm">{{ $dept->name }}</a>
                    @endforeach
                    @endif
                </div>
            </details>
            <a href="{{ route('courses') }}"
                class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Courses</a>
            <details class="group">
                <summary
                    class="flex items-center justify-between px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg cursor-pointer list-none">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                        More
                    </span>
                    <svg class="w-4 h-4 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </summary>
                <div class="ml-4 mt-1 border-l-2 border-orange-200 pl-3 space-y-2">
                    <a href="{{ route('gallery') }}" class="block py-1 text-sm">Gallery</a>
                    <a href="{{ route('news') }}" class="block py-1 text-sm">News & Updates</a>
                    <a href="{{ route('downloads') }}" class="block py-1 text-sm">Downloads</a>
                    <a href="{{ route('past.papers') }}" class="block py-1 text-sm">Past Papers</a>
                </div>
            </details>
            <a href="{{ route('contact') }}"
                class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Contact
                Us</a>
            <div class="pt-4 mt-2"><a href="{{ route('admissions') }}"
                    class="flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white font-bold px-5 py-3 rounded-lg w-full">Apply
                    Now</a></div>
        </div>
        <div class="mt-auto p-5 border-t border-gray-100 text-xs text-gray-500">
            <p class="text-center">Tetu TVC — Skills for the Future</p>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════
        PAGE SLOT
    ═══════════════════════════════════════════ -->
    {{ $slot }}


    <!-- ═══════════════════════════════════════════
        FOOTER
    ═══════════════════════════════════════════ -->
    <footer class="bg-gray-900 text-white">

        <!-- Main footer content -->
        <div class="max-w-7xl mx-auto px-4 lg:px-8 py-14">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">

                <!-- Brand -->
                <div data-aos="fade-up">
                    <div class="flex items-center gap-2.5 mb-4">
                        <img src="{{ asset('storage/'.$institution->logo) }}" alt="Logo"
                            class="h-10 w-auto object-contain brightness-0 invert opacity-90">
                        <span class="font-righteous text-xl text-white/90">{{ $institution->name }}</span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-5">{{ $institution->name }} is committed to
                        providing quality education and training to empower students for successful careers.</p>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-orange-300 transition-colors">
                        Learn More <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Quick Links -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-sm font-bold tracking-widest uppercase text-gray-400 mb-4">Quick Links</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('courses') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Programs & Courses</a>
                        </li>
                        <li><a href="{{ route('admissions') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Admissions</a></li>
                        <li><a href="{{ route('departments') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Departments</a></li>
                        <li><a href="{{ route('administration') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Administration</a></li>
                        <li><a href="{{ route('downloads') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Downloads</a></li>
                        <li><a href="#"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Tenders</a></li>
                        <li><a href="{{ route('vacancies') }}"
                                class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors"><i
                                    class="fas fa-chevron-right text-[9px] text-primary"></i> Vacancies</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-sm font-bold tracking-widest uppercase text-gray-400 mb-4">Contact Us</h3>
                    <ul class="space-y-3.5">
                        <li class="flex items-start gap-3 text-sm text-gray-400">
                            <span
                                class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-primary shrink-0 mt-0.5 text-xs"><i
                                    class="fas fa-map-marker-alt"></i></span>
                            {{ $institution->address }}
                        </li>
                        <li>
                            <a href="tel:{{ $institution->phone }}"
                                class="flex items-center gap-3 text-sm text-gray-400 hover:text-white transition-colors">
                                <span
                                    class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-primary shrink-0 text-xs"><i
                                        class="fas fa-phone"></i></span>
                                {{ $institution->phone }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $institution->email }}"
                                class="flex items-center gap-3 text-sm text-gray-400 hover:text-white transition-colors">
                                <span
                                    class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-primary shrink-0 text-xs"><i
                                        class="fas fa-envelope"></i></span>
                                {{ $institution->email }}
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Footer bottom bar -->
        <div class="border-t border-white/5">
            <div
                class="max-w-7xl mx-auto px-4 lg:px-8 py-5 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <a href="#" aria-label="Facebook"
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-white/5 text-gray-400 hover:bg-primary hover:text-white transition-all text-xs"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="TikTok"
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-white/5 text-gray-400 hover:bg-primary hover:text-white transition-all text-xs"><i
                            class="fab fa-tiktok"></i></a>
                    <a href="#" aria-label="Twitter/X"
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-white/5 text-gray-400 hover:bg-primary hover:text-white transition-all text-xs"><i
                            class="fab fa-x-twitter"></i></a>
                    <a href="#" aria-label="Instagram"
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-white/5 text-gray-400 hover:bg-primary hover:text-white transition-all text-xs"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <p class="text-xs text-gray-500 text-center">
                    © {{ date('Y') }} {{ $institution->name }}. Crafted by
                    <a href="http://github.com/titustum"
                        class="text-blue-400 hover:text-blue-300 hover:underline transition-colors">Titus Tum</a>.
                </p>
            </div>
        </div>
    </footer>


    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</body>

</html>
