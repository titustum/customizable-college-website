<?php

use Livewire\Component;
use App\Models\Department;
use App\Models\SuccessStory;
use App\Models\Partner;
use App\Models\HeroSlide;
use App\Models\InstitutionSetting;
use Illuminate\Support\Str;

new class extends Component {

    public $setting;

    public function mount(){
        $this->setting = InstitutionSetting::first() ?? (object) ['name' => 'Our College', 'phone' => ''];
    }

    public function with()
    {


        return [
            'institution' => $this->setting ?? (object)[
                'name'=>'Tetu TVC',
                'established_year'=>now()->subYears(3),
                'phone'=>0712345676
            ],
            // 'departments' => Department::where('type', 'academic')->get(), //only academic departments for the homepage
            'successStories'=> SuccessStory::where('is_approved', true)
                                            ->latest()
                                            ->take(3)
                                            ->get(),
            'partners'=> Partner::all(),
            'heroSlides'=> HeroSlide::all(),
        ];
    }

    // with view function
    public function render()
    {

        // dd($this->setting);

        return $this->view()
            ->title("Welcome to ". $this->setting->name);
    }



};
?>

<main>

    <!-- ======================================================
         HERO SECTION
    ====================================================== -->
    <section class="relative min-h-[85vh] flex items-center overflow-hidden bg-gray-900">
        <!-- Background pattern (SVG grid) -->
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 0 0 60" fill="none" stroke="#ea580c" stroke-width="0.8" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
        <!-- Decorative orange circle glow -->
        <div
            class="absolute right-0 top-0 w-[700px] h-[700px] bg-orange-600 rounded-full opacity-10 blur-3xl translate-x-1/3 -translate-y-1/4 pointer-events-none">
        </div>
        <div
            class="absolute left-0 bottom-0 w-[400px] h-[400px] bg-orange-500 rounded-full opacity-5 blur-3xl -translate-x-1/2 translate-y-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 py-12 md:py-24 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Text content -->
            <div class="text-white" data-aos="fade-right" data-aos-duration="1000">
                <div class="section-label text-orange-400" data-aos="fade-down" data-aos-delay="200">
                    KNQA Accredited Institution
                </div>
                <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-black leading-none text-white mb-6"
                    data-aos="fade-up" data-aos-delay="300">
                    Build Your Skills.<br />
                    <span class="text-orange-500">For Industrial Growth.</span>
                </h1>
                <p class="text-gray-300 hidden md:block text-lg leading-relaxed mb-8 max-w-lg" data-aos="fade-up"
                    data-aos-delay="400">
                    Tetu Technical and Vocational College offers world-class technical education designed to equip
                    students with practical skills for today's economy. Located in Tetu Sub-County, Nyeri County.
                </p>
                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('admissions') }}"
                        class="inline-flex items-center justify-center gap-2 w-auto bg-orange-600 hover:bg-orange-500 text-white font-bold px-7 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-orange-600/40 hover:-translate-y-0.5"
                        data-aos="zoom-in" data-aos-delay="600">
                        Apply for Admission
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="{{ route('courses') }}"
                        class="inline-flex items-center justify-center gap-2 w-auto border border-gray-500 hover:border-orange-500 text-gray-200 hover:text-orange-400 font-semibold px-7 py-3.5 rounded-lg transition-all hover:-translate-y-0.5"
                        data-aos="zoom-in" data-aos-delay="700">
                        Browse Courses
                    </a>
                </div>
                <!-- Trust indicators / Social proof -->
                <div class="flex flex-wrap gap-6 mt-10 pt-8 border-t border-gray-700" data-aos="fade-up"
                    data-aos-delay="800">
                    <div class="flex items-center gap-2" data-aos="fade-right" data-aos-delay="900">
                        <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center">
                            <i class="fas fa-users text-orange-500"></i>
                        </div>
                        <div>
                            <span class="block text-white font-bold">2000+</span>
                            <span class="text-xs text-gray-400">Happy Students</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2" data-aos="fade-right" data-aos-delay="1100">
                        <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center">
                            <i class="fas fa-briefcase text-orange-500"></i>
                        </div>
                        <div>
                            <span class="block text-white font-bold">85%+</span>
                            <span class="text-xs text-gray-400">Job Placement</span>
                        </div>
                    </div>
                    <div class="sm:flex hidden items-center gap-2" data-aos="fade-right" data-aos-delay="1200">
                        <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center">
                            <i class="fas fa-star text-orange-500"></i>
                        </div>
                        <div>
                            <span class="block text-white font-bold">4.8/5</span>
                            <span class="text-xs text-gray-400">Student Rating</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero image card / stats -->
            <div class="min-w-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="relative">

                    <!-- Main card -->
                    <div
                        class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden shadow-2xl">

                        <!-- Hero image Swiper slider -->
                        <div class="relative h-[300px] md:h-[500px] overflow-hidden rounded-t-2xl">

                            <!-- IMPORTANT -->
                            <div class="swiper heroSwiper min-w-0 w-full h-full">
                                <div class="swiper-wrapper">

                                    @if(count($heroSlides) > 0)
                                    @foreach($heroSlides as $slide)

                                    <div class="swiper-slide relative overflow-hidden">
                                        <img src="{{ Storage::url($slide->image) }}"
                                            alt="{{ $slide->title ?? 'Hero Image' }}"
                                            class="w-full h-full object-cover">

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent">
                                        </div>

                                        @if($slide->title || $slide->subtitle)
                                        <div class="absolute bottom-4 left-4 right-4">
                                            @if($slide->title)
                                            <p class="text-white font-semibold text-lg">
                                                {{ $slide->title }}
                                            </p>
                                            @endif

                                            @if($slide->subtitle)
                                            <p class="text-white/80 text-sm">
                                                {{ $slide->subtitle }}
                                            </p>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    @endforeach
                                    @else

                                    <div class="swiper-slide relative overflow-hidden">
                                        <img src="https://tetutvc.ac.ke/storage/hero_slide_images/tetu-tvc-ict-practicals.jpg"
                                            alt="Hero Image" class="w-full h-full object-cover">

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent">
                                        </div>

                                        <div class="absolute bottom-4 left-4 right-4">
                                            <p class="text-white font-semibold text-lg">
                                                Hands-on Learning Experience
                                            </p>
                                        </div>
                                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>

                        <!-- Custom controls below slider -->
                        <div class="flex items-center justify-center gap-3 py-4 -mt-2">
                            <button
                                class="hero-prev text-white opacity-70 hover:opacity-100 w-9 h-9 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center transition-all border-0 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                class="hero-pause text-white opacity-70 hover:opacity-100 w-9 h-9 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center transition-all border-0 cursor-pointer"
                                id="heroPauseBtn">
                                <svg class="w-4 h-4 pause-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6" />
                                </svg>
                                <svg class="w-4 h-4 play-icon hidden" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                </svg>
                            </button>
                            <button
                                class="hero-next text-white opacity-70 hover:opacity-100 w-9 h-9 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center transition-all border-0 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- Scroll indicator -->
        <div
            class="hidden absolute bottom-8 left-1/2 -translate-x-1/2 md:flex flex-col items-center gap-2 text-gray-500 animate-bounce">
            <span class="text-xs tracking-widest uppercase">Scroll</span>
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </section>

    <!-- /hero -->


    {{-- ═══════════════════════════════════════════
    QUICK LINKS CARDS
    ═══════════════════════════════════════════ --}}
    <section class="py-16 bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid gap-6 md:grid-cols-3">

                {{-- Principal Message --}}
                <a href="{{ route('principal.office') }}" data-aos="fade-up-right" data-aos-delay="0"
                    class="group flex items-stretch gap-5 p-6 bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg hover:border-primary/40 transition-all">
                    <div class="w-20 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ asset('images/principal-tetu-tvc-2025-12345.jpg') }}" alt="Principal"
                            class="object-cover w-full h-full">
                    </div>
                    <div class="flex-grow min-w-0">
                        <h4
                            class="font-bold text-gray-800 text-base truncate group-hover:text-primary transition-colors mb-2">
                            Principal's Message</h4>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-3">Welcome message from our
                            College Principal</p>
                        <span
                            class="inline-flex items-center gap-1 text-sm font-semibold text-primary group-hover:gap-2 transition-all">Read
                            More <i class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </a>

                {{-- Recent Updates --}}
                <a href="{{ route('news') }}" data-aos="fade-up" data-aos-delay="100"
                    class="group flex items-stretch gap-5 p-6 bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg hover:border-primary/40 transition-all">
                    <div class="w-20 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ asset('images/gate.jpg') }}" alt="Updates" class="object-cover w-full h-full">
                    </div>
                    <div class="flex-grow min-w-0">
                        <h4
                            class="font-bold text-gray-800 text-base truncate group-hover:text-primary transition-colors mb-2">
                            News and Updates</h4>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-3">Latest news, announcements
                            and upcoming events</p>
                        <span
                            class="inline-flex items-center gap-1 text-sm font-semibold text-primary group-hover:gap-2 transition-all">Read
                            More <i class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </a>

                {{-- Gallery --}}
                <a href="{{ route('gallery') }}" data-aos="fade-up-left" data-aos-delay="200"
                    class="group flex items-stretch gap-5 p-6 bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg hover:border-primary/40 transition-all">
                    <div class="w-20 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ asset('images/gate.jpg') }}" alt="Gallery" class="object-cover w-full h-full">
                    </div>
                    <div class="flex-grow min-w-0">
                        <h4
                            class="font-bold text-gray-800 text-base truncate group-hover:text-primary transition-colors mb-2">
                            Photo Gallery</h4>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-3">View photos and videos of our
                            campus life</p>
                        <span
                            class="inline-flex items-center gap-1 text-sm font-semibold text-primary group-hover:gap-2 transition-all">View
                            Gallery <i class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </a>

            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    COLLEGE HISTORY
    ═══════════════════════════════════════════ --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center lg:gap-12">

                {{-- Image --}}
                <div data-aos="fade-up" class="relative">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('images/gate.jpg') }}" alt="{{ $setting->name }} History"
                            class="object-cover w-full h-full">
                    </div>
                    {{-- Decorative badge --}}
                    <div class="absolute -bottom-4 -right-4 bg-primary text-white px-6 py-4 rounded-xl shadow-lg">
                        <div class="text-3xl font-bold">{{ $setting->established_year ?? '2020' }}</div>
                        <div class="text-xs font-semibold uppercase tracking-wider">Established</div>
                    </div>
                </div>

                {{-- Content --}}
                <div data-aos="fade-up" data-aos-delay="100">
                    <span
                        class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Our
                        History</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Building the Future Since {{
                        $setting->established_year ?? '2020' }}</h2>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        {{ $setting->history ?? 'Tetu Technical and Vocational College has been at the forefront of
                        providing quality technical and vocational education in Nyeri County. Our institution is
                        dedicated to equipping students with practical skills that meet industry demands.' }}
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed mb-8">
                        Through years of excellence, we have grown to become one of the leading TVET institutions in the
                        region, offering diverse programs that empower youth with market-relevant skills and knowledge.
                    </p>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-bold text-white bg-primary rounded-lg shadow-lg hover:brightness-110 hover:shadow-xl transition-all">
                        Learn More About Us <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    DEPARTMENTS
    ═══════════════════════════════════════════ --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            {{-- Section header --}}
            <div class="mb-12 sm:mb-14 text-center" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">
                    Academics
                </span>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3 sm:mb-4">
                    Our Academic Departments
                </h2>

                <p class="max-w-2xl mx-auto text-gray-500 text-sm sm:text-base leading-relaxed">
                    Discover our diverse range of departments offering hands-on training and industry-relevant skills
                    for your successful career.
                </p>
            </div>

            {{-- GRID --}}
            <div class="grid gap-4 sm:gap-5 grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($departments->where('type', 'academic') as $department)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}"
                    class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">

                    {{-- IMAGE --}}
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $department->photo ? Storage::url($department->photo) : asset('images/placeholders/department-placeholder.webp') }}"
                            alt="{{ $department->name }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                    </div>

                    {{-- CONTENT --}}
                    <div class="p-4 sm:p-5 flex flex-col flex-grow">

                        {{-- Title --}}
                        <h3
                            class="text-sm sm:text-lg font-bold text-gray-900 group-hover:text-primary transition-colors leading-snug mb-2">
                            {{ $department->name }}
                        </h3>

                        {{-- Description (hidden on mobile) --}}
                        <p class="hidden sm:block text-gray-500 text-sm leading-relaxed mb-4 flex-grow">
                            {{ Str::limit($department->short_description, 85) }}
                        </p>

                        {{-- CTA --}}
                        <a href="{{ route('academic.department', $department->slug) }}"
                            class="mt-auto inline-flex items-center justify-between text-xs sm:text-sm font-semibold text-gray-700 hover:text-primary transition-colors">

                            <span>View</span>

                            <span
                                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-100 group-hover:bg-primary group-hover:text-white flex items-center justify-center transition-all">
                                <i class="fas fa-arrow-right text-[10px] sm:text-xs"></i>
                            </span>
                        </a>

                    </div>
                </div>
                @endforeach

            </div>

            {{-- View All --}}
            <div class="mt-10 text-center" data-aos="fade-up">
                <a href="{{ route('departments') }}"
                    class="inline-flex items-center gap-2 px-7 py-3 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/20 hover:brightness-110 transition-all">
                    View All Departments <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    SERVICE CHARTER
    ═══════════════════════════════════════════ --}}
    <section class="py-16 bg-white border-t border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10" data-aos="fade-up">
                <span
                    class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Service
                    Charter</span>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-900 mb-2">Our Service Commitment</h2>
                <p class="text-gray-500 text-sm max-w-xl mx-auto">Learn about our commitment to quality service
                    delivery.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                {{-- Left: Content --}}
                <div data-aos="fade-right">
                    <div class="flex items-center gap-3 mb-6">
                        <button onclick="switchCharter('en')" id="btn-en"
                            class="lang-btn px-4 py-2 rounded-lg text-sm font-semibold bg-primary text-white transition-all">
                            English
                        </button>
                        <button onclick="switchCharter('sw')" id="btn-sw"
                            class="lang-btn px-4 py-2 rounded-lg text-sm font-semibold bg-gray-200 text-gray-600 hover:bg-gray-300 transition-all">
                            Kiswahili
                        </button>
                    </div>

                    <div id="charter-content">
                        <div id="en-content" class="charter-text">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Service Charter</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Our service charter outlines our commitment to providing quality education and services
                                to our students, parents, and stakeholders. We pledge to maintain the highest standards
                                of professionalism, transparency, and accountability.
                            </p>
                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Quality technical and vocational education</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Timely response to inquiries</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Transparent admission processes</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Regular progress reports</span></li>
                            </ul>
                        </div>
                        <div id="sw-content" class="charter-text hidden">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Mkataba wa Huduma</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Mkataba wetu wa huduma unaonyowa ahadi yetu ya kutoa elimu na huduma bora kwa wanafunzi,
                                wazazi, na watendakazi. Tunaahidi kushikamia viwango vya juu vya kitaaluma, uwazi, na
                                uwajibikaji.
                            </p>
                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Elimu ya kiwandani na ufundi bora</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Majibu ya haraka kwa maswali</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Mchakato wa usajili wa uwazi</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-primary mt-1"></i><span
                                        class="text-gray-600">Ripoti za kawaida za maendeleo</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="#"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white rounded-lg font-semibold hover:brightness-110 transition-all">
                            <i class="fas fa-download text-sm"></i> Download
                        </a>
                        <button
                            class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-all">
                            <i class="fas fa-play text-sm"></i> Play Audio
                        </button>
                    </div>
                </div>

                {{-- Right: Image --}}
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl">
                        <img id="charter-image" src="{{ asset('images/placeholders/service-charter-en.jpg') }}"
                            alt="Service Charter" class="object-top w-full h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    SUCCESS STORIES
    ═══════════════════════════════════════════ --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <div class="mb-14 text-center" data-aos="fade-up">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Alumni</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">Student Success Stories</h2>
                <p class="max-w-xl mx-auto text-gray-500 text-base leading-relaxed">Meet our graduates who have
                    transformed their education into successful careers.</p>
            </div>

            <div class="grid gap-8 md:grid-cols-3" data-aos="fade-up" data-aos-delay="100">
                @foreach ($successStories as $story)
                <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col pt-14 px-6 pb-6"
                    data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">

                    {{-- Avatar (overlapping top) --}}
                    <div class="absolute -top-8 left-1/2 -translate-x-1/2">
                        <div class="w-16 h-16 rounded-full ring-4 ring-white shadow-lg overflow-hidden bg-gray-100">
                            <img src="{{ $story->photo ? asset('storage/' . $story->photo) : asset('images/default-avatar.jpg') }}"
                                alt="{{ $story->name }}" class="object-cover w-full h-full">
                        </div>
                    </div>

                    {{-- Stars --}}
                    <div class="flex justify-center gap-0.5 mb-3 text-primary text-sm">
                        @for ($i = 0; $i < $story->rating; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $story->rating; $i++)
                                <i class="far fa-star text-gray-200"></i>
                                @endfor
                    </div>

                    {{-- Quote --}}
                    <div class="flex-grow">
                        <i class="fas fa-quote-left text-primary/20 text-3xl mb-2 block"></i>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $story->statement }}</p>
                    </div>

                    {{-- Info --}}
                    <div class="mt-5 pt-4 border-t border-gray-100 text-center">
                        <p class="font-bold text-gray-800 text-sm">{{ $story->name }}</p>
                        <p class="text-primary text-xs font-semibold mt-0.5">{{ $story->course }}, {{ $story->year }}
                        </p>
                        <p class="text-gray-500 text-xs mt-1">
                            <span class="text-emerald-600 font-semibold">{{ $story->occupation }}</span>
                            @if($story->company) · {{ $story->company }} @endif
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 text-center" data-aos="fade-up">
                <a href="{{ route('success.stories') }}"
                    class="inline-flex items-center gap-2 px-8 py-3 font-semibold text-white bg-primary rounded-full shadow-lg shadow-primary/20 hover:brightness-110 hover:shadow-xl transition-all">
                    View All Success Stories <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>


            {{-- Stats strip --}}
            <div class="mt-16 grid gap-6 grid-cols-2 lg:grid-cols-4">
                @foreach([
                ['target' => 92, 'suffix' => '%', 'label' => 'Graduation Rate', 'icon' => 'fa-graduation-cap'],
                ['target' => 85, 'suffix' => '%', 'label' => 'Job Placement', 'icon' => 'fa-briefcase'],
                ['target' => 78, 'suffix' => '%', 'label' => 'Industry Partners', 'icon' => 'fa-handshake'],
                ['target' => 120, 'suffix' => '+', 'label' => 'Certifications', 'icon' => 'fa-award'],
                ] as $stat)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-anchor-placement="top-bottom"
                    class="flex flex-col sm:flex-row items-center sm:items-start gap-3 sm:gap-4 p-4 sm:p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow transition-all text-center sm:text-left">
                    <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center shrink-0 mx-auto sm:mx-0"
                        data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 + 200 }}">
                        <i class="fas {{ $stat['icon'] }} text-white text-lg"></i>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-none">
                            <span class="counter" data-target="{{ $stat['target'] }}">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-gray-500 text-sm mt-0.5">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    PARTNERS
    ═══════════════════════════════════════════ --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white border-t border-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            {{-- SECTION HEADER --}}
            <div class="mb-12 text-center" data-aos="fade-up">

                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-[0.2em] uppercase mb-4">

                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                    Partners
                </span>

                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">
                    Our Trusted Partners
                </h2>

                <p class="max-w-2xl mx-auto text-gray-500 text-sm lg:text-base leading-relaxed">
                    We collaborate with industry leaders, institutions, and organizations
                    to ensure our students receive practical exposure, modern training,
                    and opportunities aligned with the evolving job market.
                </p>

            </div>

            {{-- PARTNERS SLIDER --}}
            <div class="relative">

                {{-- FADE LEFT --}}
                <div
                    class="absolute left-0 top-0 z-10 w-16 h-full bg-gradient-to-r from-white to-transparent pointer-events-none">
                </div>

                {{-- FADE RIGHT --}}
                <div
                    class="absolute right-0 top-0 z-10 w-16 h-full bg-gradient-to-l from-white to-transparent pointer-events-none">
                </div>

                {{-- SCROLL CONTAINER --}}
                <div class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory pb-4 px-1">

                    @foreach ($partners as $partner)

                    <div title="{{ $partner->name }}" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}"
                        class="group min-w-[180px] h-36 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center p-6 snap-center">

                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                            class="max-h-20 max-w-full object-contain grayscale group-hover:grayscale-0 transition duration-300">

                    </div>

                    @endforeach

                </div>

            </div>

        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    CTA BANNER
    ═══════════════════════════════════════════ --}}
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        {{-- background pattern --}}
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Ready to Start Your <span class="text-primary">Journey?</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Join thousands of students who have transformed their lives through quality education at {{
                $setting->name }}.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- WhatsApp Chat Button -->
    <div class="fixed z-50 bottom-5 right-5 sm:bottom-6 sm:right-6">

        <a href="https://wa.me/{{ $setting->phone }}" target="_blank" rel="noopener noreferrer"
            aria-label="Chat on WhatsApp" class="group relative flex items-center justify-center sm:justify-start gap-2
              w-14 h-14 sm:w-auto sm:h-auto sm:px-4 sm:py-3
              bg-green-600 hover:bg-green-700
              text-white rounded-full sm:rounded-full
              shadow-lg shadow-green-600/30
              transition-all duration-300
              hover:scale-105">

            <!-- Pulse dot -->
            <span class="absolute -top-1 -right-1 flex h-3 w-3 sm:h-4 sm:w-4">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-full w-full bg-green-500"></span>
            </span>

            <!-- Icon -->
            <i class="fab fa-whatsapp text-xl sm:text-2xl"></i>

            <!-- Label (desktop only, smooth reveal) -->
            <span
                class="hidden sm:inline-block font-semibold max-w-0 group-hover:max-w-xs overflow-hidden transition-all duration-300">
                Chat
            </span>

        </a>
    </div>

</main>



{{-- HIDE SCROLLBAR --}}
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
