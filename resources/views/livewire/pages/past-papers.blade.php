<?php

use App\Models\PastPaper;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

new 
#[Title('Past Papers | Tetu Technical & Vocational College')] 
class extends Component
{
    use WithPagination;

    public string $search = '';

    public function with()
    {
        $papers = PastPaper::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('unit_name', 'like', '%' . $this->search . '%')
                      ->orWhere('exam_year', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return [
            'papers' => $papers,
        ];
    }
};
?>


<main class="overflow-hidden">
    <!-- Hero Section -->
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

            <!-- Search Bar -->
            <div class="max-w-md mx-auto mb-10">
                <input type="text" wire:model.debounce.300ms="search" placeholder="Search by title, unit or year..."
                    class="w-full px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-orange-500 focus:border-orange-500" />
            </div>

            <!-- Past Papers List -->
            @if ($papers->count())
            <div class="space-y-8">
                @foreach ($papers as $paper)
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="mb-2 text-2xl font-semibold text-gray-800">{{ $paper->title }}</h3>
                    <p class="mb-1 text-sm text-gray-600">
                        <strong>Unit:</strong> {{ $paper->unit_name }} |
                        <strong>Type:</strong> {{ ucfirst($paper->exam_type) }} |
                        <strong>Year:</strong> {{ $paper->exam_year }}
                    </p>
                    <a href="{{ Storage::url($paper->file_path) }}" target="_blank"
                        class="text-orange-500 hover:underline mt-2 inline-block">
                        📄 Download Paper
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $papers->links() }}
            </div>
            @else
            <div class="text-center text-gray-500 mt-12">
                No past papers found matching your search.
            </div>
            @endif
        </div>
    </section>
</main>