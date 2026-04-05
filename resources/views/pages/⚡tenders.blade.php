<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Tender;
use App\Models\Institution;

new
#[Title("Tenders")]
#[Layout('layouts::app')]
class extends Component
{
    public $selectedStatus = 'all';
    public $search = '';

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $tenders = Tender::query()
            ->when($this->selectedStatus !== 'all', function ($query) {
                $query->where('status', $this->selectedStatus);
            })
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('reference_number', 'like', '%' . $this->search . '%');
            })
            ->orderBy('closing_date', 'asc')
            ->get();

        return [
            'institution' => $institution,
            'tenders' => $tenders,
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
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Procurement</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Tenders</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Current tender opportunities and procurement notices from {{ $institution->name }}.</p>
        </div>
    </section>

    <!-- Tenders Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search by title or reference number..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="mb-10 flex flex-wrap justify-center gap-3" data-aos="fade-up">
                <button wire:click="$set('selectedStatus', 'all')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedStatus === 'all' ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    All Tenders
                </button>
                <button wire:click="$set('selectedStatus', 'open')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedStatus === 'open' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-green-500 hover:text-green-600' }}">
                    Open
                </button>
                <button wire:click="$set('selectedStatus', 'closed')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedStatus === 'closed' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-red-500 hover:text-red-600' }}">
                    Closed
                </button>
            </div>

            <!-- Tenders List -->
            @if(count($tenders))
            <div class="space-y-6">
                @foreach($tenders as $index => $tender)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300"
                     data-aos="fade-up"
                     data-aos-delay="{{ $index * 50 }}">
                    <div class="p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-start gap-6">
                            <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    @if($tender->status === 'open')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span> Open
                                    </span>
                                    @elseif($tender->status === 'closed')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span> Closed
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600">
                                        Cancelled
                                    </span>
                                    @endif
                                    <span class="text-sm text-gray-500 font-medium">{{ $tender->reference_number }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition-colors">
                                    {{ $tender->title }}
                                </h3>
                                @if($tender->description)
                                <p class="text-gray-600 mb-4 line-clamp-2">{{ $tender->description }}</p>
                                @endif
                                <div class="flex flex-wrap items-center gap-4 text-sm">
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Opening: {{ $tender->opening_date?->format('M d, Y') ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Closing: {{ $tender->closing_date->format('M d, Y') }}</span>
                                    </div>
                                    @if($tender->attachment_path)
                                    <a href="{{ Storage::url($tender->attachment_path) }}" download
                                        class="inline-flex items-center gap-2 text-primary font-semibold hover:text-orange-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download Document
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Tenders Available</h3>
                <p class="text-gray-500">Check back later for new tender opportunities.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Have Questions?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Contact our procurement office for any tender-related inquiries.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Contact Us <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>
</main>