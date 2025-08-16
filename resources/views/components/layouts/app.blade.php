<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header class="text-white bg-gray-900">
        <div class="container flex items-center justify-between px-4 py-2 mx-auto text-sm lg:px-8">
            <nav class="items-center hidden space-x-4 md:flex">
                <!-- Facebook -->
                <a href="https://facebook.com/TetuTechnicalVocationalCollege" aria-label="Facebook"
                    class="transition-colors hover:text-orange-400" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5 3.66 9.13 8.44 9.88v-6.99h-2.54v-2.89h2.54V9.83c0-2.51 1.5-3.9 3.79-3.9 1.1 0 2.25.2 2.25.2v2.47h-1.27c-1.25 0-1.64.78-1.64 1.57v1.88h2.79l-.45 2.89h-2.34v6.99C18.34 21.2 22 17.07 22 12.07z" />
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://www.tiktok.com/@tetutvc019" aria-label="TikTok"
                    class="transition-colors hover:text-orange-400" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M12.75 2h3.25c.1 1.38.91 2.53 2.25 3.1a6.23 6.23 0 0 0 3.75 0v3.25a9.5 9.5 0 0 1-3.75-.75v7.66c0 4.25-3.5 7.74-7.75 7.74a7.75 7.75 0 0 1 0-15.5c.15 0 .3 0 .45.02v3.35h-.45a4.4 4.4 0 1 0 0 8.8 4.4 4.4 0 0 0 4.4-4.4V2z" />
                    </svg>
                </a>

                <!-- X (Twitter) -->
                <a href="#" aria-label="X (formerly Twitter)" class="transition-colors hover:text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M22.89 2H18.1L12.72 9.18 7.49 2H1.11l7.75 10.77L1 22h4.89l5.8-7.55 5.64 7.55h6.56l-8.17-10.9L22.89 2z" />
                    </svg>
                </a>


                <!-- YouTube -->
                <a href="#" aria-label="YouTube" class="transition-colors hover:text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 576 512" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M549.7 124.1c-6.3-23.8-24.9-42.5-48.6-48.9C456.6 64 288 64 288 64s-168.6 0-213.1 11.2c-23.7 6.4-42.3 25.1-48.6 48.9C16 168.6 16 256 16 256s0 87.4 10.3 131.9c6.3 23.8 24.9 42.5 48.6 48.9C119.4 448 288 448 288 448s168.6 0 213.1-11.2c23.7-6.4 42.3-25.1 48.6-48.9 10.3-44.5 10.3-131.9 10.3-131.9s0-87.4-10.3-131.9zM232 338.5V173.5l142 82.5-142 82.5z" />
                    </svg>
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
                    <a href="{{ route('filament.admin.auth.login') }}"
                        class="transition-colors hover:text-orange-400">Admin Portal</a>
                </div>
            </div>
        </div>
    </header>


    <nav id="mainNav" class="sticky top-0 z-30 w-full h-20 bg-white border-b shadow">
        <div class="container flex items-center justify-between px-4 py-2 mx-auto lg:px-8">

            <div class="inline xl:hidden">
                <!-- Mobile menu toggle button -->
                <button id="mobileMenuButton" aria-label="Toggle mobile menu"
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
                <a href="{{ route('home') }}"
                    class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">HOME</a>
                <a href="{{ route('about') }}"
                    class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">ABOUT
                    US</a>

                <!-- Administration Dropdown -->
                <div class="relative group">
                    <button
                        class="flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">
                        ADMINISTRATION
                        <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </button>
                    <div
                        class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">
                        <a href="{{ route('principal.office') }}"
                            class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Principal's
                            Office</a>
                        {{-- <a href="{{ route('administration') }}"
                            class="block px-4 py-3 text-gray-800 hover:bg-orange-100 hover:text-orange-600">Administrative
                            Staff</a> --}}
                        <a href="{{ route('staff.members') }}"
                            class="block px-4 py-3 text-gray-800 hover:bg-orange-100 hover:text-orange-600">
                            Our Staff Members
                        </a>
                    </div>
                </div>

                <!-- Departments Dropdown -->
                <div class="relative group">
                    <a href="{{ route('departments') }}"
                        class="flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">
                        DEPARTMENTS
                        <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div
                        class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">

                        @foreach ($departments as $department)
                        <a href="{{ route('department', $department->slug) }}"
                            class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">
                            {{ $department->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('courses') }}"
                    class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">COURSES</a>
                <a href="{{ route('contact') }}"
                    class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">CONTACT
                    US</a>
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
    <div id="mobileMenu"
        class="fixed top-0 left-0 z-40 h-full overflow-y-auto transition-transform duration-300 ease-in-out transform -translate-x-full bg-white shadow-lg w-72 xl:hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-10">
                <button id="closeMobileMenu" aria-label="Close mobile menu"
                    class="hover:text-orange-600 text-2xl transition-colors focus:outline-none focus:ring-2 focus:ring-orange-400 rounded">
                    <!-- Close icon (X) -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
            <div class="space-y-1">
                <a href="{{ route('home') }}"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">HOME</a>
                <a href="#"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">ABOUT
                    US</a>

                <!-- Mobile Administration Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        class="flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                        ADMINISTRATION
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div class="hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('principal.office') }}"
                            class="block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600">Principal's
                            Office</a>
                        {{-- <a href="{{ route('administration') }}"
                            class="block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600">Administrative
                            Staff</a> --}}
                        <a href="{{ route('staff.members') }}"
                            class="block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                            Our Staff Members
                        </a>
                    </div>
                </div>

                <!-- Mobile Departments Dropdown -->
                <div class="mobile-dropdown">
                    <button
                        class="flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                        DEPARTMENTS
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div class="hidden pl-4 mt-1 space-y-1">

                        @foreach ($departments as $department)
                        <a href="{{ route('department', $department->slug) }}"
                            class="block px-2 py-2 uppercase transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                            {{ $department->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('courses') }}"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">COURSES</a>
                <a href="{{ route('contact') }}"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">CONTACT
                    US</a>
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <a href="{{ route('downloads') }}"
                        class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">DOWNLOADS</a>
                    <a href="#"
                        class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">TENDERS</a>
                    <a href="{{ route('filament.admin.auth.login') }}"
                        class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">ADMIN
                        PORTAL</a>
                    <a href="{{ route('admissions') }}"
                        class="block px-2 py-3 mt-4 text-center text-white transition-all bg-orange-600 rounded hover:bg-orange-700">APPLY
                        NOW</a>
                </div>
            </div>

        </div>
    </div>


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
                            class="w-full px-3 py-2 text-gray-800 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Desktop navigation hover effects
            const navItems = document.querySelectorAll('#mainNav .xl\\:flex a');
            navItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.classList.add('text-orange-600');
                });
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.classList.remove('text-orange-600');
                    }
                });
            });
        
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('-translate-x-full');
                document.body.style.overflow = 'hidden';
            });
            
            closeMobileMenu.addEventListener('click', function() {
                mobileMenu.classList.add('-translate-x-full');
                document.body.style.overflow = 'auto';
            });
            
            // Mobile dropdowns
            const mobileDropdowns = document.querySelectorAll('.mobile-dropdown button');
            mobileDropdowns.forEach(dropdown => {
                dropdown.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                });
            });
            
            // Highlight current page in navigation
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                const linkPath = new URL(link.href, window.location.origin).pathname;
                if (currentPath === linkPath || currentPath.startsWith(linkPath) && linkPath !== '/') {
                    link.classList.add('text-orange-600', 'active');
                    if (link.classList.contains('hover:border-b-2')) {
                        link.classList.add('border-b-2', 'border-orange-600');
                    }
                }
            });
        });
    </script>



</body>

</html>