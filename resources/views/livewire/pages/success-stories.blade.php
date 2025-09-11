<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\SuccessStory;

new
#[Title('Success Stories | Tetu Technical & Vocational College')] 
class extends Component
{
    public function with(){
        return [
            'successStories'=> SuccessStory::where('is_approved', true)
                                            ->latest()
                                            ->take(8)
                                            ->orderBy('created_at', 'desc')
                                            ->get(),
        ];
    }
}; ?>

<main class="overflow-hidden">
    <!-- Hero Section with Parallax Effect -->
    <section class="relative py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Tetu TVC Campus"
                class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Student Success Stories</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">Meet our graduates who have transformed their
                education
                into successful careers
            </p>
        </div>
    </section>

    <!-- Success Stories Grid Section -->
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Student Success Stories</h2>
                <div class="w-24 h-1 mx-auto bg-orange-500 rounded"></div>
                <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">Meet our graduates who have transformed their
                    education into successful careers</p>
            </div>

            <div class="text-center mb-12">
                <a href="{{ route('create.success.story') }}"
                    class="inline-block px-6 py-3 text-white bg-orange-600 hover:bg-orange-700 font-semibold rounded-lg shadow-lg transition duration-300">
                    <i class="fas fa-plus-circle mr-2"></i> Share Your Story
                </a>
            </div>

            <!-- Success Stories Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" data-aos="fade-up">

                @foreach ($successStories as $story)
                <!-- Success Story Card -->
                <div class="group">
                    <div
                        class="relative overflow-hidden transition-all duration-300 transform bg-white rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2">
                        <!-- Card Header with Photo -->
                        <div class="relative p-6 pb-0">
                            <div class="flex justify-center">
                                <div class="relative">
                                    <div
                                        class="w-24 h-24 p-1 rounded-full bg-gradient-to-r from-orange-400 to-orange-600 shadow-lg">
                                        <img src="{{ $story->photo ? asset('storage/' . $story->photo) : asset('images/default-avatar.jpg') }}"
                                            alt="{{ $story->name }}" class="object-cover w-full h-full rounded-full">
                                    </div>
                                    <!-- Achievement Badge -->
                                    <div
                                        class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="fas fa-graduation-cap text-white text-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 pt-4">
                            <div class="text-center mb-4">
                                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $story->name }}</h3>
                                <p class="text-orange-600 font-medium">{{ $story->course }}</p>
                                <p class="text-sm text-gray-500">Class of {{ $story->year }}</p>

                                <!-- Rating Stars -->
                                <div class="flex justify-center mt-3 mb-4 text-orange-400">
                                    {{-- Full stars --}}
                                    @for ($i = 0; $i < $story->rating; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                        @endfor

                                        {{-- Empty stars --}}
                                        @for ($i = 0; $i < 5 - $story->rating; $i++)
                                            <i class="far fa-star text-sm text-gray-300"></i>
                                            @endfor
                                </div>
                            </div>

                            <!-- Quote Section -->
                            <div class="mb-6">
                                <div class="relative">
                                    <svg class="w-8 h-8 text-orange-200 mb-3" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.039 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" />
                                    </svg>
                                    <blockquote class="text-gray-600 leading-relaxed italic">
                                        {{ $story->statement }}
                                    </blockquote>
                                </div>
                            </div>

                            <!-- Current Position -->
                            <div class="border-t pt-4">
                                <p class="text-sm text-gray-500 mb-1">Currently working as:</p>
                                <p class="font-semibold text-gray-800">
                                    <span class="text-green-600">{{ $story->occupation }}</span>
                                </p>
                                <p class="text-sm text-gray-600 mt-1">at {{ $story->company }}</p>
                            </div>
                        </div>

                        <!-- Hover Effect Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-orange-500/0 to-orange-500/0 group-hover:from-orange-500/5 group-hover:to-transparent transition-all duration-300 rounded-2xl">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Load More Section (if needed) -->
            @if($successStories->count() > 6)
            <div class="text-center mt-12">
                <button
                    class="px-8 py-3 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors duration-300 shadow-lg hover:shadow-xl">
                    Load More Stories
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto max-w-6xl">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                        <i class="fas fa-graduation-cap text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $successStories->count() }}+</h3>
                    <p class="text-gray-600">Success Stories</p>
                </div>

                <div class="group" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                        <i class="fas fa-briefcase text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">95%</h3>
                    <p class="text-gray-600">Employment Rate</p>
                </div>

                <div class="group" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                        <i class="fas fa-building text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">200+</h3>
                    <p class="text-gray-600">Partner Companies</p>
                </div>

                <div class="group" data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                        <i class="fas fa-award text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2">50+</h3>
                    <p class="text-gray-600">Industry Awards</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 text-white bg-gradient-to-r from-orange-600 to-orange-500">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <div class="mb-8 text-center md:mb-0 md:text-left" data-aos="fade-right">
                    <h2 class="mb-4 text-3xl font-bold">Ready to Start Your Career at Tetu Technical?</h2>
                    <p class="max-w-xl text-white/90">Take the first step toward your future career. Apply
                        now for our upcoming intake and join our community of successful graduates.</p>
                </div>
                <div class="flex flex-col gap-4 sm:flex-row" data-aos="fade-left">
                    <a href="{{ route('admissions') }}"
                        class="px-6 py-3 font-bold text-center text-orange-600 transition duration-300 bg-white rounded-lg hover:bg-gray-100 shadow-lg hover:shadow-xl">
                        Apply Now
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 font-bold text-center text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white/10">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>