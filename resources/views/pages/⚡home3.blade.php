<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Department;
use App\Models\SuccessStory;
use App\Models\Partner;
use App\Models\HeroSlide;

new
#[Title('Welcome to Our College')]
#[Layout('layouts::app3')]
class extends Component {

    public function with()
    {
        return [
            'departments' => Department::all(),
            'successStories'=> SuccessStory::where('is_approved', true)
                                            ->latest()
                                            ->take(3)
                                            ->orderBy('created_at', 'desc')
                                            ->get(),
            'partners'=> Partner::all(),
            'heroSlides'=> HeroSlide::all(),
        ];
    }
};
?>

@assets
<!-- Google Fonts (already in layout, but kept for safety) -->
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endassets

<main>

    <!-- ========== HERO ========== -->
    <section class="relative h-[calc(100vh-108px)] min-h-[560px] overflow-hidden">
        <div class="heroSwiper swiper h-full">
            <div class="swiper-wrapper">

                @forelse ($heroSlides as $slide)
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 scale-105 swiper-slide-active:scale-100"
                        style="background-image:url('{{ asset('storage/'.$slide->image) }}')"></div>
                    <div
                        class="absolute inset-0 bg-[linear-gradient(120deg,_rgba(10,6,4,0.82)_0%,_rgba(0,0,0,0.35)_100%)]">
                    </div>
                    <div class="absolute inset-0 opacity-4 bg-noise"></div>
                    <div class="relative flex flex-col justify-center h-full px-[clamp(24px,6vw,100px)] max-w-[900px]">
                        <div
                            class="inline-flex items-center gap-2.5 text-[10px] font-bold tracking-[2.5px] uppercase text-[#FF6940] mb-5 opacity-0 animate-fade-slide-up before:content-[''] before:w-7 before:h-px before:bg-current before:opacity-60">
                            {{ $institution->name ?? 'TETU TVC' }}
                        </div>
                        <h1
                            class="font-['Playfair_Display'] font-black italic text-[clamp(40px,7vw,80px)] leading-[1.03] text-white tracking-[-1.5px] mb-4 opacity-0 animate-fade-slide-up [animation-delay:0.15s]">
                            {{ $slide->title }}</h1>
                        @if($slide->subtitle)
                        <p
                            class="text-[clamp(15px,2vw,19px)] font-normal text-white/55 max-w-[520px] leading-relaxed mb-8 opacity-0 animate-fade-slide-up [animation-delay:0.3s]">
                            {{ $slide->subtitle }}</p>
                        @endif
                        <div class="flex gap-3 flex-wrap opacity-0 animate-fade-slide-up [animation-delay:0.45s]">
                            <a href="{{ route('admissions') }}"
                                class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full text-[12px] font-bold tracking-wider uppercase bg-[#D63A00] text-white shadow-[0_8px_32px_#D63A0073] hover:bg-[#E8420A] hover:-translate-y-0.5 hover:shadow-[0_14px_40px_#D63A0080] transition-all">
                                <i class="fas fa-pen-to-square text-[10px]"></i>
                                {{ $slide->button_text ?? 'Apply Now' }}
                            </a>
                            <a href="{{ route('courses') }}"
                                class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full text-[12px] font-bold tracking-wider uppercase bg-white/10 text-white/80 border border-white/18 backdrop-blur-sm hover:bg-white/18 hover:text-white hover:-translate-y-0.5 transition-all">
                                <i class="fas fa-book-open text-[10px]"></i>
                                Explore Courses
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                {{-- fallback slides --}}
                @foreach([1,2] as $i)
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 scale-105 swiper-slide-active:scale-100"
                        style="background-image:url('{{ asset('images/default-hero.webp') }}')"></div>
                    <div
                        class="absolute inset-0 bg-[linear-gradient(120deg,_rgba(10,6,4,0.82)_0%,_rgba(0,0,0,0.35)_100%)]">
                    </div>
                    <div class="absolute inset-0 opacity-4 bg-noise"></div>
                    <div class="relative flex flex-col justify-center h-full px-[clamp(24px,6vw,100px)] max-w-[900px]">
                        <div
                            class="inline-flex items-center gap-2.5 text-[10px] font-bold tracking-[2.5px] uppercase text-[#FF6940] mb-5 opacity-0 animate-fade-slide-up before:content-[''] before:w-7 before:h-px before:bg-current before:opacity-60">
                            Tetu Sub-County, Nyeri County</div>
                        <h1
                            class="font-['Playfair_Display'] font-black italic text-[clamp(40px,7vw,80px)] leading-[1.03] text-white tracking-[-1.5px] mb-4 opacity-0 animate-fade-slide-up [animation-delay:0.15s]">
                            Quality Vocational<br>Education</h1>
                        <p
                            class="text-[clamp(15px,2vw,19px)] font-normal text-white/55 max-w-[520px] leading-relaxed mb-8 opacity-0 animate-fade-slide-up [animation-delay:0.3s]">
                            Empowering students with practical skills for meaningful, lasting careers.</p>
                        <div class="flex gap-3 flex-wrap opacity-0 animate-fade-slide-up [animation-delay:0.45s]">
                            <a href="{{ route('admissions') }}"
                                class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full text-[12px] font-bold tracking-wider uppercase bg-[#D63A00] text-white shadow-[0_8px_32px_#D63A0073] hover:bg-[#E8420A] hover:-translate-y-0.5 hover:shadow-[0_14px_40px_#D63A0080] transition-all"><i
                                    class="fas fa-pen-to-square text-[10px]"></i> Apply Now</a>
                            <a href="{{ route('courses') }}"
                                class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full text-[12px] font-bold tracking-wider uppercase bg-white/10 text-white/80 border border-white/18 backdrop-blur-sm hover:bg-white/18 hover:text-white hover:-translate-y-0.5 transition-all"><i
                                    class="fas fa-book-open text-[10px]"></i> Explore Courses</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforelse

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev hidden md:flex"></div>
            <div class="swiper-button-next hidden md:flex"></div>
        </div>
    </section>

    <!-- ========== PRINCIPAL + QUICK LINKS ========== -->
    <section class="py-[100px] bg-[#FAF9F7]">
        <div class="max-w-[1240px] mx-auto px-7">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Principal Message Card --}}
                <div class="md:row-span-2 bg-white border border-black/8 rounded-[20px] p-9 flex flex-col items-center text-center"
                    data-aos="fade-right" data-aos-duration="700">
                    <p class="text-[9px] font-bold tracking-[2px] uppercase text-[#8A8078]/55 mb-2">From the Principal's
                        Desk</p>
                    <div
                        class="w-[120px] h-[120px] rounded-full bg-gradient-to-br from-[#D63A00] to-[#FF6940] p-[3px] mb-5">
                        <img src="{{ asset('storage/'.$institution->principal_photo ?? 'images/default-avatar.jpg') }}"
                            alt="Principal" class="w-full h-full object-cover rounded-full border-3 border-white">
                    </div>
                    <h3 class="font-['Playfair_Display'] text-xl font-bold text-[#0D0D0D] mb-1">{{
                        $institution->principal_name ?? 'Principal' }}</h3>
                    <p class="text-[11px] font-bold tracking-[1.5px] uppercase text-[#D63A00] mb-4">College Principal
                    </p>
                    <p class="text-sm text-[#666] leading-relaxed flex-1">
                        {{ $institution->welcome_message ?? 'Welcome to our institution. We are committed to providing
                        quality vocational education that empowers our students for meaningful careers.' }}
                    </p>
                    <a href="{{ route('staff.members') }}"
                        class="inline-flex items-center gap-2 mt-8 px-6 py-2.5 rounded-full bg-[#D63A00] text-white text-[11px] font-bold tracking-wide uppercase shadow-[0_6px_24px_#D63A0059] hover:bg-[#E8420A] hover:-translate-y-0.5 hover:shadow-[0_12px_32px_#D63A0073] transition-all">
                        Meet Our Team <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                {{-- Announcements placeholder (you can fill with dynamic content) --}}
                <div class="grid grid-rows-2 gap-5">
                    <!-- You can loop through announcements here -->
                    <div class="bg-[#1C1C1C] text-white rounded-[20px] p-8 flex flex-col justify-between">
                        <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center text-xl mb-3"><i
                                class="fas fa-bullhorn"></i></div>
                        <p class="text-[9px] font-bold tracking-wider uppercase text-white/55">Announcements</p>
                        <h3 class="font-['Playfair_Display'] text-2xl font-bold mb-2">Latest Updates</h3>
                        <p class="text-sm text-white/70 leading-relaxed mb-4">Check out the newest news and events from
                            our college.</p>
                        <a href="#"
                            class="inline-flex items-center gap-2 text-[11px] font-bold tracking-wide uppercase text-[#FF6940] hover:text-white transition-colors">View
                            All <i class="fas fa-arrow-right text-[9px]"></i></a>
                    </div>
                    <div class="bg-[#1C1C1C] text-white rounded-[20px] p-8 flex flex-col justify-between">
                        <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center text-xl mb-3"><i
                                class="fas fa-calendar-alt"></i></div>
                        <p class="text-[9px] font-bold tracking-wider uppercase text-white/55">Events</p>
                        <h3 class="font-['Playfair_Display'] text-2xl font-bold mb-2">Upcoming Events</h3>
                        <p class="text-sm text-white/70 leading-relaxed mb-4">Join us for open days, workshops, and
                            more.</p>
                        <a href="#"
                            class="inline-flex items-center gap-2 text-[11px] font-bold tracking-wide uppercase text-[#FF6940] hover:text-white transition-colors">See
                            Calendar <i class="fas fa-arrow-right text-[9px]"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========== DEPARTMENTS ========== -->
    <section class="py-[100px] bg-white">
        <div class="max-w-[1240px] mx-auto px-7">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-[10px] font-bold tracking-[2.5px] uppercase text-[#D63A00] mb-3 before:content-[''] before:w-5 before:h-px before:bg-[#D63A00] before:opacity-50 after:content-[''] after:w-5 after:h-px after:bg-[#D63A00] after:opacity-50">
                    Academic Departments</div>
                <h2
                    class="font-['Playfair_Display'] text-[clamp(30px,4vw,46px)] font-black text-[#0D0D0D] tracking-tight leading-tight mb-3.5">
                    Where Skills Meet <em class="italic text-[#D63A00] not-italic">Passion</em></h2>
                <p class="text-[15px] text-[#8A8078] max-w-[560px] mx-auto leading-relaxed">Explore our outstanding
                    departments — each designed to deliver industry-relevant skills and open pathways to rewarding
                    careers.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($departments as $department)
                <div class="bg-white border border-black/8 rounded-[20px] overflow-hidden hover:shadow-[0_20px_60px_rgba(0,0,0,0.12)] hover:-translate-y-1 transition-all flex flex-col"
                    data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="relative h-[220px] overflow-hidden">
                        <img src="{{ asset('storage/'.$department->photo) }}" alt="{{ $department->name }}"
                            class="w-full h-full object-cover transition-transform duration-600 hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/65 to-transparent opacity-0 hover:opacity-100 transition-opacity">
                        </div>
                        <span
                            class="absolute top-3.5 left-3.5 bg-[#D63A00] text-white text-[9.5px] font-bold tracking-wider uppercase px-2.5 py-1 rounded-full">{{
                            $department->name }}</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-['Playfair_Display'] text-xl font-bold text-[#0D0D0D] mb-2">{{ $department->name
                            }}</h3>
                        <p class="text-[13.5px] text-[#8A8078] leading-relaxed flex-1 line-clamp-3 mb-4">{{
                            $department->short_desc }}</p>
                        <a href="{{ route('department', $department->slug) }}"
                            class="inline-flex items-center gap-2 text-[12px] font-bold tracking-wide uppercase text-[#D63A00] hover:gap-3 transition-all">
                            Explore <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- CTA tile --}}
                <div class="bg-[#1C1C1C] rounded-[20px] flex flex-col items-center justify-center text-center p-10"
                    data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ count($departments) * 80 }}">
                    <div
                        class="w-16 h-16 rounded-lg bg-[#D63A00]/15 flex items-center justify-center text-2xl text-[#FF6940] mb-5">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 class="font-['Playfair_Display'] text-2xl font-bold text-white mb-3">All Departments</h3>
                    <p class="text-sm text-white/50 leading-relaxed mb-6">Browse every department and discover the
                        programme that's right for your career goals.</p>
                    <a href="{{ route('departments') }}"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#D63A00] text-white text-[11px] font-bold tracking-wide uppercase shadow-[0_6px_24px_#D63A0059] hover:bg-[#E8420A] hover:-translate-y-0.5 hover:shadow-[0_12px_32px_#D63A0073] transition-all">
                        View All <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SUCCESS STORIES + STATS ========== -->
    <section class="py-[100px] bg-[#FAF9F7]">
        <div class="max-w-[1240px] mx-auto px-7">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-[10px] font-bold tracking-[2.5px] uppercase text-[#D63A00] mb-3 before:content-[''] before:w-5 before:h-px before:bg-[#D63A00] before:opacity-50 after:content-[''] after:w-5 after:h-px after:bg-[#D63A00] after:opacity-50">
                    Graduate Voices</div>
                <h2
                    class="font-['Playfair_Display'] text-[clamp(30px,4vw,46px)] font-black text-[#0D0D0D] tracking-tight leading-tight mb-3.5">
                    Stories of <em class="italic text-[#D63A00] not-italic">Transformation</em></h2>
                <p class="text-[15px] text-[#8A8078] max-w-[560px] mx-auto leading-relaxed">Meet graduates who turned
                    their education into thriving careers. Their journeys prove what's possible.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-14">
                @foreach ($successStories as $story)
                <div class="bg-white border border-black/8 rounded-[20px] pt-10 px-7 pb-7 relative hover:shadow-[0_16px_50px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all"
                    data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 100 }}">
                    <div
                        class="absolute -top-7 left-1/2 -translate-x-1/2 w-14 h-14 rounded-full bg-gradient-to-br from-[#D63A00] to-[#FF6940] p-[3px]">
                        <img src="{{ $story->photo ? asset('storage/'.$story->photo) : asset('images/default-avatar.jpg') }}"
                            alt="{{ $story->name }}"
                            class="w-full h-full object-cover rounded-full border-2 border-white">
                    </div>
                    <h4 class="font-['Playfair_Display'] text-lg font-bold text-[#0D0D0D] text-center mb-1">{{
                        $story->name }}</h4>
                    <p class="text-[11.5px] font-semibold text-[#D63A00] text-center mb-2.5 tracking-wide">{{
                        $story->course }} · Class of {{ $story->year }}</p>
                    <div class="flex justify-center gap-1 text-[#D63A00] text-[11px] mb-4">
                        @for($i=0;$i<$story->rating;$i++)<i class="fas fa-star"></i>@endfor
                            @for($i=0;$i<5-$story->rating;$i++)<i class="far fa-star"></i>@endfor
                    </div>
                    <p class="text-[13.5px] text-[#666] leading-relaxed text-center italic">"{{ $story->statement }}"
                    </p>
                    <p class="text-[12.5px] font-semibold text-[#444] text-center mt-4 pt-3.5 border-t border-black/8">
                        Currently: <span class="text-green-600">{{ $story->occupation }} @ {{ $story->company }}</span>
                    </p>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-20">
                <a href="{{ route('success.stories') }}"
                    class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-[#D63A00] text-white text-[12px] font-bold tracking-wide uppercase shadow-[0_6px_24px_#D63A0059] hover:bg-[#E8420A] hover:-translate-y-0.5 hover:shadow-[0_12px_32px_#D63A0073] transition-all">
                    All Success Stories <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-black/8 rounded-2xl overflow-hidden mt-20"
                data-aos="fade-up" data-aos-duration="800">
                <div class="bg-[#F3F0EB] p-10 text-center hover:bg-white transition-colors">
                    <div
                        class="w-13 h-13 rounded-lg bg-gradient-to-br from-[#D63A00] to-[#FF6940] flex items-center justify-center text-white text-xl mx-auto mb-4">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="font-['Playfair_Display'] text-[46px] font-black text-[#0D0D0D] leading-none mb-1.5">
                        <span class="counter" data-target="92">0</span>%
                    </div>
                    <div class="text-[12.5px] font-semibold text-[#8A8078] tracking-wide">Graduation Rate</div>
                </div>
                <div class="bg-[#F3F0EB] p-10 text-center hover:bg-white transition-colors">
                    <div
                        class="w-13 h-13 rounded-lg bg-gradient-to-br from-[#D63A00] to-[#FF6940] flex items-center justify-center text-white text-xl mx-auto mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="font-['Playfair_Display'] text-[46px] font-black text-[#0D0D0D] leading-none mb-1.5">
                        <span class="counter" data-target="85">0</span>%
                    </div>
                    <div class="text-[12.5px] font-semibold text-[#8A8078] tracking-wide">Job Placement Rate</div>
                </div>
                <div class="bg-[#F3F0EB] p-10 text-center hover:bg-white transition-colors">
                    <div
                        class="w-13 h-13 rounded-lg bg-gradient-to-br from-[#D63A00] to-[#FF6940] flex items-center justify-center text-white text-xl mx-auto mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="font-['Playfair_Display'] text-[46px] font-black text-[#0D0D0D] leading-none mb-1.5">
                        <span class="counter" data-target="78">0</span>+
                    </div>
                    <div class="text-[12.5px] font-semibold text-[#8A8078] tracking-wide">Industry Partners</div>
                </div>
                <div class="bg-[#F3F0EB] p-10 text-center hover:bg-white transition-colors">
                    <div
                        class="w-13 h-13 rounded-lg bg-gradient-to-br from-[#D63A00] to-[#FF6940] flex items-center justify-center text-white text-xl mx-auto mb-4">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="font-['Playfair_Display'] text-[46px] font-black text-[#0D0D0D] leading-none mb-1.5">
                        <span class="counter" data-target="120">0</span>+
                    </div>
                    <div class="text-[12.5px] font-semibold text-[#8A8078] tracking-wide">Certifications Awarded</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PARTNERS ========== -->
    <section class="py-[100px] bg-white border-t border-black/8">
        <div class="max-w-[1240px] mx-auto px-7">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-[10px] font-bold tracking-[2.5px] uppercase text-[#D63A00] mb-3 before:content-[''] before:w-5 before:h-px before:bg-[#D63A00] before:opacity-50 after:content-[''] after:w-5 after:h-px after:bg-[#D63A00] after:opacity-50">
                    Trusted By</div>
                <h2
                    class="font-['Playfair_Display'] text-[clamp(30px,4vw,46px)] font-black text-[#0D0D0D] tracking-tight leading-tight mb-3.5">
                    Our <em class="italic text-[#D63A00] not-italic">Partners</em></h2>
                <p class="text-[15px] text-[#8A8078] max-w-[560px] mx-auto leading-relaxed">Partnerships with industry
                    leaders and authorities ensure our programmes are always cutting-edge and our graduates ready for
                    the workforce.</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($partners as $partner)
                <div class="bg-white border border-black/8 rounded-xl p-6 flex items-center justify-center hover:shadow-[0_8px_28px_rgba(0,0,0,0.08)] hover:-translate-y-0.5 transition-all"
                    title="{{ $partner->name }}" data-aos="fade-up" data-aos-duration="600"
                    data-aos-delay="{{ $loop->index * 50 }}">
                    <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}"
                        class="h-12 max-w-full object-contain grayscale opacity-55 hover:grayscale-0 hover:opacity-100 transition-all">
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const heroSwiper = new Swiper('.heroSwiper', {
        loop: true,
        speed: 900,
        autoplay: { delay: 6000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        on: {
            slideChangeTransitionStart() {
                document.querySelectorAll('.slide-eyebrow,.slide-title,.slide-sub,.slide-ctas').forEach(el => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(24px)';
                    el.style.animationName = 'none';
                    void el.offsetWidth;
                    el.style.animationName = '';
                    el.style.animationDuration = '.6s';
                });
            }
        }
    });

    // Counter animation
    document.querySelectorAll('.counter').forEach(el => {
        const target = +el.dataset.target;
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                observer.unobserve(entry.target);
                let current = 0;
                const step = target / 80;
                const tick = () => {
                    current = Math.min(current + step, target);
                    el.textContent = Math.ceil(current);
                    if (current < target) requestAnimationFrame(tick);
                };
                tick();
            });
        }, { threshold: 0.5 });
        observer.observe(el);
    });
</script>

<style>
    /* Custom keyframes only – can't be replaced by Tailwind utilities */
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-slide-up {
        animation: fadeSlideUp 0.6s ease forwards;
    }

    /* Noise background (data URI) */
    .bg-noise {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    /* Swiper overrides (kept minimal) */
    .swiper-button-prev,
    .swiper-button-next {
        @apply  !w-11 !h-11 rounded-full bg-white/12 border border-white/20 backdrop-blur-sm text-white hover:  !bg-[#D63A00] hover: !border-[#D63A00] transition-colors;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        @apply  !text-sm !font-bold;
    }

    .swiper-pagination-bullet {
        @apply  !w-1.5 !h-1.5 !bg-white/40 !opacity-100;
    }

    .swiper-pagination-bullet-active {
        @apply  !w-6 !rounded-full !bg-[#D63A00];
    }
</style>
