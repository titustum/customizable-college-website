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
#[Layout('layouts::app')]
class extends Component {

    public function with()
    {
        return [
            'departments' => Department::all(),
            'successStories'=> SuccessStory::where('is_approved', true)
                                            ->latest()
                                            ->take(3)
                                            ->get(),
            'partners'=> Partner::all(),
            'heroSlides'=> HeroSlide::all(),
        ];
    }
};
?>

<main>

    {{-- ═══════════════════════════════════════════
    HERO SECTION — Full-screen cinematic slider
    ═══════════════════════════════════════════ --}}
    <section id="hero" class="relative w-full" style="height: calc(100vh - 77px); min-height: 520px;">

        <div class="h-full swiper heroSwiper">
            <div class="swiper-wrapper">

                @forelse ($heroSlides as $slide)
                <div class="relative h-full swiper-slide overflow-hidden"
                    style="background-image: url('{{ asset('storage/' . $slide->image) }}'); background-size: cover; background-position: center;">

                    {{-- Multi-layer overlay for depth --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/10"></div>

                    {{-- Decorative diagonal accent --}}
                    <div
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-orange-400 to-transparent opacity-80">
                    </div>

                    {{-- Content --}}
                    <div class="relative h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                            <div class="max-w-2xl">

                                {{-- Tag / label --}}
                                <div class="mb-5 opacity-0 animate__animated"
                                    data-swiper-animation="animate__fadeInLeft" data-animation-delay="0.1">
                                    <span
                                        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/20 border border-primary/40 text-orange-300 text-xs font-bold tracking-widest uppercase backdrop-blur-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                        {{ $institution->name }}
                                    </span>
                                </div>

                                {{-- Heading --}}
                                <h1 class="mb-4 text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] text-white opacity-0 animate__animated"
                                    data-swiper-animation="animate__fadeInLeft" data-animation-delay="0.3"
                                    style="text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
                                    {{ $slide->title }}
                                </h1>

                                {{-- Subtitle --}}
                                @if ($slide->subtitle)
                                <h2 class="mb-3 text-xl md:text-2xl font-semibold text-cyan-300 opacity-0 animate__animated"
                                    data-swiper-animation="animate__fadeInLeft" data-animation-delay="0.55">
                                    {{ $slide->subtitle }}
                                </h2>
                                @endif

                                {{-- Slogan --}}
                                @if ($slide->slogan)
                                <p class="mb-8 text-base md:text-lg text-white/70 leading-relaxed opacity-0 animate__animated"
                                    data-swiper-animation="animate__fadeInUp" data-animation-delay="0.75">
                                    {{ $slide->slogan }}
                                </p>
                                @endif

                                {{-- CTAs --}}
                                <div class="flex flex-wrap items-center gap-3 opacity-0 animate__animated"
                                    data-swiper-animation="animate__fadeInUp" data-animation-delay="1.0">
                                    <a href="{{ route('admissions') }}"
                                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-primary hover:brightness-110 text-white font-bold rounded-full shadow-lg shadow-primary/30 transition-all duration-300 text-sm">
                                        {{ $slide->button_text ?? 'Apply Now' }}
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                    <a href="{{ route('courses') }}"
                                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-white/10 hover:bg-white/20 border border-white/30 text-white font-semibold rounded-full backdrop-blur-sm transition-all duration-300 text-sm">
                                        <i class="fas fa-book-open text-xs"></i>
                                        Our Courses
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Slide number indicator --}}
                    <div
                        class="absolute bottom-6 right-6 lg:right-12 text-white/30 text-xs font-mono tracking-widest select-none">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} / {{ str_pad(count($heroSlides), 2, '0',
                        STR_PAD_LEFT) }}
                    </div>
                </div>

                @empty
                {{-- Fallback slide --}}
                <div class="relative h-full swiper-slide overflow-hidden"
                    style="background-image: url('{{ asset('images/default-hero.webp') }}'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/10"></div>
                    <div
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-orange-400 to-transparent opacity-80">
                    </div>
                    <div class="relative h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                            <div class="max-w-2xl">
                                <div class="mb-5">
                                    <span
                                        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/20 border border-primary/40 text-orange-300 text-xs font-bold tracking-widest uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                        {{ $institution->name }}
                                    </span>
                                </div>
                                <h1
                                    class="mb-4 text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] text-white">
                                    Welcome to {{ $institution->name }}
                                </h1>
                                <h2 class="mb-3 text-xl md:text-2xl font-semibold text-cyan-300">
                                    Empowering Students with Skills for the Future
                                </h2>
                                <p class="mb-8 text-base text-white/70">Join our vibrant community of learners today.
                                </p>
                                <div class="flex flex-wrap items-center gap-3">
                                    <a href="{{ route('admissions') }}"
                                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all text-sm">
                                        Apply Now <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                    <a href="{{ route('courses') }}"
                                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-white/10 border border-white/30 text-white font-semibold rounded-full hover:bg-white/20 transition-all text-sm">
                                        <i class="fas fa-book-open text-xs"></i> Our Courses
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse

            </div>

            {{-- Custom pagination dots --}}
            <div class="swiper-pagination !bottom-7 !left-6 lg:!left-12 !w-auto flex gap-1.5"></div>

            {{-- Navigation arrows — styled --}}
            <div
                class="swiper-button-prev !hidden md:!flex !w-11 !h-11 !rounded-full !bg-white/10 !backdrop-blur-sm !border !border-white/20 after:!text-sm after:!font-black !text-white hover:!bg-white/25 !transition-all !top-1/2 !-translate-y-1/2 !left-5 lg:!left-10">
            </div>
            <div
                class="swiper-button-next !hidden md:!flex !w-11 !h-11 !rounded-full !bg-white/10 !backdrop-blur-sm !border !border-white/20 after:!text-sm after:!font-black !text-white hover:!bg-white/25 !transition-all !top-1/2 !-translate-y-1/2 !right-5 lg:!right-10">
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div
            class="absolute bottom-6 left-1/2 -translate-x-1/2 hidden lg:flex flex-col items-center gap-1.5 text-white/40 animate-bounce">
            <span class="text-[10px] tracking-widest uppercase font-semibold">Scroll</span>
            <i class="fas fa-chevron-down text-xs"></i>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    QUICK STATS BAR
    ═══════════════════════════════════════════ --}}
    <div class="bg-gray-950 text-white py-4 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
                @foreach([
                ['value' => '92', 'suffix' => '%', 'label' => 'Graduation Rate', 'icon' => 'fa-graduation-cap'],
                ['value' => '85', 'suffix' => '%', 'label' => 'Job Placement', 'icon' => 'fa-briefcase'],
                ['value' => '20', 'suffix' => '+', 'label' => 'Programs Offered', 'icon' => 'fa-book-open'],
                ['value' => '120', 'suffix' => '+', 'label' => 'Certifications', 'icon' => 'fa-award'],
                ] as $stat)
                <div class="flex items-center justify-center gap-3 px-4 py-2">
                    <i class="fas {{ $stat['icon'] }} text-primary text-lg opacity-80"></i>
                    <div>
                        <div class="text-xl font-extrabold leading-none">
                            <span class="counter" data-target="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-[11px] text-white/40 mt-0.5">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════
    WELCOME + QUICK CARDS
    ═══════════════════════════════════════════ --}}
    <section class="w-full px-4 py-20 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                {{-- Principal Card --}}
                <div data-aos="fade-up" class="lg:col-span-1">
                    <div
                        class="flex flex-col h-full bg-white border border-gray-100 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">

                        {{-- Top band --}}
                        <div class="h-2 w-full bg-gradient-to-r from-primary to-orange-400"></div>

                        <div class="flex flex-col flex-grow p-7">
                            <h3 class="mb-6 text-xl font-bold text-center text-gray-800">
                                A Word from the <span class="text-primary">Principal</span>
                            </h3>

                            {{-- Avatar --}}
                            <div class="flex justify-center mb-5">
                                <div class="relative">
                                    <div
                                        class="w-32 h-32 rounded-full ring-4 ring-primary/20 ring-offset-2 overflow-hidden">
                                        <img src="{{ $institution->principal_photo ? asset('storage/'.$institution->principal_photo) : asset('images/default-avatar.jpg') }}"
                                            class="object-cover w-full h-full" alt="Principal">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 rounded-full bg-primary flex items-center justify-center shadow">
                                        <i class="fas fa-quote-left text-white text-[10px]"></i>
                                    </div>
                                </div>
                            </div>

                            <blockquote class="text-gray-600 text-sm leading-relaxed text-center flex-grow italic mb-5">
                                "{{ Str::limit($institution->welcome_message, 200) }}"
                            </blockquote>

                            <div class="text-center pt-4 border-t border-gray-100">
                                <p class="font-bold text-gray-800 text-sm">{{ $institution->principal_name }}</p>
                                <p class="text-primary text-xs font-semibold mt-0.5">College Principal</p>
                            </div>

                            <div class="mt-5 text-center">
                                <a href="{{ route('principal.office') }}"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-full shadow hover:brightness-110 transition-all">
                                    Meet Our Team <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right 2-col grid --}}
                <div data-aos="fade-up" data-aos-delay="100" class="lg:col-span-2">
                    <div class="grid h-full gap-5 md:grid-cols-2">

                        {{-- Admissions Card --}}
                        <div class="relative flex flex-col justify-between rounded-2xl overflow-hidden shadow-lg group">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-800"></div>
                            <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity"
                                style="background-image: radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 24px 24px;">
                            </div>
                            <div class="relative p-6">
                                <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center mb-4">
                                    <i class="fas fa-user-graduate text-white text-xl"></i>
                                </div>
                                <h4 class="text-lg font-bold text-white mb-2">Admissions Open!</h4>
                                <p class="text-white/75 text-sm leading-relaxed">Apply now for Artisan, Certificate, and
                                    Diploma programs in various technical fields.</p>
                            </div>
                            <div class="relative p-6 pt-0">
                                <a href="{{ route('admissions') }}"
                                    class="inline-flex items-center gap-2 px-5 py-2 text-sm font-bold text-blue-700 bg-white rounded-full shadow hover:bg-blue-50 transition-all">
                                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Resources Card --}}
                        <div class="relative flex flex-col justify-between rounded-2xl overflow-hidden shadow-lg group">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-emerald-700"></div>
                            <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity"
                                style="background-image: radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 24px 24px;">
                            </div>
                            <div class="relative p-6">
                                <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center mb-4">
                                    <i class="fas fa-folder-open text-white text-xl"></i>
                                </div>
                                <h4 class="text-lg font-bold text-white mb-2">Resources</h4>
                                <p class="text-white/75 text-sm leading-relaxed">Access course outlines, student
                                    handbooks, and important documents.</p>
                            </div>
                            <div class="relative p-6 pt-0">
                                <a href="{{ route('downloads') }}"
                                    class="inline-flex items-center gap-2 px-5 py-2 text-sm font-bold text-emerald-700 bg-white rounded-full shadow hover:bg-emerald-50 transition-all">
                                    Download <i class="fas fa-download text-xs"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Programs (wide) --}}
                        <div
                            class="relative flex flex-col justify-between rounded-2xl overflow-hidden shadow-lg md:col-span-2 group">
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-orange-500"></div>
                            <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity"
                                style="background-image: radial-gradient(circle at 90% 50%, white 1px, transparent 1px); background-size: 28px 28px;">
                            </div>
                            <div class="relative p-7 flex flex-col md:flex-row items-center gap-6">
                                <div class="flex-grow">
                                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center mb-3">
                                        <i class="fas fa-book-open text-white text-xl"></i>
                                    </div>
                                    <h4 class="text-xl font-bold text-white mb-2">Explore Our Programs</h4>
                                    <p class="text-white/80 text-sm leading-relaxed max-w-md">Discover our wide range of
                                        technical and vocational programs designed to equip you with industry-relevant
                                        skills.</p>
                                </div>
                                <div class="shrink-0">
                                    <a href="{{ route('courses') }}"
                                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-bold text-amber-600 bg-white rounded-full shadow-lg hover:bg-amber-50 transition-all whitespace-nowrap">
                                        Explore Programs <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    DEPARTMENTS
    ═══════════════════════════════════════════ --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            {{-- Section header --}}
            <div class="mb-14 text-center" data-aos="fade-up">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Departments</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">Our Academic Departments</h2>
                <p class="max-w-xl mx-auto text-gray-500 text-base leading-relaxed">Explore our outstanding departments
                    designed to provide industry-relevant skills and knowledge.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($departments as $department)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}"
                    class="group bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transition-all duration-300 flex flex-col">

                    {{-- Image --}}
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ $department->photo ? Storage::url($department->photo) : asset('images/placeholders/department-placeholder.webp') }}"
                            alt="{{ $department->name }}"
                            class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        {{-- Department type badge --}}
                        @if($department->type === 'non-academic')
                        <span
                            class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-cyan-500/90 text-white text-[10px] font-bold tracking-wide uppercase backdrop-blur-sm">
                            Non-Academic
                        </span>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-5 flex flex-col flex-grow">
                        <h3
                            class="text-lg font-bold text-gray-800 group-hover:text-primary transition-colors duration-300 mb-2">
                            {{ $department->name }}
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 flex-grow">
                            {{ $department->short_desc }}
                        </p>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('department', $department->slug) }}"
                                class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all duration-300">
                                Explore Department
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- View All CTA tile --}}
                <div data-aos="fade-up" data-aos-delay="{{ count($departments) * 80 }}"
                    class="flex items-center justify-center rounded-2xl bg-primary p-8 text-center shadow hover:shadow-xl transition-shadow">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-building-columns text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">All Departments</h3>
                        <p class="text-white/80 text-sm leading-relaxed mb-6">Discover every technical and vocational
                            program we offer.</p>
                        <a href="{{ route('departments') }}"
                            class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-primary bg-white rounded-full shadow hover:bg-gray-50 transition-all">
                            View All <i class="fas fa-arrow-right text-xs"></i>
                        </a>
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
                <div
                    class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col pt-14 px-6 pb-6">

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
            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                ['target' => 92, 'suffix' => '%', 'label' => 'Graduation Rate', 'icon' => 'fa-graduation-cap'],
                ['target' => 85, 'suffix' => '%', 'label' => 'Job Placement', 'icon' => 'fa-briefcase'],
                ['target' => 78, 'suffix' => '%', 'label' => 'Industry Partners', 'icon' => 'fa-handshake'],
                ['target' => 120, 'suffix' => '+', 'label' => 'Certifications', 'icon' => 'fa-award'],
                ] as $stat)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}"
                    class="flex items-center gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow transition-all">
                    <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center shrink-0">
                        <i class="fas {{ $stat['icon'] }} text-white text-lg"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-gray-900 leading-none">
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
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <div class="mb-10 text-center" data-aos="fade-up">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Partners</span>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-900 mb-2">Our Trusted Partners</h2>
                <p class="max-w-xl mx-auto text-gray-500 text-sm leading-relaxed">
                    Our partnerships with industry leaders ensure our programs remain cutting-edge and graduates are
                    workforce-ready.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6" data-aos="fade-up" data-aos-delay="100">
                @foreach ($partners as $partner)
                <div title="{{ $partner->name }}"
                    class="flex items-center justify-center p-5 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-primary/20 hover:-translate-y-0.5 transition-all duration-300">
                    <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}"
                        class="h-12 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300">
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
    CTA BANNER
    ═══════════════════════════════════════════ --}}
    <section class="relative py-16 overflow-hidden bg-gray-950" data-aos="fade-up">
        {{-- background pattern --}}
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">
                Ready to Start Your <span class="text-primary">Journey?</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed">
                Join thousands of students who have transformed their lives through quality education at {{
                $institution->name }}.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
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


    {{-- Counter Script --}}
    <script>
        document.querySelectorAll('.counter').forEach(counter => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    const target = +counter.getAttribute('data-target');
                    const duration = 1800;
                    const step = Math.ceil(target / (duration / 16));
                    let current = 0;
                    const tick = () => {
                        current = Math.min(current + step, target);
                        counter.textContent = current;
                        if (current < target) requestAnimationFrame(tick);
                    };
                    requestAnimationFrame(tick);
                    observer.unobserve(counter);
                });
            }, { threshold: 0.5 });
            observer.observe(counter);
        });
    </script>

</main>