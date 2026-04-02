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
    public $successStories = [];
    public $hod = null;

    public function mount($slug)
    {
        $this->departments = Department::where('type', 'non-academic')->get();
        $this->department = Department::where('slug', $slug)->where('type', 'non-academic')->firstOrFail();
        $this->hod = TeamMember::where('department_id', $this->department->id)
            ->where('is_hod', true)
            ->first();
    }
};

?>

<main class="bg-gray-50">
    <!-- Hero Section -->
    <section class="relative clip-diagonal grain py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Campus" class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Support Services</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">{{ $department->name }}</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">{{ $department->short_desc }}</p>
        </div>
    </section>

    <!-- HOD / Department Info -->
    <section class="py-16">
        <div class="container px-4 mx-auto max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Photo -->
                <div class="lg:col-span-5" data-aos="fade-right">
                    <div class="relative aspect-[4/5] bg-gray-200 rounded-lg overflow-hidden sticky top-8">
                        @if ($hod && $hod->photo)
                        <img src="{{ asset('storage/'.$hod->photo) }}" alt="{{ $hod->name }}" class="object-cover w-full h-full">
                        @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Info -->
                <div class="lg:col-span-7 space-y-8">
                    <!-- Title & HOD -->
                    <div data-aos="fade-up">
                        @if ($hod)
                        <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Head of Department</span>
                        <h2 class="text-3xl font-bold text-gray-800">{{ $hod->name }}</h2>
                        <p class="text-lg text-gray-600">Head of {{ $department->name }}</p>
                        @if ($hod->qualification)
                        <p class="italic text-gray-500 mt-1">{{ $hod->qualification }}</p>
                        @endif
                        @else
                        <h2 class="text-3xl font-bold text-gray-800">{{ $department->name }}</h2>
                        @endif
                    </div>

                    <!-- About -->
                    <div class="bg-white rounded-lg shadow-sm p-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-xl font-semibold text-primary border-b border-orange-200 pb-2 mb-4">About {{ $department->name }}</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $department->full_desc ?? $department->short_desc }}</p>
                    </div>

                    <!-- HOD Message -->
                    @if ($hod && $hod->bio)
                    <div class="bg-white rounded-lg shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-semibold text-primary border-b border-orange-200 pb-2 mb-4">A Message from the Head</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $hod->bio }}</p>
                    </div>
                    @endif

                    <!-- Contact -->
                    @if ($hod && ($hod->email || $hod->phone))
                    <div class="bg-white rounded-lg shadow-sm p-6" data-aos="fade-up" data-aos-delay="300">
                        <h4 class="mb-3 text-lg font-semibold text-gray-800">Contact {{ $department->name }}</h4>
                        <div class="flex flex-col sm:flex-row gap-4">
                            @if ($hod->email)
                            <a href="mailto:{{ $hod->email }}" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                                <i class="fas fa-envelope w-5 text-primary"></i>
                                {{ $hod->email }}
                            </a>
                            @endif
                            @if ($hod->phone)
                            <a href="tel:{{ $hod->phone }}" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                                <i class="fas fa-phone w-5 text-primary"></i>
                                {{ $hod->phone }}
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Staff -->
                    @php $staff = $department->teamMembers()->where('is_hod', false)->get(); @endphp
                    @if ($staff->isNotEmpty())
                    <div class="bg-white rounded-lg shadow-sm p-6" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Team Members</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($staff as $member)
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center flex-shrink-0">
                                    @if ($member->photo)
                                    <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                    <i class="fas fa-user text-gray-500"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $member->qualification ?? 'Staff' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

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
                Have Questions? <span class="text-primary">Get in Touch</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Reach out to our support departments for any inquiries about our services.
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
