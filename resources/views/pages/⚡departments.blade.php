<?php

use App\Models\Department;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('All Departments')]
class extends Component
{
     //
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
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4"
                data-aos="fade-down">Academics</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Our
                Departments</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">
                Explore our diverse departments designed to provide industry-relevant skills and knowledge.</p>
        </div>
    </section>

    @php
    $academicDepartments = $departments->where('type', 'academic');
    $nonAcademicDepartments = $departments->where('type', '<>', 'academic');
        @endphp

        <section class="py-16">
            <div class="container px-4 mx-auto max-w-7xl">



                @if ($academicDepartments->isNotEmpty())
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Academic Departments</h2>
                    <div class="w-24 h-1 mx-auto bg-primary rounded"></div>
                </div>

                {{-- GRID --}}
                <div class="grid gap-4 sm:gap-5 grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                    @foreach ($academicDepartments as $department)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}"
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">

                        {{-- IMAGE --}}
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ $department->photo ? Storage::url($department->photo) : asset('images/placeholders/department-placeholder.webp') }}"
                                alt="{{ $department->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                            </div>

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
                @endif

                @if ($nonAcademicDepartments->isNotEmpty())
                <div class="mt-16 mb-16 text-center">
                    <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Support Offices</h2>
                    <div class="w-24 h-1 mx-auto bg-primary rounded"></div>
                </div>

                {{-- GRID --}}
                <div class="grid gap-4 sm:gap-5 grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                    @foreach ($nonAcademicDepartments as $department)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}"
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">

                        {{-- IMAGE --}}
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ $department->photo ? Storage::url($department->photo) : asset('images/placeholders/department-placeholder.webp') }}"
                                alt="{{ $department->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                            </div>

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
                <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                    data-aos-delay="200">
                    Take the first step toward your future career. Apply now for our upcoming intake.
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
