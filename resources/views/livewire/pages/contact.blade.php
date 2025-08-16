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
            <div
              class="flex items-center justify-center w-16 h-16 mb-6 text-white bg-gradient-to-r from-orange-500 to-amber-400 rounded-2xl">
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
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-orange-500 bg-orange-100 rounded-full">
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
                  <p class="mt-1 text-gray-700">P.O. Box 1716 - 10100, Nyeri, Kenya</p>
                </div>
              </li>

              <li class="flex items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-orange-500 bg-orange-100 rounded-full">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">Phone</p>
                  <a href="tel:+254758660300" class="mt-1 text-orange-600 transition hover:text-orange-800">+254 758 660
                    300</a>
                </div>
              </li>

              <li class="flex items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-orange-500 bg-orange-100 rounded-full">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                  </svg>
                </div>
                <div>
                  <p class="font-medium text-gray-900">Email</p>
                  <a href="mailto:info@tetutvc.ac.ke"
                    class="mt-1 text-orange-600 transition hover:text-orange-800">info@tetutvc.ac.ke</a>
                </div>
              </li>
            </ul>

            <div class="grid grid-cols-4 gap-3 mt-10">
              <a href="https://facebook.com/TetuTechnicalVocationalCollege"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-orange-500 hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
              </a>
              <a href="#"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-orange-500 hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.1 10.1 0 01-3.127 1.184A4.92 4.92 0 0016.77 2a4.93 4.93 0 00-4.926 4.926c0 .386.043.76.126 1.12A13.986 13.986 0 013.477 3.089a4.93 4.93 0 001.523 6.574 4.9 4.9 0 01-2.23-.616v.061a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" />
                </svg>
              </a>
              <a href="#"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-orange-500 hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                </svg>
              </a>
              <a href="#"
                class="flex items-center justify-center p-2 text-gray-500 transition duration-300 bg-gray-100 rounded-full hover:bg-orange-500 hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
              </a>
            </div>
          </div>

          <div class="mt-8 overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl"
            data-aos="fade-up">
            <h3 class="p-4 font-semibold text-gray-800 bg-gray-50">Our Location</h3>
            <div class="overflow-hidden rounded-b-2xl aspect-w-16 aspect-h-12">
              <!-- Replace the src with your actual Google Maps embed URL -->
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.741889650126!2d36.9229375!3d-0.4675625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18285f979e39f6f7%3A0xb54ff3cfd4995fba!2sTetu%20Technical%20and%20Professional%20College!5e0!3m2!1sen!2ske!4v1720950525693!5m2!1sen!2ske"
                height="300" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
                title="Tetu Technical and Professional College location"></iframe>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-7">
          <div class="p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl"
            data-aos="fade-up">
            <div class="flex items-center mb-6">
              <div
                class="flex items-center justify-center w-10 h-10 mr-4 text-white rounded-full bg-gradient-to-r from-orange-500 to-amber-400">
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
                      class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
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
                      class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
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
                    class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
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
                    class="w-full py-3 pl-10 pr-4 transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Please describe how we can help you..." required></textarea>
                </div>
                @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
              </div>

              <div class="flex items-center">
                <input id="privacy-policy" type="checkbox" required
                  class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500">
                <label for="privacy-policy" class="ml-2 text-sm text-gray-600">
                  I agree to the <a href="#" class="text-orange-600 hover:underline">privacy policy</a> and <a href="#"
                    class="text-orange-600 hover:underline">terms of service</a>.
                </label>
              </div>

              <button type="submit" wire:loading.attr="disabled"
                class="flex items-center justify-center w-full px-6 py-3 font-medium text-white transition duration-300 rounded-lg bg-gradient-to-r from-orange-600 to-orange-800 hover:from-orange-700 hover:to-orange-900 focus:outline-none focus:ring-4 focus:ring-orange-300 disabled:opacity-70">
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
    <a href="https://wa.me/254758660300" target="_blank" rel="noopener noreferrer"
      class="flex items-center px-4 py-3 text-white bg-green-500 rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2">

      <!-- WhatsApp Icon (SVG) -->
      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M17.472 14.382c-.297-.149-1.758-.867-2.031-.967s-.47-.149-.668.15-.767.967-.94 1.166-.347.224-.644.075c-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059s-.018-.459.13-.608c.134-.134.298-.347.446-.52.149-.173.198-.298.298-.497.099-.198.05-.373-.025-.521-.075-.149-.668-1.611-.916-2.204-.242-.58-.487-.5-.668-.51l-.57-.01c-.198 0-.52.074-.793.373s-1.04 1.017-1.04 2.479 1.064 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.412.248-.694.248-1.29.173-1.412-.074-.123-.272-.198-.57-.347zM12.002 2C6.475 2 2 6.475 2 12c0 2.115.656 4.074 1.767 5.691L2 22l4.422-1.625A9.956 9.956 0 0012.002 22c5.524 0 10-4.476 10-10s-4.476-10-10-10z" />
      </svg>

      WhatsApp Chat
    </a>
  </div>
  <!-- End WhatsApp Chat Button -->

</main>