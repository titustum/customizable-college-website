<?php

use Livewire\Component;
use Livewire\Attributes\Title;


new
#[Title('Admissions Complete')]
 class extends Component {

    public $id;

    public function mount($id) {
        $this->id = $id;
    }

}; ?>


<section class="py-16 bg-gray-50 min-h-[70vh] flex items-center">
    <div class="max-w-xl mx-auto text-center px-4">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Application Submitted!</h1>

        <p class="text-gray-700 mb-6">
            Thanks for applying to <strong>{{ $institution->name }}</strong>. Download your admission letter below.
        </p>

        <a href="{{ route('admissions.download', ['id' => $id]) }}"
            class="inline-flex items-center bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold shadow-md">
            <i class="fas fa-download mr-2"></i> Download Admission Letter
        </a>

        <p class="mt-8 text-gray-600 text-sm">
            When the college reopens for your term, just bring your admission letter — you’re automatically accepted.
        </p>

        <p class="mt-4 text-gray-600 text-sm">
            Questions? Contact admissions:
            <a href="mailto:{{ $institution->email }}" class="text-primary underline">{{ $institution->email }}</a> |
            <a href="tel:{{ $institution->phone }}" class="text-primary underline">{{ $institution->phone }}</a>
        </p>
    </div>
</section>
