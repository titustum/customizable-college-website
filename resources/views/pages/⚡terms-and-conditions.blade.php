<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Terms and Conditions | Tetu Technical & Vocational College')]
class extends Component
{
    //
};
?>

<main class="overflow-hidden">
    <!-- Hero Section with Parallax Effect -->
    <section class="relative py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Tetu TVC Campus"
                class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Terms and Conditions</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">
                Our terms and conditions for Tetu Technical and Vocational College
            </p>
        </div>
    </section>

    <!-- Terms and Conditions Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 md:px-8">


            <div class="space-y-10 text-gray-800 leading-relaxed">
                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-information-circle class="mr-2 text-black"/>1. Accuracy of Information
                    </h3>
                    <p>Applicants must ensure that all details provided in the application form are complete and
                        accurate.
                        Providing false or misleading information may lead to disqualification or cancellation of
                        admission.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-book class="mr-2 text-black"/>2. Course Availability
                    </h3>
                    <p>Courses are offered based on availability and demand. The college reserves the right to modify,
                        suspend, or cancel any course or program without prior notice.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-checkmark-circle class="mr-2 text-black"/>3. Admission Requirements
                    </h3>
                    <p>Admission into a program is conditional upon meeting all entry requirements. These may include
                        academic
                        qualifications, age limits, or other criteria outlined by the institution or TVET Authority.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-calendar class="mr-2 text-black"/>4. Term Selection
                    </h3>
                    <p>Applicants must choose a valid and available intake term. Term availability may change depending
                        on
                        academic scheduling or institutional capacity.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-card class="mr-2 text-black"/>5. Fee Payment
                    </h3>
                    <p>All admitted students are required to pay the necessary fees by the stated deadlines. Failure to
                        do so
                        may result in withdrawal of the admission offer or suspension of studies.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-shield-checkmark class="mr-2 text-black"/>6. Privacy and Data Protection
                    </h3>
                    <p>All personal data collected during the application process will be used solely for admissions
                        processing and institutional communication. We are committed to safeguarding your data in
                        compliance
                        with data protection guidelines.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-hand-right class="mr-2 text-black"/>7. Consent
                    </h3>
                    <p>By submitting your application, you agree to abide by the rules, regulations, and policies of
                        Tetu
                        Technical & Vocational College. You also give consent for the institution to process and verify
                        your
                        information where necessary.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-black mb-2">
                        <x-ionicon-sync class="mr-2 text-black"/>8. Policy Changes
                    </h3>
                    <p>The college reserves the right to update or revise these terms and conditions at any time.
                        Changes will
                        be posted on the official website and will take effect immediately.</p>
                </div>
            </div>
        </div>
    </section>


</main>
