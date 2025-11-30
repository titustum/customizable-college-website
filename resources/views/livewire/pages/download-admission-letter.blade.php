<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Title;


new
#[Title('Download Admission Letter')]
 class extends Component { 
    public $institution;

    public function mount()
    { 
        $this->institution = \App\Models\Institution::first() // Assuming a single institution for simplicity
            ?? new \App\Models\Institution([
                    'name' => 'Institution Name',
                    'email' => 'info@example.com',
                    'phone' => '000-000-0000',
                ]);
    }
    
}; ?>


<section class="py-16 bg-gray-50 min-h-[70vh] flex items-center">
    <div class="max-w-xl mx-auto text-center px-4">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Get your admission today!</h1>

        <p class="text-gray-700 mb-6">
            Thanks for your interest to join us at
            <strong>{{ $institution->name ?? '' }}</strong>.<br>
            Download and fill the admission letter below.
        </p>

        <a href="{{ asset('admission-letter.pdf') }}" download
            class="inline-flex items-center bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold shadow-md">
            <i class="fas fa-download mr-2"></i> Download Admission Letter
        </a>

        <p class="mt-8 text-gray-600 text-sm">
            When the college reopens for your term, bring your admission letter — you're automatically accepted.
        </p>

        <p class="mt-4 text-gray-600 text-sm">
            Questions? Contact admissions:
            <a href="mailto:{{ $institution->email }}" class="text-primary underline">{{ $institution->email }}</a> |
            <a href="tel:{{ $institution->phone }}" class="text-primary underline">{{ $institution->phone }}</a>
        </p>
    </div>
</section>