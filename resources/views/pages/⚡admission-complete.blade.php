<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Application;
use App\Models\Institution;

new
#[Title('Application Received')]
#[Layout('layouts::app')]
class extends Component
{
    public $application;
    public $institution;

    public function mount($id = null)
    {
        $this->institution = Institution::first() ?? (object) ['name' => 'Our College'];

        if ($id) {
            $this->application = Application::find($id);
        }
    }
};
?>

<main class="bg-gray-50 min-h-screen">
    <!-- Hero Section -->
    <section class="relative clip-diagonal grain py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Campus" class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Admissions</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Application Received</h1>
        </div>
    </section>

    <!-- Success Message Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <!-- Success Icon -->
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-4">Thank You for Applying!</h2>
                
                <div class="bg-white rounded-2xl shadow-lg p-8 text-left">
                    <p class="text-lg text-gray-600 mb-6">
                        Your application to <strong>{{ $institution->name }}</strong> has been successfully submitted. 
                        We have received all your details and your application is now under review.
                    </p>

                    @if($application)
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h3 class="font-semibold text-gray-800 mb-3">Application Details</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Application ID:</span>
                                <p class="font-medium text-gray-800">#{{ $application->id }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">Applicant Name:</span>
                                <p class="font-medium text-gray-800">{{ $application->full_name }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">ID Number:</span>
                                <p class="font-medium text-gray-800">{{ $application->id_number }}</p>
                            </div>
                            @if($application->course)
                            <div>
                                <span class="text-gray-500">Course Applied:</span>
                                <p class="font-medium text-gray-800">{{ $application->course->name }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <h3 class="font-semibold text-blue-800 mb-2">What's Next?</h3>
                        <ul class="text-blue-700 text-sm space-y-2">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Your application is being processed
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                You will be contacted when the next intake opens
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Keep your phone number accessible for communication
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:opacity-90 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Back to Home
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
