<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Institution;

new
#[Title("News & Updates")]
#[Layout('layouts::app')]
class extends Component
{
    public $selectedCategory = 'all';
    public $search = '';
    public $updates = [];


    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $updates = [
            (object) [
                'id' => 1,
                'title' => 'Intake 2025 Now Open',
                'category' => 'Admissions',
                'date' => '2025-04-01',
                'description' => 'We are now accepting applications for the 2025 academic year. Join us and build your future with quality technical education.',
                'image' => 'images/gate.jpg',
                'featured' => true,
            ],
            (object) [
                'id' => 2,
                'title' => 'TVETA Accreditation Renewed',
                'category' => 'Achievement',
                'date' => '2025-03-15',
                'description' => 'Our institution has successfully renewed TVETA accreditation for all our programs. This reaffirms our commitment to quality technical education.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 3,
                'title' => 'Annual Sports Day 2025',
                'category' => 'Events',
                'date' => '2025-03-10',
                'description' => 'Join us for our annual sports day featuring various competitive sports and team activities. All students are encouraged to participate.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 4,
                'title' => 'New ICT Laboratory Opened',
                'category' => 'Facilities',
                'date' => '2025-02-28',
                'description' => 'We are excited to announce the opening of our state-of-the-art ICT laboratory with 50 new computer stations.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 5,
                'title' => 'Partnership with Local Industries',
                'category' => 'Partnership',
                'date' => '2025-02-15',
                'description' => 'New partnerships with local industries will provide more internship opportunities for our students.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 6,
                'title' => 'Graduation Ceremony 2024',
                'category' => 'Events',
                'date' => '2024-12-20',
                'description' => 'Our annual graduation ceremony celebrated the achievements of over 300 graduates. Congratulations to all our graduates!',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 7,
                'title' => 'Career Fair 2024',
                'category' => 'Events',
                'date' => '2024-11-15',
                'description' => 'Over 20 employers participated in our annual career fair, providing networking opportunities for final year students.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
            (object) [
                'id' => 8,
                'title' => 'Best Technical College Award',
                'category' => 'Achievement',
                'date' => '2024-10-05',
                'description' => 'We are honored to receive the Best Technical College Award from the County Education Board.',
                'image' => 'images/gate.jpg',
                'featured' => false,
            ],
        ];

        $categories = ['Admissions', 'Achievement', 'Events', 'Facilities', 'Partnership'];

        return [
            'institution' => $institution,
            'updates' => collect($updates),
            'categories' => $categories,
        ];
    }

    public function getFilteredUpdatesProperty()
    {
        return collect($this->updates)->filter(function ($update) {
            $categoryMatch = $this->selectedCategory === 'all' || $update->category === $this->selectedCategory;
            $searchMatch = empty($this->search) ||
                stripos($update->title, $this->search) !== false ||
                stripos($update->description, $this->search) !== false;
            return $categoryMatch && $searchMatch;
        })->values();
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
                data-aos="fade-down">News & Updates</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">
                Latest News</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Stay
                updated with the latest news, events, and announcements from {{ $institution->name }}.</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search news..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
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

            <!-- Featured Update -->
            @php $featuredUpdate = $this->filteredUpdates->firstWhere('featured'); @endphp
            @if($featuredUpdate && $selectedCategory === 'all' && empty($search))
            <div class="mb-12" data-aos="fade-up">
                <div class="relative overflow-hidden rounded-2xl shadow-xl">
                    <div class="grid lg:grid-cols-2">
                        <div class="aspect-video lg:aspect-auto overflow-hidden">
                            <img src="{{ asset($featuredUpdate->image) }}" alt="{{ $featuredUpdate->title }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-8 flex flex-col justify-center bg-white">
                            <span
                                class="inline-block self-start px-3 py-1 mb-4 text-xs font-bold text-white bg-primary rounded-full">
                                Featured
                            </span>
                            <span
                                class="inline-block px-3 py-1 mb-4 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                                {{ $featuredUpdate->category }}
                            </span>
                            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">{{ $featuredUpdate->title }}
                            </h2>
                            <p class="text-gray-600 mb-4">{{ $featuredUpdate->description }}</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ \Carbon\Carbon::parse($featuredUpdate->date)->format('F j, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- News Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($this->filteredUpdates as $index => $update)
                @if(!$update->featured || $selectedCategory !== 'all' || !empty($search))
                <article
                    class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset($update->image) }}" alt="{{ $update->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2 py-1 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                                {{ $update->category }}
                            </span>
                            <span class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($update->date)->format('F j, Y') }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ $update->title }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ $update->description }}</p>
                    </div>
                </article>
                @endif
                @endforeach
            </div>

            @if($this->filteredUpdates->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-newspaper text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Updates Found</h3>
                <p class="text-gray-500">Check back later for the latest news and events.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-3xl mx-auto px-4 text-center" data-aos="fade-up">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Stay Connected</h2>
            <p class="text-gray-600 mb-8">Subscribe to our newsletter to receive the latest updates and news directly in
                your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Enter your email"
                    class="flex-grow px-4 py-3 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                <button type="submit"
                    class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-orange-700 transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Have Questions?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Get in touch with us for more information about our programs and admissions.
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