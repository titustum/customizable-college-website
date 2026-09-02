<?php

use App\Models\Faq;
use App\Models\InstitutionSetting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('FAQs | Tetu Technical & Vocational College')]
#[Layout('layouts::app')]
class extends Component
{
    public $search = '';

    public function with()
    {
        $institution = InstitutionSetting::first() ?? (object) ['name' => 'Our College'];

        $faqs = Faq::where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        $filteredFaqs = $faqs->filter(function ($faq) {
            return str_contains(strtolower($faq->question), strtolower($this->search)) ||
                str_contains(strtolower($faq->answer), strtolower($this->search));
        });

        return [
            'institution' => $institution,
            'filteredFaqs' => $filteredFaqs,
        ];
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
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4"
                data-aos="fade-down">Support</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">FAQs</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Find
                answers to common questions about admissions, courses, and student life at {{ $institution->name }}.</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 lg:px-8">
            <!-- Search -->
            <div class="mb-10" data-aos="fade-up">
                <div class="relative">
                    <input wire:model.live.debounce.300ms="search" type="text"
                        placeholder="Search questions (e.g., intakes, location, courses)..."
                        class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- FAQ Accordion List -->
            <div class="space-y-4" x-data="{ activeAccordion: null }">
                @forelse($filteredFaqs as $index => $faq)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden"
                    x-data="{ id: {{ $index }} }" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <!-- Question Toggle Button -->
                    <button @click="activeAccordion = activeAccordion === id ? null : id"
                        class="w-full px-6 py-4 text-left flex justify-between items-center gap-4 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        :aria-expanded="activeAccordion === id">
                        <span class="font-semibold text-gray-900 text-base sm:text-lg">
                            {{ $faq->question }}
                        </span>
                        <span
                            class="flex-shrink-0 text-primary bg-primary/10 rounded-full p-2 transition-transform duration-300"
                            :class="{ 'rotate-180': activeAccordion === id }">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>

                    <!-- Answer Panel -->
                    <div x-show="activeAccordion === id" x-collapse
                        class="px-6 pb-5 pt-3 text-gray-600 text-sm sm:text-base border-t border-gray-100"
                        style="display: none;">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 bg-white rounded-2xl border border-gray-200 shadow-sm"
                    data-aos="fade-up">
                    <p class="text-gray-500 text-base">No matching questions found for "<span
                            class="font-medium text-gray-800">{{ $search }}</span>".</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</main>