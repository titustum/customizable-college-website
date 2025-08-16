<?php

use App\Models\Department;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Departments')] 
class extends Component
{

    public $departments;

    function mount() {
        $this->departments = Department::all();
    }

}; ?>

<main>

    <!-- ======================start department section ============== -->

    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Our Departments</h2>
                <div class="w-24 h-1 mx-auto bg-orange-500 rounded"></div>
                <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">Explore our outstanding academic departments
                    designed to
                    provide industry-relevant skills and knowledge.</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($departments as $department)
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}"
                    class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-lg group hover:shadow-xl">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{  asset('storage/'.$department->photo)  }}" alt="{{ $department->name }}"
                            class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div
                            class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3
                            class="mb-3 text-xl font-bold text-gray-800 transition-colors duration-300 group-hover:text-orange-600">
                            {{ $department->name }}</h3>
                        <p class="mb-5 text-gray-600 line-clamp-3">{{ $department->short_desc }}</p>
                        <div class="pt-2 border-t border-gray-100">
                            <a href="{{ route('department', $department->slug) }}"
                                class="inline-flex items-center font-semibold text-orange-600 transition-colors duration-300 hover:text-orange-700">
                                Explore Department
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="py-16 text-white bg-gradient-to-r from-orange-600 to-orange-500">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <div class="mb-8 text-center md:mb-0 md:text-left" data-aos="fade-right">
                    <h2 class="mb-4 text-3xl font-bold">Ready to Start Your Career in Tetu TVC?</h2>
                    <p class="max-w-xl text-white/90">Take the first step toward your future career. Apply
                        now for
                        our upcoming intake and join our community of successful graduates.</p>
                </div>
                <div class="flex flex-col gap-4 sm:flex-row" data-aos="fade-left">
                    <a href="{{ route('admissions') }}"
                        class="px-6 py-3 font-bold text-center text-orange-600 transition duration-300 bg-white rounded-lg hover:bg-gray-100">
                        Apply Now
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 font-bold text-center text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white/10">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- =================end department ========================== -->

</main>