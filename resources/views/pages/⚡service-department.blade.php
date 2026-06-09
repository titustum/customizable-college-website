<?php

use Livewire\Component;
use App\Models\Department;
use App\Models\SuccessStory;
use App\Models\TeamMember;

new class extends Component
{
    public $department;
    public $coordinator;
    public $teamMembers;
    public $successStories;


    public function mount($slug)
    {

        $this->department = Department::where('slug', $slug)
                            ->withCount('teamMembers')->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Section Department-Specific Testimonials
        |--------------------------------------------------------------------------
        */

        $this->successStories = SuccessStory::where('department_id', $this->department->id)
            ->latest()
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Head of Department
        |--------------------------------------------------------------------------
        */

        $this->coordinator = $this->department
                            ->coordinator()
                            ->with('assignments.role', 'assignments.department')
                            ->first();

        // dd($this->coordinator);

        $this->teamMembers = $this->department
                            ->teamMembers()
                            ->with('assignments.role', 'assignments.department')
                            ->get();
        // dd($this->teamMembers);

    }


    // with view function
    public function render()
    {
        return $this->view()
            ->title($this->department->name . ' Department');
    }
};

?>

{{-- ═══════════════════════════════════════════════════════
PAGE WRAPPER
═══════════════════════════════════════════════════════ --}}
<div class="min-h-screen bg-gray-50 text-gray-800">

    {{-- ─────────────────────────────────────────────────
    HERO BANNER
    ───────────────────────────────────────────────── --}}
    <header class="relative">
        <!-- Banner Image -->
        <div class="h-96 md:h-[500px] w-full overflow-hidden">
            <img src="{{ Storage::url($department->banner_photo) }}" alt="{{ $department->name }} Banner"
                class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <!-- Department Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12">
            <div class="container mx-auto">
                <div class="inline-block px-4 py-1 mb-3 text-sm font-semibold text-white bg-orange-500 rounded-full">
                    Department
                </div>
                <h1 class="mb-2 text-3xl font-bold text-white md:text-5xl">{{ $department->name }}</h1>
                <p class="max-w-3xl text-lg md:text-xl text-white/90">{{ $department->short_description }}</p>
            </div>
        </div>
    </header>

    <main>


        <!-- ================================================= -->
        <!-- ABOUT -->
        <!-- ================================================= -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

                <img src="{{ Storage::url($department->photo) }}" class="rounded-3xl shadow-xl" alt="Sports" />

                <div>
                    <h2 class="text-4xl font-bold mb-6">About the {{ $department->name }} Department</h2>

                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $department->full_description }}
                    </p>

                </div>

            </div>
        </section>




        {{-- ─────────────────────────────────────────────
        HOD WELCOME MESSAGE
        ──────────────────────────────────────────────── --}}
        @if ($coordinator)
        <section class="py-14 sm:py-16 lg:py-20 bg-white relative overflow-hidden">

            {{-- Background Accent --}}
            <div class="absolute top-0 left-0 w-52 sm:w-72 h-52 sm:h-72 bg-amber-100 rounded-full blur-3xl opacity-30">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">

                <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                    {{-- HOD Image --}}
                    <div class="relative order-1">

                        {{-- Glow --}}
                        <div class="absolute -inset-3 sm:-inset-4 bg-amber-500/10 rounded-3xl blur-xl"></div>

                        <div class="relative max-w-sm sm:max-w-md mx-auto">

                            <img @if($coordinator->photo)
                            src="{{ asset('storage/' . $coordinator->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif
                            alt="{{ $coordinator->name }}"
                            class="w-full h-[420px] sm:h-[500px] object-cover rounded-3xl shadow-2xl"
                            >

                            {{-- Floating Badge --}}
                            <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6">
                                <div class="bg-amber-500 text-white px-4 py-2 sm:px-5 rounded-full shadow-lg">
                                    <p class="text-[10px] sm:text-xs uppercase tracking-wider font-semibold">
                                        {{ $department->name }}
                                        {{ $coordinator->roles
                                        ->firstWhere('pivot.department_id', $department->id)
                                        ?->name ?? 'No role' }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- HOD Content --}}
                    <div class="order-2 text-center lg:text-left">

                        <span class="text-amber-600 font-semibold uppercase tracking-wider text-sm">
                            Message from the HOD
                        </span>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mt-3 leading-tight">
                            Welcome to the {{ $department->name }} Department
                        </h2>

                        {{-- Quote Card --}}
                        <div class="mt-8 relative bg-gray-50 border border-gray-100 rounded-2xl p-6 sm:p-8 shadow-sm">

                            {{-- Quote Mark --}}
                            <div
                                class="absolute -top-4 sm:-top-5 left-5 sm:left-6 text-5xl sm:text-6xl text-amber-200 font-serif leading-none">
                                “
                            </div>

                            <blockquote class="text-base sm:text-lg text-gray-600 leading-relaxed relative z-10">

                                {{ $department->leader_message ?? 'Our department is committed to
                                nurturing talent,
                                inspiring
                                innovation, and preparing students with the practical skills needed to thrive in today’s
                                dynamic hospitality and professional industries. We welcome you to be part of this
                                transformative journey.' }}

                            </blockquote>

                        </div>

                        {{-- HOD Details --}}
                        <div class="mt-8">

                            <h3 class="text-2xl font-bold text-gray-900">
                                {{ $coordinator->name }}
                            </h3>


                            @php
                            $assignment = $coordinator->assignmentFor($department->id);
                            @endphp

                            <p class="text-amber-600 font-semibold mt-1 text-sm sm:text-base">
                                {{ $assignment?->custom_title ?? $assignment?->role?->name ?? 'No role' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>
        </section>
        @endif

        {{-- ─────────────────────────────────────────────
        SUPPORT TEAM GRID
        ───────────────────────────────────────────────── --}}

        @if($department->team_members_count > 1)

        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="label-pill mb-4">Our People</span>
                    <h2 class="section-heading text-3xl lg:text-4xl mt-3">Meet Our Support Team</h2>
                    <span class="heading-rule mx-auto mb-4"></span>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg">Learn from industry experts who bring
                        real-world experience into every session.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-7">
                    @foreach ($teamMembers as $member)
                    <div class="trainer-card group" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 60 }}">
                        {{-- Accent top bar --}}
                        <div class="h-1.5 bg-orange-600 group-hover:bg-orange-500 transition-colors"></div>
                        <div class="p-6 flex flex-col items-center text-center">
                            <div class="mb-4 relative">
                                <img @if ($member->photo)
                                src="{{ asset('storage/' . $member->photo) }}"
                                @else
                                src="{{ asset('images/default-avatar.jpg') }}"
                                @endif
                                alt="{{ $member->name }}"
                                class="trainer-avatar">
                                @if ($member->is_hod)
                                <span
                                    class="absolute -bottom-1 -right-1 bg-orange-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full uppercase tracking-wide">HOD</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm leading-tight mb-1">{{ $member->name }}
                            </h3>
                            <p class="text-orange-600 text-xs font-semibold mb-2">
                                {{ $member->assignments->firstWhere('department_id', $department->id)?->custom_title
                                ?? $member->assignments->firstWhere('department_id', $department->id)->role->name }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        @endif

        {{-- ─────────────────────────────────────────────
        SUCCESS STORIES CAROUSEL
        ───────────────────────────────────────────────── --}}
        @if ($successStories->isNotEmpty())
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="label-pill mb-4">Testimonials</span>
                    <h2 class="section-heading text-3xl lg:text-4xl mt-3">Student Success Stories</h2>
                    <span class="heading-rule mx-auto mb-4"></span>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg">Hear from graduates who turned their training
                        into thriving careers.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="80">
                    <div class="swiper-container overflow-hidden pb-14">
                        <div class="swiper-wrapper">
                            @foreach ($successStories as $story)
                            <div class="swiper-slide h-auto">
                                <div class="testimonial-card h-full flex flex-col">
                                    {{-- Opening quote mark --}}
                                    <div class="text-5xl leading-none text-orange-200 font-serif mb-2 select-none">
                                        &ldquo;</div>
                                    <blockquote class="flex-1 text-gray-600 text-sm leading-relaxed mb-6">
                                        {{ $story->statement }}
                                    </blockquote>
                                    {{-- Author --}}
                                    <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                                        <div
                                            class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 ring-2 ring-orange-100">
                                            <img src="{{ asset('storage/' . $story->photo) }}" alt="{{ $story->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900 text-sm">{{ $story->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">Class of {{ $story->year }}
                                                @if ($story->company)
                                                &middot; Now at <span class="text-orange-600 font-semibold">{{
                                                    $story->company }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination mt-8"></div>
                        <div class="swiper-button-next !w-10 !h-10"></div>
                        <div class="swiper-button-prev !w-10 !h-10"></div>
                    </div>
                </div>

            </div>
        </section>
        @endif

        {{-- ═══════════════════════════════════════════
        CTA BANNER
        ═══════════════════════════════════════════ --}}
        <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
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
                    Applications for the {{ now()->year }} intake are now open. Join our growing community of skilled
                    graduates.
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

    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                autoplay: { delay: 5500, disableOnInteraction: false },
                grabCursor: true,
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        });
</script>
