<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Contact;

new
#[Title('Contact Us')] 
class extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $successMessage = '';
    public $loading = false;

    public function submitForm()
    {
        $this->loading = true;
        
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
        ]);

        Contact::create($validatedData);

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->successMessage = 'Thank you! Your message has been sent successfully.';
        $this->loading = false;
    }
};

?>

<main>
  <!-- =============start contact================ -->
  <section class="w-full px-4 py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="mx-auto max-w-7xl">
      <div class="mb-12 text-center">
        <h2 class="mb-2 text-4xl font-bold text-gray-800">Get in Touch</h2>
        <p class="max-w-2xl mx-auto text-gray-600">We'd love to hear from you. Fill out the form below and we'll get
          back to you as soon as possible.</p>
      </div>

      <div class="grid gap-10 lg:grid-cols-12">
        <!-- Contact Information -->
        <div class="lg:col-span-5">
          <div class="p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl"
            data-aos="fade-up">
            <div class="flex items-center justify-center w-16 h-16 mb-6 text-white bg-primary rounded-2xl">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
              </svg>
            </div>
            <h3 class="mb-8 text-2xl font-semibold text-gray-800">Contact Information</h3>

            <ul class="space-y-6">
              <li class="flex items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-primary bg-orange-100 rounded-full">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">Address</p>
                  <p class="mt-1 text-gray-700">{{ $institution->address }}</p>
                </div>
              </li>

              <li class="flex items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-primary bg-orange-100 rounded-full">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">Phone</p>
                  <a href="tel:{{ $institution->phone }}" class="mt-1 text-primary transition">{{ $institution->phone }}
                    300</a>
                </div>
              </li>

              <li class="flex items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-primary bg-orange-100 rounded-full">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">Email</p>
                  <a href="mailto:{{ $institution->email }}" class="mt-1 text-primary transition">{{ $institution->email
                    }}</a>
                </div>
              </li>
            </ul>

            <div class="grid grid-cols-4 gap-3 mt-10">
              <a href="{{ $institution->facebook }}"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-primary hover:text-white"
                target="_blank">
                <i class="fab fa-facebook-f text-lg"></i>
              </a>
              <a href="{{ $institution->twitter ?? '#' }}"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-primary hover:text-white"
                target="_blank">
                <i class="fab fa-x-twitter text-lg"></i> {{-- Use 'fa-twitter' for old icon --}}
              </a>
              <a href="{{ $institution->instagram ?? '#' }}"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-primary hover:text-white"
                target="_blank">
                <i class="fab fa-instagram text-lg"></i>
              </a>
              <a href="{{ $institution->linkedin ?? '#' }}"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-primary hover:text-white"
                target="_blank">
                <i class="fab fa-linkedin-in text-lg"></i>
              </a>
            </div>


          </div>

          <div class="mt-8 overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl"
            data-aos="fade-up">
            <h3 class="p-4 font-semibold text-gray-800 bg-gray-50">Our Location</h3>
            <div class="overflow-hidden rounded-b-2xl aspect-w-16 aspect-h-12">
              <!-- Replace the src with your actual Google Maps embed URL -->

              @if ($institution->latitude && $institution->longitude)
              <iframe
                src="https://www.google.com/maps?q={{ $institution->latitude }},{{ $institution->longitude }}&hl=en&z=14&output=embed"
                height="300" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
                title="{{ $institution->name }} location">
              </iframe>
              @else
              <p class="text-gray-500">Location not available.</p>
              @endif

            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-7">
          <div class="p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl"
            data-aos="fade-up">
            <div class="flex items-center mb-6">
              <div class="flex items-center justify-center w-10 h-10 mr-4 text-white rounded-full bg-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                  </path>
                </svg>
              </div>
              <h3 class="text-2xl font-semibold text-gray-800">Send us a message</h3>
            </div>

            @if($successMessage)
            <div class="flex items-center p-4 mb-6 text-green-700 border border-green-200 rounded-lg bg-green-50"
              role="alert">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              {{ $successMessage }}
            </div>
            @endif

            <form wire:submit.prevent="submitForm" class="space-y-6">
              <div class="grid gap-6 md:grid-cols-2">
                <div>
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Full Name <span
                      class="text-red-500">*</span></label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    </div>
                    <input type="text" id="name" wire:model="name"
                      class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                      placeholder="John Doe" required>
                  </div>
                  @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email Address <span
                      class="text-red-500">*</span></label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                      </svg>
                    </div>
                    <input type="email" id="email" wire:model="email"
                      class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                      placeholder="your@email.com" required>
                  </div>
                  @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
              </div>

              <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">Subject <span
                    class="text-red-500">*</span></label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                    </svg>
                  </div>
                  <input type="text" id="subject" wire:model="subject"
                    class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                    placeholder="How can we help you?" required>
                </div>
                @error('subject') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
              </div>

              <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Message <span
                    class="text-red-500">*</span></label>
                <div class="relative">
                  <div class="absolute text-gray-400 pointer-events-none top-3 left-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                      </path>
                    </svg>
                  </div>
                  <textarea id="message" wire:model="message" rows="5"
                    class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                    placeholder="Please describe how we can help you..." required></textarea>
                </div>
                @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
              </div>

              <div class="flex items-center">
                <input id="privacy-policy" type="checkbox" required
                  class="w-4 h-4 text-primary bg-gray-800 border-gray-300 rounded focus:ring-primary">
                <label for="privacy-policy" class="ml-2 text-sm text-gray-600">
                  I agree to the <a href="{{ route('privacy.policy') }}" class="text-primary hover:underline">privacy
                    policy</a> and <a href="{{ route('terms.conditions') }}" class="text-primary hover:underline">terms
                    of service</a>.
                </label>
              </div>

              <button type="submit" wire:loading.attr="disabled"
                class="flex items-center justify-center w-full px-6 py-3 font-medium text-white transition duration-300 rounded-lg bg-primary hover:opacity-80 disabled:opacity-70">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading>
                  <svg class="w-5 h-5 mr-2 -ml-1 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                  </svg>
                  Processing...
                </span>
              </button>

              <p class="text-xs text-center text-gray-500">
                We'll get back to you within 24-48 business hours.
              </p>
            </form>
          </div>
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="mt-16" data-aos="fade-up">
        <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Frequently Asked Questions</h2>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="mb-3 text-lg font-semibold text-gray-800">How can I apply for admission?</h3>
            <p class="text-gray-600">Visit our Admissions page for detailed information on application requirements and
              deadlines. You can also contact our admissions office directly.</p>
          </div>
          <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="mb-3 text-lg font-semibold text-gray-800">What programs do you offer?</h3>
            <p class="text-gray-600">We offer various technical and professional courses. Browse our Programs page for a
              complete list of available courses and their descriptions.</p>
          </div>
          <div class="p-6 bg-white shadow-md rounded-xl">
            <h3 class="mb-3 text-lg font-semibold text-gray-800">How can I schedule a campus tour?</h3>
            <p class="text-gray-600">To schedule a campus tour, please fill out the contact form or call our office. We
              offer individual and group tours throughout the academic year.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =============end contact================ -->

  <!-- WhatsApp Chat Button -->
  <div class="fixed z-50 bottom-6 right-6">
    <a href="https://wa.me/{{ $institution->phone }}" target="_blank" rel="noopener noreferrer"
      class="flex items-center space-x-2 px-4 py-3 text-white bg-green-800 rounded-full shadow-lg hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2">
      <!-- WhatsApp Icon (SVG) -->
      <i class="fab fa-whatsapp fa-2x"></i>
      Chat
    </a>
  </div>
  <!-- End WhatsApp Chat Button -->

</main>