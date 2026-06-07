<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Department;
use App\Models\SuccessStory;
use App\Models\TeamMember;

new
#[Title('Department')]
class extends Component
{
    public $department;
    public $departments = [];
    public $successStories = [];
    public $facilityPics = [];
    public $hod = null;

    public function mount($slug)
    {
        /*
        |--------------------------------------------------------------------------
        | Optimized Department Loading
        |--------------------------------------------------------------------------
        | - Eager load relationships
        | - Prevent N+1 queries
        | - Include counts directly
        */

        $this->department = Department::with([
            'courses',
            'teamMembers.roles',
        ])
        ->withCount([
            'courses',
            'teamMembers',
        ])
        ->where('slug', $slug)
        ->where('type', 'academic')
        ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Other Academic Departments (lightweight query)
        |--------------------------------------------------------------------------
        */

        $this->departments = Department::select(
                'id',
                'name',
                'slug',
                'type'
            )
            ->where('type', 'academic')
            ->where('id', '!=', $this->department->id)
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Department-Specific Testimonials
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

        $this->hod = $this->department->hod()->first();
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
    <header class="relative clip-diagonal grain bg-gray-900 overflow-hidden">

        {{-- Background image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/' . $department->banner_pic) }}" alt="{{ $department->name }} Banner"
                class="w-full h-full object-cover opacity-25 scale-105"
                style="transform-origin:center; animation: subtle-zoom 14s ease-in-out infinite alternate;">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-950/50 via-gray-900/30 to-orange-950/10"></div>
        </div>

        {{-- Decorative glow orbs --}}
        <div class="absolute top-1/3 right-10 w-72 h-72 rounded-full bg-orange-600/10 blur-3xl pointer-events-none z-0">
        </div>
        <div
            class="absolute -bottom-20 left-0 w-96 h-96 rounded-full bg-orange-800/10 blur-3xl pointer-events-none z-0">
        </div>

        <div class="relative z-10 container mx-auto px-4 pt-16 pb-28">

            {{-- Department pill + title --}}
            <div data-aos="fade-up">
                <span class="label-pill mb-5">Academic Department</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight max-w-3xl mb-5"
                data-aos="fade-up" data-aos-delay="60">
                {{ $department->name }}
            </h1>

            <p class="mt-4 text-lg text-gray-200">
                {{ $department->short_description ?? 'Discover our comprehensive training programs and expert
                trainers dedicated to preparing you for a successful career in the hospitality industry.' }}
            </p>
        </div>
    </header>

    <main>


        {{-- ─────────────────────────────────────────────
        BREADCRUMBS
        ──────────────────────────────────────────────── --}}
        <section class="border-b border-gray-100 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">

                <nav class="flex items-center text-xs font-semibold tracking-wide" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-gray-500">

                        {{-- Home --}}
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">
                                Home
                            </a>
                        </li>

                        {{-- Separator --}}
                        <li aria-hidden="true">
                            <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </li>

                        {{-- Departments --}}
                        <li>
                            <a href="{{ route('departments') }}" class="hover:text-gray-900 transition-colors">
                                Departments
                            </a>
                        </li>

                        {{-- Separator --}}
                        <li aria-hidden="true">
                            <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </li>

                        {{-- Active Department --}}
                        <li class="text-gray-900 font-bold truncate" aria-current="page">
                            {{ $department->name }}
                        </li>

                    </ol>
                </nav>

            </div>
        </section>




        {{-- ─────────────────────────────────────────────
        INTRO
        ──────────────────────────────────────────────── --}}

        <section class="py-14 sm:py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">

                <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">

                    {{-- Image --}}
                    <div class="relative">
                        <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }}"
                            class="rounded-3xl shadow-2xl w-full object-cover">

                        {{-- Floating Badge --}}
                        <div
                            class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-gray-100">

                            <div class="flex items-center gap-2">
                                <i class="fas fa-award text-amber-500 text-sm"></i>
                                <span class="text-sm font-semibold text-gray-700">
                                    Professional Training
                                </span>
                            </div>

                        </div>
                    </div>

                    {{-- Content --}}
                    <div>

                        {{-- Label --}}
                        <h2 class="text-amber-600 font-semibold uppercase tracking-wide"> Department Overview </h2>

                        {{-- Heading --}}
                        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-4 leading-tight">
                            Building Future {{ $department->name }} Professionals
                        </h2>

                        {{-- Description --}}
                        <p class="mt-6 text-gray-600 text-base sm:text-lg leading-relaxed">
                            {{ $department->full_description ?? 'Our department is dedicated to providing top-tier
                            training in
                            hospitality, equipping students with the skills and knowledge needed to excel in the
                            industry. With a focus on practical experience and industry connections, we prepare our
                            graduates for successful careers in hotels, restaurants, event management, and more.' }}
                        </p>

                        {{-- Stats --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-10">

                            {{-- Courses --}}
                            <div
                                class="bg-gray-50 rounded-2xl p-5 border border-gray-100 hover:shadow-md transition-all">

                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center">

                                        <i class="fas fa-book-open text-amber-600"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900">
                                            {{ $department->courses_count }}+
                                        </h3>

                                        <p class="text-sm text-gray-500">
                                            Courses
                                        </p>
                                    </div>
                                </div>

                            </div>

                            {{-- Trainers --}}
                            <div
                                class="bg-gray-50 rounded-2xl p-5 border border-gray-100 hover:shadow-md transition-all">

                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-11 h-11 rounded-xl bg-orange-100 flex items-center justify-center">

                                        <i class="fas fa-chalkboard-teacher text-orange-600"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900">
                                            {{ $department->team_members_count }}
                                        </h3>

                                        <p class="text-sm text-gray-500">
                                            Trainers
                                        </p>
                                    </div>
                                </div>

                            </div>

                            {{-- Graduates --}}
                            <div
                                class="bg-gray-50 rounded-2xl p-5 border border-gray-100 hover:shadow-md transition-all">

                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-11 h-11 rounded-xl bg-cyan-100 flex items-center justify-center">

                                        <i class="fas fa-user-graduate text-cyan-700"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900">
                                            500+
                                        </h3>

                                        <p class="text-sm text-gray-500">
                                            Graduates
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>


        {{-- ─────────────────────────────────────────────
        HOD WELCOME MESSAGE
        ──────────────────────────────────────────────── --}}
        @if ($hod)
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

                            <img @if($hod->photo)
                            src="{{ asset('storage/' . $hod->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif
                            alt="{{ $hod->name }}"
                            class="w-full h-[420px] sm:h-[500px] object-cover rounded-3xl shadow-2xl"
                            >

                            {{-- Floating Badge --}}
                            <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6">
                                <div class="bg-amber-500 text-white px-4 py-2 sm:px-5 rounded-full shadow-lg">
                                    <p class="text-[10px] sm:text-xs uppercase tracking-wider font-semibold">
                                        Head of Department
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

                                {{ $hod->welcome_message ?? 'Our department is committed to nurturing talent, inspiring
                                innovation, and preparing students with the practical skills needed to thrive in today’s
                                dynamic hospitality and professional industries. We welcome you to be part of this
                                transformative journey.' }}

                            </blockquote>

                        </div>

                        {{-- HOD Details --}}
                        <div class="mt-8">

                            <h3 class="text-2xl font-bold text-gray-900">
                                {{ $hod->name }}
                            </h3>

                            <p class="text-amber-600 font-semibold mt-1 text-sm sm:text-base">
                                {{ $hod->role->name ?? 'Trainer' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>
        </section>
        @endif



        {{-- ─────────────────────────────────────────────
        COURSES TABLE
        ───────────────────────────────────────────────── --}}
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4" data-aos="fade-up">

                <div class="text-center mb-10">
                    <span class="label-pill mb-4">Programmes</span>
                    <h2 class="section-heading text-3xl lg:text-4xl mt-3">Courses Offered</h2>
                    <span class="heading-rule mx-auto mb-4"></span>
                    <p class="text-gray-500 max-w-xl mx-auto">All courses lead to nationally recognised
                        qualifications assessed by the relevant examination bodies.</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="course-table w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="px-5 py-4 text-left font-semibold tracking-wide text-xs uppercase">
                                        Course Name</th>
                                    <th
                                        class="px-5 py-4 text-left font-semibold tracking-wide text-xs uppercase hidden sm:table-cell">
                                        Entry Requirements</th>
                                    <th
                                        class="px-5 py-4 text-left font-semibold tracking-wide text-xs uppercase hidden md:table-cell">
                                        Duration</th>
                                    <th
                                        class="px-5 py-4 text-left font-semibold tracking-wide text-xs uppercase hidden md:table-cell">
                                        Exam Body</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($department->courses as $course)
                                <tr>
                                    <td class="px-5 py-4">
                                        <div class="font-semibold text-gray-900">{{ $course->name }}</div>
                                        {{-- Mobile fallback --}}
                                        <div class="mt-1 space-y-0.5 sm:hidden">
                                            <div class="text-xs text-gray-500">{{ $course->requirement }}</div>
                                            <div class="text-xs text-gray-400">{{ $course->duration }} · {{
                                                $course->exam_body }}</div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 text-gray-600 hidden sm:table-cell">{{ $course->requirement
                                        }}</td>
                                    <td class="px-5 py-4 hidden md:table-cell">
                                        <span class="inline-flex items-center gap-1 text-gray-600">
                                            <svg class="w-3.5 h-3.5 text-orange-500" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ $course->duration }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 hidden md:table-cell">
                                        <span
                                            class="inline-block bg-orange-50 text-orange-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                            {{ $course->exam_body }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Table footer --}}
                    <div
                        class="px-5 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between flex-wrap gap-3">
                        <p class="text-xs text-gray-500">Showing {{ count($department->courses) }} course(s) in this
                            department</p>
                        <a href="{{ route('admissions') }}"
                            class="inline-flex items-center gap-1.5 text-xs font-bold text-orange-600 hover:text-orange-700 transition-colors">
                            Apply for a Course →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ─────────────────────────────────────────────
        TRAINERS GRID
        ───────────────────────────────────────────────── --}}
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="label-pill mb-4">Our People</span>
                    <h2 class="section-heading text-3xl lg:text-4xl mt-3">Meet Our Trainers</h2>
                    <span class="heading-rule mx-auto mb-4"></span>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg">Learn from industry experts who bring
                        real-world experience into every session.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-7">
                    @foreach ($department->teamMembers as $trainer)
                    <div class="trainer-card group" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 60 }}">
                        {{-- Accent top bar --}}
                        <div class="h-1.5 bg-orange-600 group-hover:bg-orange-500 transition-colors"></div>
                        <div class="p-6 flex flex-col items-center text-center">
                            <div class="mb-4 relative">
                                <img @if ($trainer->photo)
                                src="{{ asset('storage/' . $trainer->photo) }}"
                                @else
                                src="{{ asset('images/default-avatar.jpg') }}"
                                @endif
                                alt="{{ $trainer->name }}"
                                class="trainer-avatar">
                                @if ($trainer->is_hod)
                                <span
                                    class="absolute -bottom-1 -right-1 bg-orange-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full uppercase tracking-wide">HOD</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm leading-tight mb-1">{{ $trainer->name }}
                            </h3>
                            <p class="text-orange-600 text-xs font-semibold mb-2">{{
                                $trainer->roles->pluck('name')->join(', ') }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

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