<?php

use App\Models\Department;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Departments')]
class extends Component
{
    public $academicDepartments = [];
    public $nonAcademicDepartments = [];

    function mount() {
        $this->academicDepartments = Department::where('type', 'academic')->get();
        $this->nonAcademicDepartments = Department::where('type', 'non-academic')->get();
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
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Academics</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Our Departments</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Explore our diverse departments designed to provide industry-relevant skills and knowledge.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="container px-4 mx-auto max-w-7xl">
            @if ($academicDepartments->isNotEmpty())
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Academic Departments</h2>
                <div class="w-24 h-1 mx-auto bg-primary rounded"></div>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($academicDepartments as $department)
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}"
                    class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-lg group hover:shadow-xl">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{  $department->photo ? asset('storage/'.$department->photo) : asset('images/default-avatar.jpg')  }}" alt="{{ $department->name }}"
                            class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-800 transition-colors duration-300 group-hover:text-primary">
                            {{ $department->name }}</h3>
                        <p class="mb-5 text-gray-600 line-clamp-3">{{ $department->short_desc }}</p>
                        <div class="pt-2 border-t border-gray-100">
                            <a href="{{ route('academic.department', $department->slug) }}"
                                class="inline-flex items-center font-semibold text-primary transition-colors duration-300 hover:text-orange-700">
                                Explore Department
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if ($nonAcademicDepartments->isNotEmpty())
            <div class="mt-16 mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Support Services</h2>
                <div class="w-24 h-1 mx-auto bg-primary rounded"></div>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($nonAcademicDepartments as $department)
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}"
                    class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-lg group hover:shadow-xl">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{  $department->photo ? asset('storage/'.$department->photo) : asset('images/default-avatar.jpg')  }}" alt="{{ $department->name }}"
                            class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-800 transition-colors duration-300 group-hover:text-primary">
                            {{ $department->name }}</h3>
                        <p class="mb-5 text-gray-600 line-clamp-3">{{ $department->short_desc }}</p>
                        <div class="pt-2 border-t border-gray-100">
                            <a href="{{ route('non.academic.department', $department->slug) }}"
                                class="inline-flex items-center font-semibold text-primary transition-colors duration-300 hover:text-orange-700">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- CTA BANNER --}}
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Ready to Start Your <span class="text-primary">Journey?</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Take the first step toward your future career. Apply now for our upcoming intake.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
</main>
