<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Department;
use App\Models\TeamMember;

new
#[Title('Department')]
class extends Component
{
    public $department;
    public $departments = [];
    public $hod = null;
    public $teamMembers = [];

    public function mount($slug)
    {
        $this->departments = Department::where('type', 'non-academic')->get();
        $this->department = Department::where('slug', $slug)->where('type', 'non-academic')->firstOrFail();
        $this->hod = TeamMember::where('department_id', $this->department->id)
            ->where('is_hod', true)
            ->first();
        $this->teamMembers = TeamMember::where('department_id', $this->department->id)
            ->where('is_hod', false)
            ->get();
    }
};

?>

<div class="min-h-screen bg-gray-50 text-gray-800">

    {{-- Hero Banner --}}
    <header class="relative clip-diagonal grain bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Campus"
                class="w-full h-full object-cover opacity-25 scale-105">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-950/80 via-gray-900/70 to-orange-950/30"></div>
        </div>

        <div class="absolute top-1/3 right-10 w-72 h-72 rounded-full bg-orange-600/10 blur-3xl pointer-events-none z-0">
        </div>
        <div
            class="absolute -bottom-20 left-0 w-96 h-96 rounded-full bg-orange-800/10 blur-3xl pointer-events-none z-0">
        </div>

        <div class="relative z-10 container mx-auto px-4 pt-16 pb-28">
            <nav class="flex items-center text-xs font-semibold tracking-wide text-white/50 mb-8" data-aos="fade-down">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span class="breadcrumb-item"></span>
                <a href="{{ route('departments') }}" class="breadcrumb-item hover:text-white transition-colors">Support
                    Services</a>
                <span class="breadcrumb-item text-white/80">{{ $department->name }}</span>
            </nav>

            <div data-aos="fade-up">
                <span class="label-pill mb-5">Support Services</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight max-w-3xl mb-5"
                data-aos="fade-up" data-aos-delay="60">
                {{ $department->name }}
            </h1>

            <p class="text-gray-300 text-lg max-w-2xl leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="120">
                {{ $department->short_desc }}
            </p>

            <div class="flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="180">
                <div
                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-full px-4 py-2 text-sm text-white">
                    <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span><strong>{{ $teamMembers->count() + ($hod ? 1 : 0) }}</strong> Team Members</span>
                </div>
            </div>
        </div>
    </header>

    <main>
        {{-- Overview Section --}}
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
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
                                    <div
                                        class="absolute bottom-0 inset-x-0 bg-orange-600 text-white text-center text-xs font-bold py-2 tracking-wider uppercase">
                                        Head of {{ $department->name }}
                                    </div>
                                </div>

                                <div class="p-7 flex-1">
                                    <h3 class="font-display text-2xl font-bold text-gray-900 mb-1">{{ $hod->name }}</h3>
                                    @if ($hod->qualification)
                                    <p class="text-orange-600 font-semibold text-sm mb-4">{{ $hod->qualification }}</p>
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

                    </div>

                    {{-- Sidebar --}}
                    <aside class="space-y-6" data-aos="fade-left">
                        @if ($department->photo)
                        <div class="rounded-2xl overflow-hidden shadow-md">
                            <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }}"
                                class="w-full object-cover aspect-[4/3]">
                        </div>
                        @endif

                        {{-- Contact CTA --}}
                        <div class="bg-gray-900 rounded-2xl p-6 text-center">
                            <div
                                class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h4 class="font-display font-bold text-white text-lg mb-2">Get in Touch</h4>
                            <p class="text-gray-400 text-sm mb-4 leading-relaxed">Have questions about our services?
                                We're here to help.</p>
                            <a href="{{ route('contact') }}"
                                class="block w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-xl transition-all text-center mb-3">
                                Contact Us →
                            </a>
                        </div>

                        {{-- Other departments --}}
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                            <div class="px-5 py-4 border-b border-gray-100">
                                <h3 class="font-semibold text-gray-800 text-sm uppercase tracking-widest">Other Service
                                    Departments</h3>
                            </div>
                            <ul class="divide-y divide-gray-50">
                                @foreach ($departments->where('id', '!=', $department->id)->where('type',
                                'non-academic') as $dep)
                                <li>
                                    <a href="{{ route('non.academic.department', $dep->slug) }}"
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
                    </aside>
                </div>
            </div>
        </section>

        {{-- Team Grid --}}
        @if ($teamMembers->isNotEmpty() || $hod)
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="label-pill mb-4">Our People</span>
                    <h2 class="section-heading text-3xl lg:text-4xl mt-3">Meet Our Team</h2>
                    <span class="heading-rule mx-auto mb-4"></span>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg">Dedicated professionals committed to supporting
                        our institution.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-7">
                    @if ($hod)
                    <div class="trainer-card group" data-aos="fade-up">
                        <div class="h-1.5 bg-orange-600 group-hover:bg-orange-500 transition-colors"></div>
                        <div class="p-6 flex flex-col items-center text-center">
                            <div class="mb-4 relative">
                                @if ($hod->photo)
                                <img src="{{ asset('storage/' . $hod->photo) }}" alt="{{ $hod->name }}"
                                    class="trainer-avatar">
                                @else
                                <img src="{{ asset('images/default-avatar.jpg') }}" alt="{{ $hod->name }}"
                                    class="trainer-avatar">
                                @endif
                                <span
                                    class="absolute -bottom-1 -right-1 bg-orange-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full uppercase tracking-wide">HOD</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm leading-tight mb-1">{{ $hod->name }}</h3>
                            <p class="text-orange-600 text-xs font-semibold mb-2">Head of Section</p>
                            @if ($hod->qualification)
                            <p class="text-gray-400 text-xs leading-relaxed">{{ $hod->qualification }}</p>
                            @endif
                        </div>
                    </div>
                    @endif
                    @foreach ($teamMembers as $member)
                    <div class="trainer-card group" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 60 }}">
                        <div class="h-1.5 bg-orange-600 group-hover:bg-orange-500 transition-colors"></div>
                        <div class="p-6 flex flex-col items-center text-center">
                            <div class="mb-4 relative">
                                @if ($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                    class="trainer-avatar">
                                @else
                                <img src="{{ asset('images/default-avatar.jpg') }}" alt="{{ $member->name }}"
                                    class="trainer-avatar">
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm leading-tight mb-1">{{ $member->name }}</h3>
                            <p class="text-orange-600 text-xs font-semibold mb-2">{{ $member->role->name ?? 'Staff' }}
                            </p>
                            @if ($member->qualification)
                            <p class="text-gray-400 text-xs leading-relaxed">{{ $member->qualification }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- CTA Banner --}}
        <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
            <div class="absolute inset-0 opacity-5"
                style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
            </div>
            <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>

            <div class="relative max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                    Have Questions? <span class="text-primary">Get in Touch</span>
                </h2>
                <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                    data-aos-delay="200">
                    Reach out to {{ $department->name }} for any inquiries about our services.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                        Contact Us <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('admissions') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                        <i class="fas fa-envelope text-xs"></i> Admissions
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
