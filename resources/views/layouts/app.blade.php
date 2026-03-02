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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .bg-primary {
            background-color: var(--primary-color);
        }

        .bg-primary-50 {
            background-color: rgba(var(--primary-color-rgb), 0.08);
        }

        .hover\:bg-primary:hover {
            background-color: var(--primary-color);
        }

        .text-primary {
            color: var(--primary-color);
        }

        .border-primary {
            border-color: var(--primary-color);
        }

        .hover\:text-primary:hover {
            color: var(--primary-color);
        }

        .hover\:border-primary:hover {
            border-color: var(--primary-color);
        }

        .ring-primary {
            --tw-ring-color: var(--primary-color);
        }

        html {
            scroll-behavior: smooth;
        }

        @media (max-width: 480px) {
            html {
                font-size: 15px;
            }
        }

        @media (max-width: 767px) {

            .swiper-button-prev,
            .swiper-button-next {
                display: none !important;
            }
        }

        /* Mega-menu column headers */
        .mega-menu-label {
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 700;
        }

        /* Smooth dropdown reveal */
        .nav-dropdown {
            pointer-events: none;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .group:hover .nav-dropdown {
            pointer-events: auto;
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile slide-in */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu-open {
            transform: translateX(0);
        }

        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out;
        }

        .menu-overlay-open {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="antialiased text-gray-800 ">

    <!-- ═══════════════════════════════════════════
        TOP BAR
    ═══════════════════════════════════════════ -->
    <header class="bg-gray-950 text-white h-9 flex items-center border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 lg:px-8 flex items-center justify-between w-full">

            <!-- Social icons -->
            <nav class="hidden md:flex items-center gap-0.5" aria-label="Social media">
                <a href="{{ $institution->facebook ?? '#' }}" aria-label="Facebook"
                    class="w-7 h-7 flex items-center justify-center rounded text-white/40 text-xs hover:text-white hover:bg-white/10 transition-all duration-200"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="{{ $institution->tiktok ?? '#' }}" aria-label="TikTok"
                    class="w-7 h-7 flex items-center justify-center rounded text-white/40 text-xs hover:text-white hover:bg-white/10 transition-all duration-200"><i
                        class="fab fa-tiktok"></i></a>
                <a href="{{ $institution->twitter ?? '#' }}" aria-label="Twitter/X"
                    class="w-7 h-7 flex items-center justify-center rounded text-white/40 text-xs hover:text-white hover:bg-white/10 transition-all duration-200"><i
                        class="fab fa-x-twitter"></i></a>
                <a href="{{ $institution->youtube ?? '#' }}" aria-label="YouTube"
                    class="w-7 h-7 flex items-center justify-center rounded text-white/40 text-xs hover:text-white hover:bg-white/10 transition-all duration-200"><i
                        class="fab fa-youtube"></i></a>
            </nav>

            <!-- Contact + quick links -->
            <div class="flex items-center text-[11px] text-white/50 divide-x divide-white/10 ml-auto">
                <a href="tel:{{ $institution->phone }}"
                    class="flex items-center gap-1.5 px-3 whitespace-nowrap hover:text-white transition-colors">
                    <i class="fas fa-phone-alt text-[9px] opacity-60"></i>{{ $institution->phone ?? '+254 700 000 000'
                    }}
                </a>
                <a href="mailto:{{ $institution->email }}"
                    class="flex items-center gap-1.5 px-3 whitespace-nowrap hover:text-white transition-colors">
                    <i class="fas fa-envelope text-[9px] opacity-60"></i>{{ $institution->email ?? 'info@tetutvc.ac.ke'
                    }}
                </a>
                <a href="#" class="hidden md:flex px-3 hover:text-white transition-colors">Tenders</a>
                <a href="{{ route('downloads') }}"
                    class="hidden md:flex px-3 hover:text-white transition-colors">Downloads</a>
                <a href="{{ route('vacancies') ?? '#' }}"
                    class="hidden md:flex px-3 hover:text-white transition-colors">Vacancies</a>
                <a href="{{ route('past.papers') ?? '#' }}"
                    class="hidden md:flex px-3 hover:text-white transition-colors">Past Papers</a>
            </div>
        </div>
    </header>


    <!-- ═══════════════════════════════════════════
        MAIN NAVIGATION
    ═══════════════════════════════════════════ -->
    <nav id="mainNav"
        class="sticky top-0 z-30 h-[68px] bg-white/98 backdrop-blur-lg border-b border-gray-100 shadow-sm flex items-center"
        role="navigation" aria-label="Main navigation">

        <div class="max-w-7xl mx-auto flex items-center justify-between px-4 lg:px-8 w-full">

            <!-- Hamburger (mobile) -->
            <button id="mobile-menu-button" aria-label="Toggle mobile menu"
                class="xl:hidden p-2 rounded-lg text-gray-600 hover:text-primary hover:bg-gray-100 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 text-primary">
                @if ($institution->logo)
                <img src="{{ asset('storage/'.$institution->logo) }}" alt="{{ $institution->name }} logo"
                    class="h-11 w-auto object-contain">
                @endif
                <span class="font-['Righteous'] text-2xl hidden lg:inline leading-none">{{ $institution->name }}</span>
            </a>

            <!-- Desktop Nav -->
            <div class="items-center hidden xl:flex text-[13px] font-semibold tracking-wide text-gray-700">

                <!-- Home -->
                <a href="{{ route('home') }}" @class(['px-3.5 py-5 border-b-2 transition-all
                    hover:text-primary', 'text-primary border-primary'=> request()->routeIs('home'),
                    'border-transparent' => !request()->routeIs('home')])>
                    Home
                </a>

                <!-- About -->
                <a href="{{ route('about') }}" @class(['px-3.5 py-5 border-b-2 transition-all
                    hover:text-primary', 'text-primary border-primary'=> request()->routeIs('about'),
                    'border-transparent' => !request()->routeIs('about')])>
                    About
                </a>

                <!-- ── ADMINISTRATION Mega-dropdown ── -->
                <div class="relative group">
                    <button @class(['flex items-center gap-1 px-3.5 py-5 border-b-2 transition-all
                        hover:text-primary', 'text-primary border-primary'=>
                        request()->routeIs('principal.office','staff.members','administration','dean.students','registry','teaching.staff','non.teaching.staff'),
                        'border-transparent' =>
                        !request()->routeIs('principal.office','staff.members','administration','dean.students','registry','teaching.staff','non.teaching.staff')])>
                        Administration
                        <i
                            class="fas fa-chevron-down text-[9px] opacity-60 group-hover:rotate-180 transition-transform duration-200"></i>
                    </button>

                    <!-- Mega menu -->
                    <div
                        class="nav-dropdown absolute left-0 top-full z-50 w-[480px] bg-white rounded-xl shadow-2xl border border-gray-100 p-5">
                        <div class="grid grid-cols-2 gap-x-6 gap-y-1">

                            <!-- Column 1: Leadership -->
                            <div>
                                <p class="mega-menu-label text-gray-400 mb-2 pb-1.5 border-b border-gray-100">Leadership
                                </p>
                                <a href="{{ route('principal.office') }}" @class(['flex items-center gap-2.5 px-2 py-2
                                    rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=>
                                    request()->routeIs('principal.office')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-user-tie"></i></span>
                                    Principal
                                </a>
                                <a href="{{ route('administration') }}" @class(['flex items-center gap-2.5 px-2 py-2
                                    rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=>
                                    request()->routeIs('administration')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-briefcase"></i></span>
                                    DP – Administration
                                </a>
                                <a href="#" @class(['flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm
                                    text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=> request()->routeIs('academics')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-graduation-cap"></i></span>
                                    DP – Academics
                                </a>
                                <a href="#" @class(['flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm
                                    text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=>
                                    request()->routeIs('dean.students')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-users"></i></span>
                                    Dean of Students
                                </a>
                                <a href="#" @class(['flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm
                                    text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=> request()->routeIs('registry')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-folder-open"></i></span>
                                    Registry Office
                                </a>
                            </div>

                            <!-- Column 2: Staff -->
                            <div>
                                <p class="mega-menu-label text-gray-400 mb-2 pb-1.5 border-b border-gray-100">Staff
                                    Directory</p>
                                <a href="{{ route('staff.members') }}" @class(['flex items-center gap-2.5 px-2 py-2
                                    rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=>
                                    request()->routeIs('staff.members')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-chalkboard-teacher"></i></span>
                                    All Teaching Staff
                                </a>
                                <a href="#" @class(['flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm
                                    text-gray-700 hover:bg-primary-50 hover:text-primary
                                    transition-all', 'text-primary bg-primary-50'=>
                                    request()->routeIs('non.teaching.staff')])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-hard-hat"></i></span>
                                    All Non-Teaching Staff
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── DEPARTMENTS Mega-dropdown ── -->
                <div class="relative group">
                    <a href="{{ route('departments') }}" @class(['flex items-center gap-1 px-3.5 py-5 border-b-2
                        transition-all hover:text-primary', 'text-primary border-primary'=>
                        request()->routeIs('departments','department'),
                        'border-transparent' => !request()->routeIs('departments','department')])>
                        Departments
                        <i
                            class="fas fa-chevron-down text-[9px] opacity-60 group-hover:rotate-180 transition-transform duration-200"></i>
                    </a>

                    <div
                        class="nav-dropdown absolute left-0 top-full z-50 w-[520px] bg-white rounded-xl shadow-2xl border border-gray-100 p-5">
                        <div class="grid grid-cols-2 gap-x-6 gap-y-1">

                            <!-- Academic Departments -->
                            <div>
                                <p class="mega-menu-label text-gray-400 mb-2 pb-1.5 border-b border-gray-100">Academic
                                    Departments</p>
                                @foreach ($departments->where('type', 'academic') as $department)
                                <a href="{{ route('department', $department->slug) }}" @class(['flex items-center
                                    gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50
                                    hover:text-primary transition-all', 'text-primary bg-primary-50'=>
                                    request()->is('departments/'.$department->slug)])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0">
                                        <i class="fas fa-book-open"></i>
                                    </span>
                                    {{ $department->name }}
                                </a>
                                @endforeach

                                {{-- Fallback if no type column: render all departments here --}}
                                @if($departments->where('type', 'academic')->isEmpty())
                                @foreach ($departments as $department)
                                <a href="{{ route('department', $department->slug) }}" @class(['flex items-center
                                    gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50
                                    hover:text-primary transition-all', 'text-primary bg-primary-50'=>
                                    request()->is('departments/'.$department->slug)])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0">
                                        <i class="fas fa-book-open"></i>
                                    </span>
                                    {{ $department->name }}
                                </a>
                                @endforeach
                                @endif
                            </div>

                            <!-- Non-Academic Departments -->
                            <div>
                                <p class="mega-menu-label text-gray-400 mb-2 pb-1.5 border-b border-gray-100">
                                    Non-Academic</p>
                                @foreach ($departments->where('type', 'non-academic') as $department)
                                <a href="{{ route('department', $department->slug) }}" @class(['flex items-center
                                    gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50
                                    hover:text-primary transition-all', 'text-primary bg-primary-50'=>
                                    request()->is('departments/'.$department->slug)])>
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0">
                                        <i class="fas {{ $department->icon ?? 'fa-star' }}"></i>
                                    </span>
                                    {{ $department->name }}
                                </a>
                                @endforeach

                                {{-- Static non-academic departments as fallback / supplement --}}
                                @if($departments->where('type', 'non-academic')->isEmpty())
                                <a href="#"
                                    class="flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary transition-all">
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-heart"></i></span>
                                    Guidance &amp; Counselling
                                </a>
                                <a href="#"
                                    class="flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary transition-all">
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-running"></i></span>
                                    Sports
                                </a>
                                <a href="#"
                                    class="flex items-center gap-2.5 px-2 py-2 rounded-lg text-sm text-gray-700 hover:bg-primary-50 hover:text-primary transition-all">
                                    <span
                                        class="w-7 h-7 rounded-lg bg-orange-50 flex items-center justify-center text-primary text-xs shrink-0"><i
                                            class="fas fa-music"></i></span>
                                    Music &amp; Arts
                                </a>
                                @endif

                                <div class="mt-3 pt-3 border-t border-gray-100">
                                    <a href="{{ route('departments') }}"
                                        class="flex items-center gap-1.5 text-xs text-primary font-semibold hover:underline">
                                        View all departments <i class="fas fa-arrow-right text-[9px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Courses -->
                <a href="{{ route('courses') }}" @class(['px-3.5 py-5 border-b-2 transition-all
                    hover:text-primary', 'text-primary border-primary'=> request()->routeIs('courses'),
                    'border-transparent' => !request()->routeIs('courses')])>
                    Courses
                </a>

                <!-- Contact -->
                <a href="{{ route('contact') }}" @class(['px-3.5 py-5 border-b-2 transition-all
                    hover:text-primary', 'text-primary border-primary'=> request()->routeIs('contact'),
                    'border-transparent' => !request()->routeIs('contact')])>
                    Contact
                </a>
            </div>

            <!-- CTA -->
            <div class="flex items-center gap-2">
                <a href="{{ route('admissions') }}"
                    class="hidden lg:inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-full shadow hover:shadow-md hover:brightness-110 transition-all duration-200">
                    <i class="fas fa-pen-to-square text-xs"></i>
                    Apply Now
                </a>
                <a href="{{ route('admissions') }}"
                    class="lg:hidden inline-flex items-center gap-1 px-3.5 py-2 text-sm font-semibold text-primary border border-primary rounded-full hover:bg-primary hover:text-white transition-all duration-200">
                    Apply →
                </a>
            </div>
        </div>
    </nav>


    <!-- ═══════════════════════════════════════════
        MOBILE MENU (Slide-in drawer)
    ═══════════════════════════════════════════ -->
    <div id="mobile-menu" class="mobile-menu fixed inset-y-0 left-0 z-50 bg-white w-80 shadow-2xl overflow-y-auto">

        <!-- Drawer header -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('storage/'.$institution->logo) }}" alt="Logo" class="h-9 w-auto object-contain">
                <span class="font-['Righteous'] text-xl text-primary leading-none">{{ $institution->name }}</span>
            </a>
            <button id="close-mobile-menu" aria-label="Close mobile menu"
                class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-500 hover:text-primary hover:bg-gray-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Quick badge: Apply Now -->
        <div class="px-5 py-3 bg-primary-50 border-b border-orange-100">
            <a href="{{ route('admissions') }}"
                class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-semibold text-white bg-primary rounded-lg hover:brightness-110 transition-all">
                <i class="fas fa-pen-to-square text-xs"></i> Apply Now
            </a>
        </div>

        <div class="px-4 py-3 space-y-0.5">

            <a href="{{ route('home') }}" @class(['flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                request()->routeIs('home'),
                'text-gray-700' => !request()->routeIs('home')])>
                <i class="fas fa-house w-4 text-center opacity-60"></i> Home
            </a>

            <a href="{{ route('about') }}" @class(['flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                request()->routeIs('about'),
                'text-gray-700' => !request()->routeIs('about')])>
                <i class="fas fa-circle-info w-4 text-center opacity-60"></i> About Us
            </a>

            <!-- Mobile: Administration accordion -->
            <div class="mobile-dropdown">
                <button @class(['flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium
                    transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                    request()->routeIs('principal.office','staff.members','administration','dean.students','registry','teaching.staff','non.teaching.staff'),
                    'text-gray-700' => true])>
                    <span class="flex items-center gap-3"><i class="fas fa-landmark w-4 text-center opacity-60"></i>
                        Administration</span>
                    <i class="fas fa-chevron-down text-[10px] opacity-50 transition-transform duration-200"></i>
                </button>
                <div class="hidden pl-7 mt-1 space-y-0.5 pb-1">
                    <p class="text-[10px] font-bold tracking-widest uppercase text-gray-400 px-3 pt-2 pb-1">Leadership
                    </p>
                    <a href="{{ route('principal.office') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-user-tie w-3.5 text-center text-xs opacity-60"></i> Principal</a>
                    <a href="{{ route('administration') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-briefcase w-3.5 text-center text-xs opacity-60"></i> DP – Administration</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-graduation-cap w-3.5 text-center text-xs opacity-60"></i> DP – Academics</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-users w-3.5 text-center text-xs opacity-60"></i> Dean of Students</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-folder-open w-3.5 text-center text-xs opacity-60"></i> Registry Office</a>
                    <p class="text-[10px] font-bold tracking-widest uppercase text-gray-400 px-3 pt-2 pb-1">Staff</p>
                    <a href="{{ route('staff.members') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-chalkboard-teacher w-3.5 text-center text-xs opacity-60"></i> Teaching
                        Staff</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-hard-hat w-3.5 text-center text-xs opacity-60"></i> Non-Teaching Staff</a>
                </div>
            </div>

            <!-- Mobile: Departments accordion -->
            <div class="mobile-dropdown">
                <button @class(['flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium
                    transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                    request()->routeIs('departments','department'),
                    'text-gray-700' => true])>
                    <span class="flex items-center gap-3"><i
                            class="fas fa-building-columns w-4 text-center opacity-60"></i> Departments</span>
                    <i class="fas fa-chevron-down text-[10px] opacity-50 transition-transform duration-200"></i>
                </button>
                <div class="hidden pl-7 mt-1 space-y-0.5 pb-1">
                    <p class="text-[10px] font-bold tracking-widest uppercase text-gray-400 px-3 pt-2 pb-1">Academic</p>
                    @foreach ($departments->where('type', 'academic') as $department)
                    <a href="{{ route('department', $department->slug) }}" @class(['flex items-center gap-2 px-3 py-2
                        rounded-lg text-sm hover:bg-primary-50 hover:text-primary transition-all', 'text-primary'=>
                        request()->is('departments/'.$department->slug),
                        'text-gray-600' => !request()->is('departments/'.$department->slug)])>
                        <i class="fas fa-book-open w-3.5 text-center text-xs opacity-60"></i>
                        {{ $department->name }}
                    </a>
                    @endforeach

                    @if($departments->where('type', 'academic')->isEmpty())
                    @foreach ($departments as $department)
                    <a href="{{ route('department', $department->slug) }}" @class(['flex items-center gap-2 px-3 py-2
                        rounded-lg text-sm hover:bg-primary-50 hover:text-primary transition-all', 'text-primary'=>
                        request()->is('departments/'.$department->slug),
                        'text-gray-600' => !request()->is('departments/'.$department->slug)])>
                        <i class="fas fa-book-open w-3.5 text-center text-xs opacity-60"></i>
                        {{ $department->name }}
                    </a>
                    @endforeach
                    @endif

                    <p class="text-[10px] font-bold tracking-widest uppercase text-gray-400 px-3 pt-2 pb-1">Non-Academic
                    </p>
                    @foreach ($departments->where('type', 'non-academic') as $department)
                    <a href="{{ route('department', $department->slug) }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all">
                        <i class="fas fa-star w-3.5 text-center text-xs opacity-60"></i>
                        {{ $department->name }}
                    </a>
                    @endforeach

                    @if($departments->where('type', 'non-academic')->isEmpty())
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-heart w-3.5 text-center text-xs opacity-60"></i> Guidance &amp;
                        Counselling</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-running w-3.5 text-center text-xs opacity-60"></i> Sports</a>
                    <a href="#"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-primary-50 hover:text-primary transition-all"><i
                            class="fas fa-music w-3.5 text-center text-xs opacity-60"></i> Music &amp; Arts</a>
                    @endif
                </div>
            </div>

            <a href="{{ route('courses') }}" @class(['flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                request()->routeIs('courses'),
                'text-gray-700' => !request()->routeIs('courses')])>
                <i class="fas fa-list-check w-4 text-center opacity-60"></i> Courses
            </a>

            <a href="{{ route('contact') }}" @class(['flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                transition-all hover:bg-primary-50 hover:text-primary', 'text-primary bg-primary-50'=>
                request()->routeIs('contact'),
                'text-gray-700' => !request()->routeIs('contact')])>
                <i class="fas fa-envelope w-4 text-center opacity-60"></i> Contact Us
            </a>

            <!-- Divider + utility links -->
            <div class="pt-3 mt-3 border-t border-gray-100 space-y-0.5">
                <a href="{{ route('downloads') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-primary-50 hover:text-primary transition-all">
                    <i class="fas fa-download w-4 text-center opacity-60"></i> Downloads
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-primary-50 hover:text-primary transition-all">
                    <i class="fas fa-file-contract w-4 text-center opacity-60"></i> Tenders
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-primary-50 hover:text-primary transition-all">
                    <i class="fas fa-briefcase-blank w-4 text-center opacity-60"></i> Vacancies
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-primary-50 hover:text-primary transition-all">
                    <i class="fas fa-file-lines w-4 text-center opacity-60"></i> Past Papers
                </a>
            </div>

            <!-- Social -->
            <div class="pt-4 mt-2 border-t border-gray-100 flex items-center gap-2 px-3">
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 hover:bg-primary hover:text-white transition-all text-sm"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 hover:bg-primary hover:text-white transition-all text-sm"><i
                        class="fab fa-tiktok"></i></a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 hover:bg-primary hover:text-white transition-all text-sm"><i
                        class="fab fa-x-twitter"></i></a>
                <a href="#"
                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 text-gray-500 hover:bg-primary hover:text-white transition-all text-sm"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="menu-overlay" class="menu-overlay fixed inset-0 z-40 bg-black/50 backdrop-blur-sm"></div>


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
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">

                <!-- Brand -->
                <div data-aos="fade-up">
                    <div class="flex items-center gap-2.5 mb-4">
                        <img src="{{ asset('storage/'.$institution->logo) }}" alt="Logo"
                            class="h-10 w-auto object-contain brightness-0 invert opacity-90">
                        <span class="font-['Righteous'] text-xl text-white/90">{{ $institution->name }}</span>
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
                        <li><a href="#"
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

                <!-- Newsletter -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-sm font-bold tracking-widest uppercase text-gray-400 mb-4">Stay Connected</h3>
                    <p class="text-sm text-gray-400 mb-4 leading-relaxed">Subscribe to our newsletter for the latest
                        updates, news, and announcements.</p>
                    <div
                        class="flex rounded-lg overflow-hidden border border-white/10 focus-within:border-primary/50 transition-colors">
                        <input type="email" placeholder="your@email.com"
                            class="flex-1 px-3.5 py-2.5 bg-white/5 rounded-l-lg text-sm  text-white placeholder-gray-500 focus:outline-none">
                        <button type="button"
                            class="px-4 py-2.5 bg-primary hover:brightness-110 transition-all text-sm font-semibold whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ── AOS ──────────────────────────────────
            AOS.init({ duration: 900, once: true, easing: 'ease-out-cubic' });

            // ── Swiper (hero) ─────────────────────────
            if (document.querySelector('.heroSwiper')) {
                const swiper = new Swiper('.heroSwiper', {
                    loop: true,
                    autoplay: { delay: 5000 },
                    pagination: { el: '.swiper-pagination', clickable: true },
                    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                    on: {
                        init() { animateSlide(this.slides[this.activeIndex]); },
                        slideChangeTransitionEnd() { animateSlide(this.slides[this.activeIndex]); },
                    },
                });

                function animateSlide(slide) {
                    const els = slide.querySelectorAll('[data-swiper-animation]');
                    els.forEach(el => {
                        el.classList.remove('animate__fadeInLeft','animate__fadeInUp','animate__zoomIn');
                        el.style.opacity = '0';
                    });
                    els.forEach(el => {
                        const anim = el.dataset.swiperAnimation;
                        const delay = parseFloat(el.dataset.animationDelay || '0');
                        setTimeout(() => { el.style.opacity = '1'; el.classList.add(anim); }, delay * 1000);
                    });
                }
            }

            // ── Sticky nav shadow on scroll ───────────
            const nav = document.getElementById('mainNav');
            window.addEventListener('scroll', () => {
                nav.classList.toggle('shadow-md', window.scrollY > 10);
            }, { passive: true });

            // ── Mobile menu ───────────────────────────
            const mobileMenu    = document.getElementById('mobile-menu');
            const menuOverlay   = document.getElementById('menu-overlay');
            const openBtn       = document.getElementById('mobile-menu-button');
            const closeBtn      = document.getElementById('close-mobile-menu');

            const openMenu  = () => { mobileMenu.classList.add('mobile-menu-open'); menuOverlay.classList.add('menu-overlay-open'); document.body.style.overflow = 'hidden'; };
            const closeMenu = () => { mobileMenu.classList.remove('mobile-menu-open'); menuOverlay.classList.remove('menu-overlay-open'); document.body.style.overflow = ''; };

            openBtn?.addEventListener('click', openMenu);
            closeBtn?.addEventListener('click', closeMenu);
            menuOverlay?.addEventListener('click', closeMenu);

            // Close on direct link click (not inside a dropdown)
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => { if (!link.closest('.mobile-dropdown')) closeMenu(); });
            });

            // ── Mobile accordion dropdowns ────────────
            document.querySelectorAll('#mobile-menu .mobile-dropdown').forEach(container => {
                const btn     = container.querySelector('button');
                const content = container.querySelector('div');
                const icon    = btn.querySelector('.fa-chevron-down, .fa-chevron-up');

                btn.addEventListener('click', () => {
                    const isHidden = content.classList.toggle('hidden');
                    if (icon) {
                        icon.classList.toggle('fa-chevron-down', isHidden);
                        icon.classList.toggle('fa-chevron-up', !isHidden);
                        icon.classList.toggle('rotate-180', !isHidden);
                    }
                });
            });
        });
    </script>

</body>

</html>
