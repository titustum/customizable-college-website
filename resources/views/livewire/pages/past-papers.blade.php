<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Past Papers | Tetu Technical & Vocational College')]
class extends Component
{
    //
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
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Past Papers - Tetu TVC</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">Access a wide range of past examination papers
                to help you prepare for your studies.</p>
        </div>
    </section>
    <!-- Main Content Section -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Available Past Papers</h2>
            <div class="space-y-8">
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="mb-2 text-2xl font-semibold text-gray-800">Mathematics - Form 4</h3>
                    <p class="mb-4 text-gray-600">Past paper for Mathematics Form 4 students. Download and practice to
                        enhance your skills.</p>
                    <a href="#" class="text-orange-500 hover:underline">Download Paper</a>
                </div>
            </div>
        </div>
    </section>
</main>