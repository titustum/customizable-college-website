<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Download;
use App\Models\Institution;

new
#[Title("Downloads")]
#[Layout('layouts::app')]
class extends Component
{
    public $selectedCategory = 'all';
    public $search = '';

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $downloads = Download::when($this->selectedCategory !== 'all', function ($query) {
            $query->where('category', $this->selectedCategory);
        })
        ->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
        })
        ->orderBy('created_at', 'desc')
        ->get();

        $categories = Download::select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();

        if (empty($categories)) {
            $categories = ['Brochures', 'Forms', 'Policies', 'Reports', 'Manuals'];
        }

        return [
            'institution' => $institution,
            'downloads' => $downloads,
            'categories' => $categories,
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
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Resources</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Downloads</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Access important documents, forms, brochures, and more from {{ $institution->name }}.</p>
        </div>
    </section>

    <!-- Downloads Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search downloads..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="mb-10 flex flex-wrap justify-center gap-3" data-aos="fade-up">
                <button wire:click="$set('selectedCategory', 'all')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedCategory === 'all' ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    All
                </button>
                @foreach($categories as $category)
                <button wire:click="$set('selectedCategory', '{{ $category }}')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedCategory === $category ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    {{ $category }}
                </button>
                @endforeach
            </div>

            <!-- Downloads Grid -->
            @if(count($downloads))
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($downloads as $index => $download)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300"
                     data-aos="fade-up"
                     data-aos-delay="{{ $index * 50 }}">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary transition-colors">
                                <svg class="w-6 h-6 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow min-w-0">
                                @if($download->category)
                                <span class="inline-block px-2 py-1 mb-2 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                                    {{ $download->category }}
                                </span>
                                @endif
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                                    {{ $download->title }}
                                </h3>
                                @if($download->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $download->description }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500">
                                        {{ strtoupper(pathinfo($download->file_path, PATHINFO_EXTENSION)) }} file
                                    </span>
                                    <a href="{{ Storage::url($download->file_path) }}" download
                                        class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-orange-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download
                                    </a>
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
                    <i class="fas fa-folder-open text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Downloads Available</h3>
                <p class="text-gray-500">Check back later for available documents.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 overflow-hidden bg-gray-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Need More Information?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Contact us if you can't find what you're looking for.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Contact Us <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('admissions') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Apply Now
                </a>
            </div>
        </div>
    </section>
</main>
