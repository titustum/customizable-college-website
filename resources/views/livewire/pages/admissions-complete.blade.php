<?php

use Livewire\Volt\Component;


new
#[Title('Admissions Complete | Tetu Technical & Vocational College')]
 class extends Component {
    //
}; ?>

<section class="py-16">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Application Submitted!</h1>
        <p class="text-gray-700 mb-6">Thank you for applying. You can now download your admission letter.</p>

        <a href="{{ route('admissions.download', ['id' => $id]) }}"
            class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold">
            <i class="fas fa-download mr-2"></i>Download Admission Letter (PDF)
        </a>
    </div>
</section>