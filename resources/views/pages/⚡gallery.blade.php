<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\Institution;

new
#[Title("Gallery")]
#[Layout('layouts::app')]
class extends Component
{
    public $selectedCategory = 'all';
    public $search = '';

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $categoryList = GalleryItem::select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();

        if (empty($categoryList)) {
            $categoryList = ['Campus Life', 'Events', 'Academic', 'Sports', 'Graduation'];
        }

        $galleryList = Gallery::with('gallery_items')->get();

        if ($galleryList->isEmpty()) {
            $galleryList = collect([
                (object) [
                    'name' => 'Campus Life',
                    'gallery_items' => collect([
                        (object) ['name' => 'Students in Library', 'category' => 'Campus Life', 'description' => 'Students studying in the library', 'image' => 'images/gate.jpg'],
                        (object) ['name' => 'Campus View', 'category' => 'Campus Life', 'description' => 'Beautiful campus architecture', 'image' => 'images/gate.jpg'],
                        (object) ['name' => 'Student Activities', 'category' => 'Campus Life', 'description' => 'Various student activities', 'image' => 'images/gate.jpg'],
                    ])
                ],
                (object) [
                    'name' => 'Events',
                    'gallery_items' => collect([
                        (object) ['name' => 'Annual Prize Giving', 'category' => 'Events', 'description' => 'Annual prize giving ceremony', 'image' => 'images/gate.jpg'],
                        (object) ['name' => 'Sports Day', 'category' => 'Events', 'description' => 'Annual sports day event', 'image' => 'images/gate.jpg'],
                    ])
                ],
                (object) [
                    'name' => 'Academic',
                    'gallery_items' => collect([
                        (object) ['name' => 'Practical Training', 'category' => 'Academic', 'description' => 'Hands-on training session', 'image' => 'images/gate.jpg'],
                        (object) ['name' => 'ICT Lab', 'category' => 'Academic', 'description' => 'Computer lab session', 'image' => 'images/gate.jpg'],
                    ])
                ],
            ]);
        }

        $filteredGalleries = $galleryList->map(function ($gallery) {
            $filteredItems = $gallery->gallery_items->filter(function ($item) {
                $categoryMatch = $this->selectedCategory === 'all' || $item->category === $this->selectedCategory;
                $searchMatch = empty($this->search) || 
                    stripos($item->name, $this->search) !== false || 
                    stripos($item->description ?? '', $this->search) !== false;
                return $categoryMatch && $searchMatch;
            });
            return (object) array_merge((array) $gallery, ['gallery_items' => $filteredItems]);
        });

        return [
            'institution' => $institution,
            'categories' => $categoryList,
            'galleries' => $filteredGalleries,
        ];
    }

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
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
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Gallery</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Our Gallery</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Explore moments captured across our campus - from academic activities to student life and events.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search gallery..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Category Filter -->
            @if(count($categories) > 0)
            <div class="mb-10 flex flex-wrap justify-center gap-3" data-aos="fade-up">
                <button wire:click="selectCategory('all')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedCategory === 'all' ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    All
                </button>
                @foreach($categories as $category)
                <button wire:click="selectCategory('{{ $category }}')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedCategory === $category ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    {{ $category }}
                </button>
                @endforeach
            </div>
            @endif

            <!-- Gallery Grid -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($galleries as $galleryIndex => $gallery)
                    @foreach($gallery->gallery_items as $itemIndex => $item)
                    <div class="group relative overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 cursor-pointer"
                         data-aos="fade-up"
                         data-aos-delay="{{ ($galleryIndex * 50) + ($itemIndex * 25) }}">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.jpg') }}"
                                alt="{{ $item->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                @if($item->category)
                                <span class="inline-block px-2 py-1 mb-2 text-xs font-semibold text-white bg-primary/80 rounded-full">
                                    {{ $item->category }}
                                </span>
                                @endif
                                <h3 class="text-white font-semibold text-sm">{{ $item->name }}</h3>
                                @if($item->description)
                                <p class="text-white/70 text-xs mt-1 line-clamp-2">{{ $item->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>

            @if($galleries->flatMap->gallery_items->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-images text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Gallery Items Found</h3>
                <p class="text-gray-500">Gallery items will appear here once added.</p>
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
                Want to See More?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Visit our campus in person or follow us on social media for the latest updates and moments.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Visit Campus <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
</main>
