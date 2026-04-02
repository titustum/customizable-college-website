<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PastPaper;
use App\Models\Institution;

new
#[Title("Past Papers")]
#[Layout('layouts::app')]
class extends Component
{
    use WithPagination;

    public string $search = '';
    public $selectedYear = 'all';

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $papers = PastPaper::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('unit_name', 'like', '%' . $this->search . '%')
                      ->orWhere('exam_year', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedYear !== 'all', function ($query) {
                $query->where('exam_year', $this->selectedYear);
            })
            ->latest()
            ->paginate(12);

        $years = PastPaper::select('exam_year')
            ->distinct()
            ->orderBy('exam_year', 'desc')
            ->pluck('exam_year')
            ->toArray();

        return [
            'institution' => $institution,
            'papers' => $papers,
            'years' => $years,
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
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Past Papers</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Access past examination papers to help you prepare for your exams.</p>
        </div>
    </section>

    <!-- Past Papers Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search by title, unit or year..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <select wire:model.live="selectedYear" class="px-4 py-3 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    <option value="all">All Years</option>
                    @foreach($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Past Papers Grid -->
            @if($papers->count())
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($papers as $index => $paper)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300"
                     data-aos="fade-up"
                     data-aos-delay="{{ $index * 50 }}">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary transition-colors">
                                <svg class="w-6 h-6 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow min-w-0">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                                    {{ $paper->title }}
                                </h3>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full">
                                        {{ $paper->unit_name }}
                                    </span>
                                    <span class="px-2 py-1 text-xs font-semibold text-primary bg-primary/10 rounded-full">
                                        {{ $paper->exam_type }}
                                    </span>
                                    <span class="px-2 py-1 text-xs font-semibold text-white bg-primary rounded-full">
                                        {{ $paper->exam_year }}
                                    </span>
                                </div>
                                <a href="{{ Storage::url($paper->file_path) }}" target="_blank"
                                    class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-orange-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    View / Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $papers->links() }}
            </div>
            @else
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-alt text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Past Papers Found</h3>
                <p class="text-gray-500">Try adjusting your search or filter criteria.</p>
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
                Need Help Preparing?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Contact our academic team for guidance on your studies.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Contact Us <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('courses') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    View Courses
                </a>
            </div>
        </div>
    </section>
</main>
