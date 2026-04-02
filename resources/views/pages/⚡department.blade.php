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
    public $hod = null;

    public function mount($slug)
    {
        $this->departments = Department::all();
        $this->department  = Department::where('slug', $slug)->firstOrFail();
        $this->successStories = SuccessStory::all();
        $this->hod = TeamMember::where('department_id', $this->department->id)
            ->where('is_hod', true)
            ->first();
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
            <div class="absolute inset-0 bg-gradient-to-br from-gray-950/80 via-gray-900/70 to-orange-950/30"></div>
        </div>

        {{-- Decorative glow orbs --}}
        <div class="absolute top-1/3 right-10 w-72 h-72 rounded-full bg-orange-600/10 blur-3xl pointer-events-none z-0">
        </div>
        <div
            class="absolute -bottom-20 left-0 w-96 h-96 rounded-full bg-orange-800/10 blur-3xl pointer-events-none z-0">
        </div>

        <div class="relative z-10 container mx-auto px-4 pt-16 pb-28">

            {{-- Breadcrumb --}}
            <nav class="flex items-center text-xs font-semibold tracking-wide text-white/50 mb-8" data-aos="fade-down">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span class="breadcrumb-item"></span>
                <a href="{{ route('departments') }}"
                    class="breadcrumb-item hover:text-white transition-colors">Departments</a>
                <span class="breadcrumb-item text-white/80">{{ $department->name }}</span>
            </nav>

            {{-- Department pill + title --}}
            <div data-aos="fade-up">
                <span class="label-pill mb-5">Academic Department</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight max-w-3xl mb-5"
                data-aos="fade-up" data-aos-delay="60">
                {{ $department->name }}
            </h1>

            <p class="text-gray-300 text-lg max-w-2xl leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="120">
                {{ $department->short_desc }}
            </p>

            {{-- Quick stat chips in hero --}}
            <div class="flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="180">
                <div
                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-full px-4 py-2 text-sm text-white">
                    <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span><strong>{{ count($department->courses) }}</strong> Courses</span>
                </div>
                <div
                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-full px-4 py-2 text-sm text-white">
                    <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span><strong>{{ count($department->teamMembers) }}</strong> Trainers</span>
                </div>
                <div
                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-full px-4 py-2 text-sm text-white">
                    <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <span>KNQA Accredited</span>
                </div>
            </div>

        </div>
    </header>

    <main>

        {{-- ─────────────────────────────────────────────
        OVERVIEW (2-col: content + sidebar)
        ───────────────────────────────────────────────── --}}
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                    {{-- ── Main content column ── --}}
                    <div class="lg:col-span-2 space-y-14">

                        {{-- Overview text --}}
                        <div data-aos="fade-up">
                            <span class="label-pill mb-4">About the Department</span>
                            <h2 class="section-heading text-3xl lg:text-4xl mt-3">Department Overview</h2>
                            <span class="heading-rule mb-6"></span>
                            <p class="text-gray-600 leading-relaxed text-lg">{{ $department->full_desc }}</p>
                        </div>

                        {{-- HOD Card --}}
                        @if ($hod)
                        <div class="hod-card" data-aos="fade-up">
                            <div class="flex flex-col sm:flex-row">
                                {{-- Photo --}}
                                <div class="sm:w-56 flex-shrink-0 bg-gray-100 relative min-h-[220px]">
                                    @if ($hod->photo)
                                    <img src="{{ asset('storage/' . $hod->photo) }}" alt="{{ $hod->name }}"
                                        class="absolute inset-0 w-full h-full object-cover">
                                    @else
                                    <div
                                        class="absolute inset-0 flex flex-col items-center justify-center bg-orange-50 text-orange-400">
                                        <svg class="w-14 h-14 mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                        <span class="text-xs font-medium text-orange-400">Photo Coming Soon</span>
                                    </div>
                                    @endif
                                    {{-- HOD badge overlay --}}
                                    <div
                                        class="absolute bottom-0 inset-x-0 bg-orange-600 text-white text-center text-xs font-bold py-2 tracking-wider uppercase">
                                        Head of Department
                                    </div>
                                </div>

                                {{-- Info --}}
                                <div class="p-7 flex-1">
                                    <h3 class="font-display text-2xl font-bold text-gray-900 mb-1">{{ $hod->name }}
                                    </h3>
                                    @if ($hod->qualification)
                                    <p class="text-orange-600 font-semibold text-sm mb-4">{{ $hod->qualification }}
                                    </p>
                                    @endif
                                    @if ($hod->bio)
                                    <p class="text-gray-600 leading-relaxed text-sm mb-5">{{ $hod->bio }}</p>
                                    @endif
                                    @if ($hod->email || $hod->phone)
                                    <div class="pt-4 border-t border-gray-100 space-y-2">
                                        @if ($hod->email)
                                        <a href="mailto:{{ $hod->email }}"
                                            class="flex items-center gap-2 text-sm text-gray-600 hover:text-orange-600 transition-colors">
                                            <svg class="w-4 h-4 text-orange-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                            </svg>
                                            {{ $hod->email }}
                                        </a>
                                        @endif
                                        @if ($hod->phone)
                                        <a href="tel:{{ $hod->phone }}"
                                            class="flex items-center gap-2 text-sm text-gray-600 hover:text-orange-600 transition-colors">
                                            <svg class="w-4 h-4 text-orange-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                            </svg>
                                            {{ $hod->phone }}
                                        </a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Feature rows --}}
                        <div data-aos="fade-up">
                            <h3 class="section-heading text-2xl mb-2">Practical Learning Environment</h3>
                            <span class="heading-rule mb-6"></span>

                            <div class="space-y-4">
                                @foreach ([
                                ['icon' => 'M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42
                                15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0
                                1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0
                                4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336
                                4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25
                                3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75
                                15.75M4.867 19.125h.008v.008h-.008v-.008Z', 'title' => 'Modern Workshops', 'body' =>
                                'Students train on industry-standard tools and equipment under the guidance of
                                experienced instructors.'],
                                ['icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94
                                3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17
                                0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0
                                0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0
                                0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15
                                6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5
                                0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z', 'title' => 'Industry
                                Connections', 'body' => 'Strong partnerships with employers provide internship
                                placements, live projects, and job placement support.'],
                                ['icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5
                                12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12
                                6.75h.008v.008H12V6.75Z', 'title' => 'KNQA-Aligned Curriculum', 'body' => 'All
                                programmes are registered with TVETA and benchmarked to Kenya National
                                Qualifications Authority standards.'],
                                ] as $feat)
                                <div
                                    class="feature-row flex items-start gap-4 p-4 rounded-xl hover:bg-orange-50 transition-colors cursor-default">
                                    <div class="feature-icon-box">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="{{ $feat['icon'] }}" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $feat['title'] }}</h4>
                                        <p class="text-sm text-gray-500 leading-relaxed">{{ $feat['body'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>{{-- /main col --}}

                    {{-- ── Sidebar column ── --}}
                    <aside class="space-y-6" data-aos="fade-left">

                        {{-- Department photo --}}
                        @if ($department->photo)
                        <div class="rounded-2xl overflow-hidden shadow-md">
                            <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }}"
                                class="w-full object-cover aspect-[4/3]">
                        </div>
                        @endif

                        {{-- Quick facts card --}}
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                            <div class="bg-primary px-5 py-4">
                                <h3 class="font-bold text-white text-lg">Quick Facts</h3>
                            </div>
                            <div class="p-5 space-y-3">
                                <div class="info-chip">
                                    <svg class="info-chip-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    <span><strong>{{ count($department->courses) }} Courses</strong> available from
                                        certificate to diploma level</span>
                                </div>
                                <div class="info-chip">
                                    <svg class="info-chip-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                    </svg>
                                    <span>Registered with <strong>TVETA</strong> &amp; aligned to KNQA
                                        framework</span>
                                </div>
                                <div class="info-chip">
                                    <svg class="info-chip-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                    </svg>
                                    <span>Industry attachment &amp; <strong>job placement</strong> support</span>
                                </div>
                                <div class="info-chip">
                                    <svg class="info-chip-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                    </svg>
                                    <span>ODeL options available for <strong>distance learners</strong></span>
                                </div>
                            </div>
                        </div>

                        {{-- Apply CTA card --}}
                        <div class="bg-gray-900 rounded-2xl p-6 text-center">
                            <div
                                class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h4 class="font-display font-bold text-white text-lg mb-2">Intake 2025 Open</h4>
                            <p class="text-gray-400 text-sm mb-4 leading-relaxed">Applications for the upcoming
                                intake are now being accepted.</p>
                            <a href="{{ route('admissions') }}"
                                class="block w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-xl transition-all text-center mb-3">
                                Apply Now →
                            </a>
                            <a href="{{ route('contact') }}"
                                class="block w-full border border-gray-700 hover:border-orange-600 text-gray-400 hover:text-white font-semibold py-3 rounded-xl transition-all text-center text-sm">
                                Ask a Question
                            </a>
                        </div>

                        {{-- Other departments mini list --}}
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                            <div class="px-5 py-4 border-b border-gray-100">
                                <h3 class="font-semibold text-gray-800 text-sm uppercase tracking-widest">Other
                                    Departments</h3>
                            </div>
                            <ul class="divide-y divide-gray-50">
                                @foreach ($departments->where('id', '!=', $department->id)->take(6) as $dep)
                                <li>
                <a href="{{ $dep->type === 'academic' ? route('academic.department', $dep->slug) : route('non.academic.department', $dep->slug) }}"
                                        class="flex items-center justify-between px-5 py-3 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors group">
                                        <span>{{ $dep->name }}</span>
                                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>{{-- /sidebar --}}

                </div>
            </div>
        </section>

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
                            <p class="text-orange-600 text-xs font-semibold mb-2">{{ $trainer->role->name ?? '' }}
                            </p>
                            @if ($trainer->qualification)
                            <p class="text-gray-400 text-xs leading-relaxed">{{ $trainer->qualification }}</p>
                            @endif
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