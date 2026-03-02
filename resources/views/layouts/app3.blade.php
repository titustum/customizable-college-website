<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TETU TVC – Quality Vocational Education</title>

    <!-- Fonts: Playfair Display (editorial) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-['Plus_Jakarta_Sans'] bg-[#FAF9F7] text-[#0D0D0D] overflow-x-hidden">

    <!-- ========== TOP BAR ========== -->
    <header class="bg-[#0D0D0D] h-[38px] flex items-center text-white/55 text-[11.5px] font-medium tracking-wide">
        <div class="max-w-[1240px] mx-auto px-7 w-full flex items-center justify-between">
            <!-- Socials -->
            <nav class="flex items-center gap-[2px]" aria-label="Social media">
                <a href="#" aria-label="Facebook"
                    class="w-7 h-7 flex items-center justify-center rounded-md text-white/40 text-[11px] hover:text-white hover:bg-white/10 transition-colors"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="TikTok"
                    class="w-7 h-7 flex items-center justify-center rounded-md text-white/40 text-[11px] hover:text-white hover:bg-white/10 transition-colors"><i
                        class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="Twitter/X"
                    class="w-7 h-7 flex items-center justify-center rounded-md text-white/40 text-[11px] hover:text-white hover:bg-white/10 transition-colors"><i
                        class="fab fa-x-twitter"></i></a>
                <a href="#" aria-label="YouTube"
                    class="w-7 h-7 flex items-center justify-center rounded-md text-white/40 text-[11px] hover:text-white hover:bg-white/10 transition-colors"><i
                        class="fab fa-youtube"></i></a>
            </nav>

            <!-- Links -->
            <div class="flex items-center">
                <a href="tel:+254700000000"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap">
                    <i class="fas fa-phone-alt text-[9px] opacity-60"></i> +254 700 000 000
                </a>
                <a href="mailto:info@tetutvc.ac.ke"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap">
                    <i class="fas fa-envelope text-[9px] opacity-60"></i> info@tetutvc.ac.ke
                </a>
                <a href="#"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap max-md:hidden">Tenders</a>
                <a href="#"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap max-md:hidden">Downloads</a>
                <a href="#"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap max-md:hidden">Vacancies</a>
                <a href="#"
                    class="flex items-center gap-1 px-3 h-[38px] text-white/50 border-l border-white/10 hover:text-white whitespace-nowrap max-md:hidden">Past
                    Papers</a>
            </div>
        </div>
    </header>

    <!-- ========== MAIN NAV ========== -->
    <nav id="mainNav"
        class="sticky top-0 z-[100] h-[72px] bg-[#FAF9F7]/97 backdrop-blur-md border-b border-black/8 flex items-center transition-shadow"
        role="navigation" aria-label="Main navigation">
        <div class="max-w-[1240px] mx-auto px-7 w-full flex items-center">

            <!-- Hamburger -->
            <button id="hamburger"
                class="flex md:hidden flex-col gap-1 p-2 rounded-lg hover:bg-[#F2EFE9] transition-colors"
                aria-label="Open menu" aria-expanded="false">
                <span class="w-[22px] h-0.5 bg-[#0D0D0D] rounded transition-transform origin-center"></span>
                <span class="w-[22px] h-0.5 bg-[#0D0D0D] rounded transition-transform origin-center"></span>
                <span class="w-[22px] h-0.5 bg-[#0D0D0D] rounded transition-transform origin-center"></span>
            </button>

            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 shrink-0">
                <div
                    class="w-[42px] h-[42px] rounded-lg bg-[#D63A00] flex items-center justify-center font-['Playfair_Display'] font-black text-[14px] text-white relative overflow-hidden">
                    TV
                    <span class="absolute -top-[30%] -right-[20%] w-[60%] h-[80%] bg-white/12 rounded-full"></span>
                </div>
                <div>
                    <div
                        class="font-['Playfair_Display'] font-bold text-[18px] text-[#0D0D0D] tracking-tight leading-tight">
                        TETU TVC</div>
                    <div class="text-[9.5px] font-semibold text-[#8A8078] uppercase tracking-[1.8px] mt-px">Vocational
                        College</div>
                </div>
            </a>

            <!-- Desktop links -->
            <nav class="hidden md:flex items-center h-[72px] ml-auto" aria-label="Desktop navigation">
                <a href="#"
                    class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 hover:after:scale-x-100 after:origin-left after:transition-transform active">Home</a>
                <a href="#"
                    class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 hover:after:scale-x-100 after:origin-left after:transition-transform">About
                    Us</a>

                <!-- Administration dropdown -->
                <div class="relative flex items-center h-full group">
                    <button
                        class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 group-hover:after:scale-x-100 after:origin-left after:transition-transform">
                        Administration <i
                            class="fas fa-chevron-down text-[8px] transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div
                        class="absolute top-full left-[-4px] min-w-[220px] bg-white border border-black/9 rounded-xl shadow-lg opacity-0 invisible translate-y-2 transition-all group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                        <div
                            class="px-4 py-3 text-[9px] font-bold tracking-wider uppercase text-[#8A8078] border-b border-black/8">
                            Leadership</div>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-user-tie w-4 text-[10px] text-[#FF6940]"></i> Principal's Office</a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-users w-4 text-[10px] text-[#FF6940]"></i> Our Staff Members</a>
                    </div>
                </div>

                <!-- Departments dropdown -->
                <div class="relative flex items-center h-full group">
                    <a href="#"
                        class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 group-hover:after:scale-x-100 after:origin-left after:transition-transform">
                        Departments <i
                            class="fas fa-chevron-down text-[8px] transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div
                        class="absolute top-full left-[-4px] min-w-[220px] bg-white border border-black/9 rounded-xl shadow-lg opacity-0 invisible translate-y-2 transition-all group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                        <div
                            class="px-4 py-3 text-[9px] font-bold tracking-wider uppercase text-[#8A8078] border-b border-black/8">
                            Academic Departments</div>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-magic w-4 text-[10px] text-[#FF6940]"></i> Cosmetology</a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-utensils w-4 text-[10px] text-[#FF6940]"></i> Hospitality</a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-tshirt w-4 text-[10px] text-[#FF6940]"></i> Fashion & Design</a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-laptop-code w-4 text-[10px] text-[#FF6940]"></i> ICT</a>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] hover:pl-5 transition-all border-b border-black/8 last:border-0"><i
                                class="fas fa-seedling w-4 text-[10px] text-[#FF6940]"></i> Agriculture</a>
                    </div>
                </div>

                <a href="#"
                    class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 hover:after:scale-x-100 after:origin-left after:transition-transform">Courses</a>
                <a href="#"
                    class="relative flex items-center h-full px-3.5 text-[11.5px] font-bold tracking-wide uppercase text-[#8A8078] hover:text-[#0D0D0D] transition-colors gap-1 after:content-[''] after:absolute after:bottom-0 after:left-3.5 after:right-3.5 after:h-0.5 after:bg-[#D63A00] after:scale-x-0 hover:after:scale-x-100 after:origin-left after:transition-transform">Contact</a>
            </nav>

            <!-- Apply CTA (desktop) -->
            <a href="#"
                class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 bg-[#D63A00] text-white text-[11px] font-bold tracking-wide uppercase rounded-full ml-4 shadow-[0_4px_20px_#D63A004D] hover:bg-[#E8420A] hover:-translate-y-px hover:shadow-[0_8px_28px_#D63A0061] transition-all whitespace-nowrap">
                <i class="fas fa-pen-to-square text-[10px]"></i> Apply Now
            </a>

            <!-- Apply (mobile compact) -->
            <a href="#" class="md:hidden ml-auto text-[12px] font-bold text-[#D63A00]">Apply →</a>
        </div>
    </nav>

    <!-- ========== OVERLAY ========== -->
    <div id="overlay"
        class="fixed inset-0 z-[150] bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity"
        role="presentation"></div>

    <!-- ========== MOBILE MENU ========== -->
    <aside id="mobile-menu"
        class="fixed top-0 left-0 h-dvh w-80 bg-[#FAF9F7] z-200 overflow-y-auto -translate-x-full transition-transform shadow-2xl"
        role="dialog" aria-modal="true" aria-label="Mobile navigation">
        <!-- Header -->
        <div class="flex items-center justify-between p-5 border-b border-black/8">
            <div class="flex items-center gap-3">
                <div
                    class="w-[38px] h-[38px] rounded-lg bg-[#D63A00] flex items-center justify-center font-['Playfair_Display'] font-black text-[13px] text-white relative overflow-hidden">
                    TV
                    <span class="absolute -top-[30%] -right-[20%] w-[60%] h-[80%] bg-white/12 rounded-full"></span>
                </div>
                <div>
                    <div
                        class="font-['Playfair_Display'] font-bold text-[16px] text-[#0D0D0D] tracking-tight leading-tight">
                        TETU TVC</div>
                    <div class="text-[9.5px] font-semibold text-[#8A8078] uppercase tracking-[1.8px] mt-px">Vocational
                        College</div>
                </div>
            </div>
            <button id="mobile-close"
                class="w-9 h-9 rounded-lg border border-black/8 bg-transparent flex items-center justify-center text-[#8A8078] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors"
                aria-label="Close menu">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <!-- Nav -->
        <div class="p-3 flex flex-col gap-0.5">
            <div class="text-[9.5px] font-bold tracking-wider uppercase text-[#8A8078] px-3.5 pt-1.5 pb-0.5">Menu</div>

            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors active">Home</a>
            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">About
                Us</a>

            <!-- Administration accordion -->
            <button
                class="acc-btn flex items-center justify-between px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors w-full"
                data-target="mob-admin">
                Administration <i class="fas fa-chevron-down acc-icon text-[8px] transition-transform"></i>
            </button>
            <div id="mob-admin" class="acc-content hidden flex-col gap-0.5 pl-2">
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Principal's
                    Office</a>
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Our
                    Staff Members</a>
            </div>

            <!-- Departments accordion -->
            <button
                class="acc-btn flex items-center justify-between px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors w-full"
                data-target="mob-dept">
                Departments <i class="fas fa-chevron-down acc-icon text-[8px] transition-transform"></i>
            </button>
            <div id="mob-dept" class="acc-content hidden flex-col gap-0.5 pl-2">
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Cosmetology</a>
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Hospitality</a>
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Fashion
                    & Design</a>
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">ICT</a>
                <a href="#"
                    class="block px-3.5 py-2 rounded-lg text-[13px] font-medium text-[#666] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Agriculture</a>
            </div>

            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Courses</a>
            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Contact</a>

            <div class="h-px bg-black/8 my-2 mx-3.5"></div>
            <div class="text-[9.5px] font-bold tracking-wider uppercase text-[#8A8078] px-3.5 pt-1.5 pb-0.5">Resources
            </div>

            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Downloads</a>
            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Vacancies</a>
            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Tenders</a>
            <a href="#"
                class="flex items-center px-3.5 py-2.5 rounded-lg text-[13px] font-bold tracking-wide uppercase text-[#444] hover:bg-[#FFF5F2] hover:text-[#D63A00] transition-colors">Past
                Papers</a>

            <a href="#"
                class="flex items-center justify-center gap-2 p-3.5 bg-[#D63A00] text-white text-[12px] font-bold tracking-wide uppercase rounded-xl mt-2 hover:bg-[#E8420A] transition-colors">
                <i class="fas fa-pen-to-square"></i> Apply Now
            </a>
        </div>
    </aside>

    <!-- ========== SLOT CONTENT ========== -->
    {{ $slot }}

    <!-- ========== FOOTER ========== -->
    <footer class="bg-[#1A1A1A] text-white pt-[72px]">
        <div
            class="max-w-[1240px] mx-auto px-7 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1.2fr_1.3fr] gap-12 pb-16">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-3">
                    <div
                        class="w-[42px] h-[42px] rounded-lg bg-[#D63A00] flex items-center justify-center font-['Playfair_Display'] font-black text-[14px] text-white relative overflow-hidden">
                        TV
                        <span class="absolute -top-[30%] -right-[20%] w-[60%] h-[80%] bg-white/12 rounded-full"></span>
                    </div>
                    <div>
                        <div
                            class="font-['Playfair_Display'] font-bold text-[18px] text-white tracking-tight leading-tight">
                            TETU TVC</div>
                        <div class="text-[9.5px] font-semibold text-[#8A8078] uppercase tracking-[1.8px] mt-px">
                            Vocational College</div>
                    </div>
                </div>
                <p class="text-[13.5px] text-white/38 leading-relaxed my-4">Committed to quality vocational training
                    that equips students with practical skills for meaningful, lasting careers.</p>
                <a href="#"
                    class="inline-flex items-center gap-2 text-[12px] font-bold tracking-wide uppercase text-[#FF6940] hover:text-white hover:gap-3 transition-all">
                    Learn About Us <i class="fas fa-arrow-right text-[9px]"></i>
                </a>
            </div>

            <!-- Quick Links -->
            <div>
                <p class="text-[9.5px] font-bold tracking-[1.8px] uppercase text-white/28 mb-5">Quick Links</p>
                <ul class="flex flex-col gap-2.5">
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Programs</a>
                    </li>
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Admissions</a>
                    </li>
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Departments</a>
                    </li>
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Administration</a>
                    </li>
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Downloads</a>
                    </li>
                    <li><a href="#"
                            class="text-[13.5px] text-white/50 hover:text-white hover:pl-1 transition-all inline-block">Past
                            Papers</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <p class="text-[9.5px] font-bold tracking-[1.8px] uppercase text-white/28 mb-5">Contact Us</p>
                <div class="flex gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-[#D63A00]/15 flex items-center justify-center text-[#FF6940] text-[11px] shrink-0 mt-px">
                        <i class="fas fa-map-marker-alt"></i></div>
                    <span class="text-[13.5px] text-white/50 leading-relaxed">Tetu Sub-County,<br>Nyeri County,
                        Kenya</span>
                </div>
                <div class="flex gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-[#D63A00]/15 flex items-center justify-center text-[#FF6940] text-[11px] shrink-0">
                        <i class="fas fa-phone"></i></div>
                    <span class="text-[13.5px] text-white/50">+254 700 000 000</span>
                </div>
                <div class="flex gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-[#D63A00]/15 flex items-center justify-center text-[#FF6940] text-[11px] shrink-0">
                        <i class="fas fa-envelope"></i></div>
                    <span class="text-[13.5px] text-white/50">info@tetutvc.ac.ke</span>
                </div>
            </div>

            <!-- Newsletter -->
            <div>
                <p class="text-[9.5px] font-bold tracking-[1.8px] uppercase text-white/28 mb-5">Stay Connected</p>
                <p class="text-[13.5px] text-white/38 leading-relaxed mb-4">Get updates on admissions, events, and
                    college news straight to your inbox.</p>
                <div class="flex rounded-xl border border-white/10 focus-within:border-[#D63A00] transition-colors">
                    <input type="email"
                        class="flex-1 px-4 py-3 bg-white/5 border-none outline-none text-white text-[13px] placeholder-white/25"
                        placeholder="your@email.com" aria-label="Email address" />
                    <button type="submit"
                        class="px-4 py-3 bg-[#D63A00] text-white text-[11px] font-bold tracking-wide uppercase whitespace-nowrap hover:bg-[#E8420A] transition-colors">Subscribe</button>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div
            class="max-w-[1240px] mx-auto px-7 py-5 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-white/7">
            <div class="flex items-center gap-2">
                <a href="#" aria-label="Facebook"
                    class="w-9 h-9 rounded-lg bg-white/6 border border-white/8 flex items-center justify-center text-white/40 text-[13px] hover:bg-[#D63A00] hover:text-white hover:border-[#D63A00] hover:-translate-y-0.5 transition-all"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="TikTok"
                    class="w-9 h-9 rounded-lg bg-white/6 border border-white/8 flex items-center justify-center text-white/40 text-[13px] hover:bg-[#D63A00] hover:text-white hover:border-[#D63A00] hover:-translate-y-0.5 transition-all"><i
                        class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="Twitter/X"
                    class="w-9 h-9 rounded-lg bg-white/6 border border-white/8 flex items-center justify-center text-white/40 text-[13px] hover:bg-[#D63A00] hover:text-white hover:border-[#D63A00] hover:-translate-y-0.5 transition-all"><i
                        class="fab fa-x-twitter"></i></a>
                <a href="#" aria-label="Instagram"
                    class="w-9 h-9 rounded-lg bg-white/6 border border-white/8 flex items-center justify-center text-white/40 text-[13px] hover:bg-[#D63A00] hover:text-white hover:border-[#D63A00] hover:-translate-y-0.5 transition-all"><i
                        class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"
                    class="w-9 h-9 rounded-lg bg-white/6 border border-white/8 flex items-center justify-center text-white/40 text-[13px] hover:bg-[#D63A00] hover:text-white hover:border-[#D63A00] hover:-translate-y-0.5 transition-all"><i
                        class="fab fa-youtube"></i></a>
            </div>
            <p class="text-[12px] text-white/28">
                © 2026 TETU TVC. Crafted by
                <a href="https://github.com/titustum" target="_blank" rel="noopener"
                    class="text-white/45 hover:text-white transition-colors">Titus Tum</a>.
            </p>
        </div>
    </footer>

    @livewireScripts

    <script>
        // Sticky nav shadow
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 8);
        }, { passive: true });

        // Mobile menu
        const hamburger   = document.getElementById('hamburger');
        const mobileMenu  = document.getElementById('mobile-menu');
        const overlay     = document.getElementById('overlay');
        const mobileClose = document.getElementById('mobile-close');

        const openMenu = () => {
            mobileMenu.classList.add('open');
            overlay.classList.add('open');
            hamburger.classList.add('open');
            hamburger.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';

            // Hamburger animation classes
            const lines = hamburger.children;
            lines[0].classList.add('rotate-45', 'translate-y-[7px]');
            lines[1].classList.add('opacity-0');
            lines[2].classList.add('-rotate-45', '-translate-y-[7px]');
        };

        const closeMenu = () => {
            mobileMenu.classList.remove('open');
            overlay.classList.remove('open');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';

            const lines = hamburger.children;
            lines[0].classList.remove('rotate-45', 'translate-y-[7px]');
            lines[1].classList.remove('opacity-0');
            lines[2].classList.remove('-rotate-45', '-translate-y-[7px]');
        };

        hamburger.addEventListener('click', openMenu);
        mobileClose.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMenu(); });
        mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));

        // Mobile accordions
        document.querySelectorAll('.acc-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = document.getElementById(btn.dataset.target);
                const icon    = btn.querySelector('.acc-icon');
                const isOpen  = content.classList.contains('open');

                // Close all others
                document.querySelectorAll('.acc-content').forEach(c => c.classList.remove('open'));
                document.querySelectorAll('.acc-icon').forEach(i => i.style.transform = '');

                if (!isOpen) {
                    content.classList.add('open');
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    </script>
</body>

</html>
