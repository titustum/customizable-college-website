<?php

use App\Models\Vacancy;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

new 
#[Title('Vacancies | Tetu Technical & Vocational College')]
class extends Component
{
    use WithPagination;

    public string $search = '';

    public function with()
    {
        $vacancies = Vacancy::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('type', 'like', '%' . $this->search . '%')
                      ->orWhereHas('department', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            })
            ->latest()
            ->paginate(10);

        return [
            'vacancies' => $vacancies,
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
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Work at Tetu TVC</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">
                Join our team and make a difference in the lives of our students.
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Current Vacancies</h2>

            <!-- Search Bar -->
            <div class="max-w-md mx-auto mb-10">
                <input type="text" wire:model.debounce.300ms="search"
                    placeholder="Search by title, department or type..."
                    class="w-full px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-orange-500 focus:border-orange-500" />
            </div>

            <!-- Vacancies List -->
            @if ($vacancies->count())
            <div class="space-y-8">
                @foreach ($vacancies as $vacancy)
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="mb-2 text-2xl font-semibold text-gray-800">{{ $vacancy->title }}</h3>

                    <p class="mb-2 text-sm text-gray-600">
                        <strong>Department:</strong> {{ $vacancy->department->name ?? 'General' }} |
                        <strong>Type:</strong> {{ ucfirst($vacancy->type) }}
                    </p>

                    <p class="mb-4 text-gray-700">
                        {{ Str::limit(strip_tags($vacancy->description), 150, '...') }}
                    </p>

                    <a href="#" class="text-orange-500 hover:underline">
                        📄 Read More & Apply
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $vacancies->links() }}
            </div>
            @else
            <div class="text-center text-gray-500 mt-12">
                No vacancies found matching your search.
            </div>
            @endif
        </div>
    </section>
</main>