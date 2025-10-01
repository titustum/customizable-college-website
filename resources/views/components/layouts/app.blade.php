<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Tetu Technical and Vocational College offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <link rel="canonical" href="https://www.tetutvc.ac.ke" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tetutvc.ac.ke/">
    <meta property="og:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
    <meta property="og:description"
        content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="og:image" content="{{ asset('images/logo.jpeg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.tetutvc.ac.ke/">
    <meta property="twitter:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
    <meta property="twitter:description"
        content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="twitter:image" content="{{ asset('images/logo.jpeg') }}">



    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        /* Mobile menu transition */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu-open {
            transform: translateX(0);
        }

        /* Overlay when menu is open */
        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out;
        }

        .menu-overlay-open {
            opacity: 1;
            visibility: visible;
        }

        /* Animation delays */
        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        @media (max-width: 480px) {
            html {
                font-size: 15px;
                /* slightly smaller on mobile */
            }
        }
    </style>


</head>

<body>

    <header class="text-white bg-gray-900">
        <div class="container flex items-center justify-between px-4 py-2 mx-auto text-sm lg:px-8">
            <nav class="items-center hidden space-x-4 md:flex">
                <a href="https://facebook.com/TetuTechnicalVocationalCollege" aria-label="Facebook"
                    class="transition-colors hover:text-orange-400">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://www.tiktok.com/@tetutvc019" aria-label="TikTok"
                    class="transition-colors hover:text-orange-400">
                    <i class="fab fa-tiktok" aria-hidden="true"></i>
                </a>
                <a href="#" aria-label="Twitter" class="transition-colors hover:text-orange-400 text-orange-600 active">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" aria-label="YouTube" class="transition-colors hover:text-orange-400 text-orange-600 active">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
            </nav>

            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="px-2">
                    <i class="mr-1 fas fa-phone-alt"></i>
                    <span>+254 758 660 300</span>
                </div>
                <div class="px-2 border-white md:border-l">
                    <i class="mr-1 fas fa-envelope"></i>
                    <a href="mailto:info@tetutvc.ac.ke"
                        class="transition-colors hover:text-orange-400">info@tetutvc.ac.ke</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="#" class="transition-colors hover:text-orange-400">Tenders</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="{{ route('downloads') }}" class="transition-colors hover:text-orange-400">Downloads</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="{{ route('vacancies') }}" class="transition-colors hover:text-orange-400">Vacancies</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="{{ route('past.papers') }}" class="transition-colors hover:text-orange-400">Past Papers</a>
                </div>

            </div>
        </div>
    </header>


    <nav id="mainNav"
        class="sticky top-0 z-30 flex flex-col items-center w-full h-20 bg-white border-b border-gray-200 shadow">
        <div class="container flex items-center justify-between px-4 py-2 mx-auto lg:px-8">

            <div class="inline xl:hidden">
                <!-- Mobile menu toggle button -->
                <button id="mobile-menu-button" aria-label="Toggle mobile menu"
                    class="pr-4  transition-colors hover:text-orange-600 rounded">
                    <!-- Hamburger icon (3 lines) -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>


            <a href="{{ route('home') }}" class="flex items-center text-orange-600 uppercase">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-12">
                <h1 class="font-['Righteous'] text-3xl hidden lg:inline ml-2">TETU TVC</h1>
            </a>



            <div class="items-center hidden font-semibold xl:flex">
                <!-- Home -->
                <a href="{{ route('home') }}"
                    @class([ 'px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                    , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('home'),
                    ])>
                    HOME
                </a>

                <!-- About Us -->
                <a href="{{ route('about') }}"
                    @class([ 'px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                    , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('about'),
                    ])>
                    ABOUT US
                </a>

                <!-- Administration Dropdown -->
                <div class="relative group">
                    <button
                        @class([ 'flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                        , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('principal.office') ||
                        request()->routeIs('staff.members'),
                        ])>
                        ADMINISTRATION
                        <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </button>
                    <div
                        class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">
                        <a href="{{ route('principal.office') }}"
                            @class([ 'block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->routeIs('principal.office'),
                            ])>
                            Principal's Office
                        </a>
                        {{-- <a href="{{ route('administration') }}" class="...">Administrative Staff</a> --}}
                        <a href="{{ route('staff.members') }}"
                            @class([ 'block px-4 py-3 text-gray-800 hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->routeIs('staff.members'),
                            ])>
                            Our Staff Members
                        </a>
                    </div>
                </div>

                <!-- Departments Dropdown -->
                <div class="relative group">
                    <a href="{{ route('departments') }}"
                        @class([ 'flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                        , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('departments') ||
                        request()->routeIs('department'),
                        ])>
                        DEPARTMENTS
                        <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div
                        class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">
                        @foreach ($departments as $department)
                        <a href="{{ route('department', $department->slug) }}"
                            @class([ 'block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->is('departments/' . $department->slug),
                            ])>
                            {{ $department->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Courses -->
                <a href="{{ route('courses') }}"
                    @class([ 'px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                    , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('courses'),
                    ])>
                    COURSES
                </a>

                <!-- Contact -->
                <a href="{{ route('contact') }}"
                    @class([ 'px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600'
                    , 'text-orange-600 border-b-2 border-orange-600'=> request()->routeIs('contact'),
                    ])>
                    CONTACT US
                </a>
            </div>



            <div class="flex items-center font-semibold">
                <a href="{{ route('admissions') }}"
                    class="hidden px-5 py-2 ml-4 text-white transition-all bg-orange-600 rounded-full shadow-md lg:inline hover:bg-orange-700">
                    APPLY NOW
                </a>
                <a href="{{ route('admissions') }}"
                    class="px-4 py-3 transition-all md:ml-4 lg:hidden hover:text-orange-600">
                    APPLY →
                </a>
            </div>
        </div>
    </nav>



    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 z-50 bg-white w-80 shadow-xl h-screen overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-10">
                <button id="close-mobile-menu" aria-label="Close mobile menu"
                    class="hover:text-orange-600 text-2xl transition-colors focus:outline-none focus:ring-2 focus:ring-orange-400 rounded">
                    <!-- Close icon (X) -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-1">
                <!-- Home -->
                <a href="{{ route('home') }}"
                    @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                    , 'text-orange-600 bg-orange-100'=> request()->routeIs('home'),
                    ])>
                    HOME
                </a>

                <!-- About -->
                <a href="{{ route('about') }}"
                    @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                    , 'text-orange-600 bg-orange-100'=> request()->routeIs('about'),
                    ])>
                    ABOUT US
                </a>

                <!-- Mobile Administration Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        @class([ 'flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                        , 'text-orange-600 bg-orange-100'=> request()->routeIs('principal.office') ||
                        request()->routeIs('staff.members'),
                        ])>
                        ADMINISTRATION
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div class="hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('principal.office') }}"
                            @class([ 'block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->routeIs('principal.office'),
                            ])>
                            Principal's Office
                        </a>
                        {{-- <a href="{{ route('administration') }}" class="...">Administrative Staff</a> --}}
                        <a href="{{ route('staff.members') }}"
                            @class([ 'block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->routeIs('staff.members'),
                            ])>
                            Our Staff Members
                        </a>
                    </div>
                </div>

                <!-- Mobile Departments Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        @class([ 'flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                        , 'text-orange-600 bg-orange-100'=> request()->routeIs('departments') ||
                        request()->routeIs('department'),
                        ])>
                        DEPARTMENTS
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div class="hidden pl-4 mt-1 space-y-1">
                        @foreach ($departments as $department)
                        <a href="{{ route('department', $department->slug) }}"
                            @class([ 'block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                            , 'text-orange-600 bg-orange-100'=> request()->is('departments/' . $department->slug),
                            ])>
                            {{ $department->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Courses -->
                <a href="{{ route('courses') }}"
                    @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                    , 'text-orange-600 bg-orange-100'=> request()->routeIs('courses'),
                    ])>
                    COURSES
                </a>

                <!-- Contact -->
                <a href="{{ route('contact') }}"
                    @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                    , 'text-orange-600 bg-orange-100'=> request()->routeIs('contact'),
                    ])>
                    CONTACT US
                </a>

                <!-- Other Links -->
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <a href="{{ route('downloads') }}"
                        @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                        , 'text-orange-600 bg-orange-100'=> request()->routeIs('downloads'),
                        ])>
                        DOWNLOADS
                    </a>
                    <a href="#"
                        class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                        TENDERS
                    </a>
                    <a href="{{ route('filament.admin.auth.login') }}"
                        @class([ 'block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600'
                        , 'text-orange-600 bg-orange-100'=> request()->routeIs('filament.admin.auth.login'),
                        ])>
                        ADMIN PORTAL
                    </a>
                    <a href="{{ route('admissions') }}"
                        @class([ 'block px-2 py-3 mt-4 text-center text-white transition-all bg-orange-600 rounded hover:bg-orange-700'
                        , 'ring-2 ring-orange-400'=> request()->routeIs('admissions'),
                        ])>
                        APPLY NOW
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Overlay when mobile menu is open -->
    <div id="menu-overlay" class="menu-overlay max-h-screen fixed inset-0 z-40 bg-black/50"></div>



    {{ $slot }}



    <footer class="py-12 text-white bg-gray-800">
        <div class="container px-4 mx-auto">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- About Tetu TVC -->
                <div data-aos='fade-up'>
                    <h3 class="mb-4 text-xl font-semibold">About Tetu TVC</h3>
                    <p class="mb-4 text-gray-400">Tetu Technical and Vocational College is committed to providing
                        quality
                        education and training to empower students for successful careers.</p>
                    <a href="/about" class="text-orange-400 hover:text-orange-300">Learn More</a>
                </div>

                <!-- Quick Links -->
                <div data-aos='fade-up'>
                    <h3 class="mb-4 text-xl font-semibold">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('courses') }}" class="text-gray-400 hover:text-white">Programs</a></li>
                        <li><a href="{{ route('admissions') }}" class="text-gray-400 hover:text-white">Admissions</a>
                        </li>
                        <li><a href="{{ route('departments') }}" class="text-gray-400 hover:text-white">Departments</a>
                        </li>
                        <li><a href="{{ route('administration') }}"
                                class="text-gray-400 hover:text-white">Administration</a></li>
                        <li><a href="{{ route('downloads') }}" class="text-gray-400 hover:text-white">Downloads</a></li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div data-aos='fade-up'>
                    <h3 class="mb-4 text-xl font-semibold">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <i class="mr-2 text-orange-400 fas fa-map-marker-alt"></i>
                            P.O. Box 1716-10100, Nyeri, Kenya
                        </li>
                        <li>
                            <i class="mr-2 text-orange-400 fas fa-phone"></i>
                            +254 758 660 300
                        </li>
                        <li>
                            <i class="mr-2 text-orange-400 fas fa-envelope"></i>
                            info@tetutvc.ac.ke
                        </li>
                    </ul>
                </div>

                <!-- Newsletter Signup -->
                <div data-aos='fade-up'>
                    <h3 class="mb-4 text-xl font-semibold">Stay Connected</h3>
                    <p class="mb-4 text-gray-400">Subscribe to our newsletter for updates and news.</p>
                    <form class="flex">
                        <input type="email" placeholder="Enter your email"
                            class="w-full px-3 py-2 bg-white text-gray-800 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <button type="submit"
                            class="px-4 py-2 transition duration-300 bg-orange-600 hover:bg-orange-700 rounded-r-md">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="flex flex-col items-center justify-between pt-8 mt-8 border-t border-gray-700 md:flex-row">
                <div class="mb-4 md:mb-0">
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="text-sm text-gray-400">
                    © 2024 Tetu Technical and Vocational College. All rights reserved.
                </div>
            </div>
        </div>
    </footer>





    <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Desktop navigation hover effects
        const navItems = document.querySelectorAll('#mainNav .xl\\:flex a');
        navItems.forEach(item => {
            item.addEventListener('mouseenter', function () {
                this.classList.add('text-orange-600');
            });
            item.addEventListener('mouseleave', function () {
                if (!this.classList.contains('active')) {
                    this.classList.remove('text-orange-600');
                }
            });
        });

        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenu = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('menu-overlay');

        function openMenu() {
            mobileMenu.classList.add('mobile-menu-open');
            menuOverlay.classList.add('menu-overlay-open');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        }

        function closeMenu() {
            mobileMenu.classList.remove('mobile-menu-open');
            menuOverlay.classList.remove('menu-overlay-open');
            document.body.style.overflow = ''; // Re-enable scrolling
        }

        mobileMenuButton?.addEventListener('click', openMenu);
        closeMobileMenu?.addEventListener('click', closeMenu);
        menuOverlay?.addEventListener('click', closeMenu);

        // Close menu when clicking on non-dropdown links
        const menuLinks = document.querySelectorAll('#mobile-menu a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                // If this is NOT inside a dropdown, close menu
                if (!link.closest('.mobile-dropdown')) {
                    closeMenu();
                }
            });
        });

        // Toggle dropdowns in mobile menu
        const mobileDropdowns = document.querySelectorAll('#mobile-menu .mobile-dropdown');
        mobileDropdowns.forEach(dropdownContainer => {
            const toggleButton = dropdownContainer.querySelector('button');
            const dropdownContent = dropdownContainer.querySelector('div');
            const icon = toggleButton.querySelector('i');

            toggleButton.addEventListener('click', function () {
                const isHidden = dropdownContent.classList.contains('hidden');
                dropdownContent.classList.toggle('hidden');

                // Toggle icon
                if (isHidden) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
    });
    </script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    init: function() {
                        animateSlideElements(this.slides[this.activeIndex]);
                    },
                    slideChangeTransitionEnd: function() {
                        animateSlideElements(this.slides[this.activeIndex]);
                    },
                },
            });
        
            function animateSlideElements(slide) {
                // Reset all animations
                const elements = slide.querySelectorAll('[data-swiper-animation]');
                elements.forEach(el => {
                    el.classList.remove('animate__fadeInLeft', 'animate__fadeInUp', 'animate__zoomIn');
                    el.style.opacity = '0';
                });
        
                // Animate elements with delay
                elements.forEach(el => {
                    const animation = el.dataset.swiperAnimation;
                    const delay = el.dataset.animationDelay || '0';
                    
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.classList.add(animation);
                    }, delay * 1000);
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            AOS.init({
                duration: 1000, // Animation duration in milliseconds
                once: true, // Whether animation should happen only once
                easing: 'ease-in-out', // Easing function for the animation
            });

            });
            
    </script>



</body>

</html>