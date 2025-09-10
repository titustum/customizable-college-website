<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Download;

new
#[Title('Downloads')] 
class extends Component
{
    public function with()
    {
        $downloads = Download::all()->toArray();

        return [
            'downloads' => $downloads,
        ];
    }
}; ?>

<main class="overflow-hidden">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Tetu TVC Campus"
                class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Downloads</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">
                Access important documents, forms, brochures, and more.
            </p>
        </div>
    </section>

    <!-- Downloads List Section -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Available Files</h2>

            @if (count($downloads))
            <div class="space-y-8 max-w-4xl mx-auto">
                @foreach ($downloads as $download)
                <div class="p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="mb-2 text-xl font-semibold text-gray-800">
                        {{ $download['title'] ?? 'Untitled' }}
                    </h3>

                    @if (!empty($download['description']))
                    <p class="mb-3 text-gray-600">
                        {{ $download['description'] }}
                    </p>
                    @endif

                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            📎 {{ pathinfo($download['file_path'], PATHINFO_EXTENSION) }} file
                        </span>
                        <a href="{{ Storage::url($download['file_path']) }}" download
                            class="text-orange-500 hover:underline text-sm">
                            ⬇️ Download
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-gray-500 mt-10">No files available for download at the moment.</p>
            @endif
        </div>
    </section>
</main>