<?php

use Livewire\Attributes\{Description, Title};
use Livewire\Volt\Component;
use App\Models\Download;

new
#[Title('Downloads')]
#[Description('Explore the various downloads available at Tetu Technical & Vocational College.')]
class extends Component
{
    public array $downloads = [];

    public function mount(): void
    {
        $this->downloads = Download::all()->toArray();
    }

}; ?>

<main>
    <div class="container px-4 py-8 mx-auto min-h-[70vh]">
        <h1 class="mb-6 text-3xl font-bold text-orange-600 dark:text-orange-500">Explore Our Downloads</h1>

        @if (empty($downloads))
        <div class="p-4 text-gray-500 bg-gray-100 rounded-md dark:bg-gray-800 dark:text-gray-400">
            No downloads are currently available. Please check back later.
        </div>
        @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($downloads as $download)
            <div
                class="p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg dark:bg-gray-900 dark:border dark:border-gray-800">
                <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $download['name'] }}</h2>
                @if ($download['description'])
                <p class="mb-4 text-gray-600 dark:text-gray-300">{{ $download['description'] }}</p>
                @else
                <p class="mb-4 text-gray-500 dark:text-gray-400">No description available.</p>
                @endif
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span class="inline-flex items-center ml-2">
                            <i class="mr-1 far fa-file"></i>
                            {{ number_format($download['size'] / 1024, 2) }} KB
                        </span>
                    </div>
                    <a href="{{ asset('storage/' . $download['file']) }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 text-white transition-colors bg-orange-600 rounded-full hover:bg-orange-700 focus:ring focus:ring-orange-300 dark:bg-orange-500 dark:hover:bg-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</main>