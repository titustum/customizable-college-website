<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Department;
use App\Models\SuccessStory;


new
#[Title('Department')] 
class extends Component
{
    public $department;
    public $departments = [];
    public $successStories = [];

    public function mount($slug)
    {
        $this->departments = Department::all();
        $this->department = Department::where('slug', $slug)->firstOrFail();
        $this->successStories = SuccessStory::all();   
    } 

};
?>

<section class="min-h-screen text-gray-800 bg-gray-50">

    <header class="relative">
        <!-- Banner Image -->
        <div class="h-96 md:h-[500px] w-full overflow-hidden">
            <img src="{{  asset('storage/'.$department->banner_pic)  }}" alt="{{ $department->name }} Banner"
                class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <!-- Department Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12">
            <div class="container mx-auto">
                <div class="inline-block px-4 py-1 mb-3 text-sm font-semibold text-white bg-orange-500 rounded-full">
                    Department
                </div>
                <h1 class="mb-2 text-3xl font-bold text-white md:text-5xl">{{ $department->name }}</h1>
                <p class="max-w-3xl text-lg md:text-xl text-white/90">{{ $department->short_desc }}</p>
            </div>
        </div>
    </header>

    <main>
        <!-- Department Overview Section -->
        <section class="py-16 bg-white">
            <div class="container px-4 mx-auto">


                <div class="p-6 prose prose-lg max-w-none" data-aos="fade-up">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="md:col-span-2">

                            <h2 class="mb-6 text-3xl font-bold">Department Overview</h2>
                            <p class="mb-4 text-gray-600">{{ $department->full_desc }}</p>

                            <div class="grid grid-cols-1 gap-6 my-12 md:grid-cols-3">
                                <div class="p-6 text-center rounded-lg bg-orange-50">
                                    <span class="block mb-2 text-3xl font-bold text-orange-600">
                                        {{ count($department->courses) }}</span>
                                    <span class="text-gray-600">Courses Offered</span>
                                </div>
                                <div class="p-6 text-center rounded-lg bg-blue-50">
                                    <span class="block mb-2 text-3xl font-bold text-blue-600">{{
                                        count($department->teamMembers) ?? 0
                                        }}</span>
                                    <span class="text-gray-600">Expert Trainers</span>
                                </div>
                                <div class="p-6 text-center rounded-lg bg-green-50">
                                    <span class="block mb-2 text-3xl font-bold text-green-600">{{ random_int(94,99)
                                        }}%</span>
                                    <span class="text-gray-600">Graduation Rate</span>
                                </div>
                            </div>




                            <h3 class="mb-4 text-2xl font-bold">Practical Learning Environment</h3>
                            <div class="mb-8">
                                <p class="mt-4">
                                    Our {{ $department->name }} department emphasizes hands-on learning through
                                    real-world simulations and practical sessions. Students actively engage with modern
                                    tools and equipment under the guidance of experienced instructors, preparing them
                                    for success in their respective fields.
                                </p>
                            </div>


                            <!-- Industry connections -->
                            <h3 class="mb-4 text-2xl font-bold">Industry Connections</h3>
                            <p>Our program maintains strong relationships with industry leaders, providing students with
                                internship opportunities, job placement assistance, and insights into current industry
                                trends and practices.</p>


                        </div>

                        <div>
                            @if($department->photo)
                            <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }} Photo"
                                class="w-full mb-4 rounded-lg shadow-md">
                            @endif

                            <div class="p-4 bg-orange-100 rounded-lg">
                                <h3 class="mb-2 text-xl font-semibold text-orange-600">Quick Facts</h3>
                                <p class="text-gray-700">{{ $department->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- Courses Section -->

        <section class="py-8 bg-gray-50">
            <div class="container px-4 mx-auto">

                <div class="mb-8 overflow-hidden bg-white rounded-lg shadow-xl">
                    <div class="p-6">
                        <h2 class="mb-6 text-2xl font-semibold text-gray-800">Courses Offered</h2>


                        <div class="mb-12 overflow-x-auto">
                            <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                                <thead class="text-white bg-orange-600">
                                    <tr>
                                        <th class="px-2 py-2 text-left sm:px-4 sm:py-3">Course</th>
                                        <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 sm:table-cell">
                                            Requirements</th>
                                        <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Duration
                                        </th>
                                        <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Exam Body
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($department->courses as $course)
                                    <tr class="border-b">
                                        <td class="px-2 py-2 sm:px-4 sm:py-3">
                                            <div class="font-medium">{{$course->name}}</div>
                                            <div class="text-sm text-gray-500 sm:hidden">{{$course->requirement}}</div>
                                            <div class="text-sm text-gray-500 sm:hidden md:hidden">{{$course->duration}}
                                                | {{$course->exam_body}}</div>
                                        </td>
                                        <td class="hidden px-2 py-2 sm:px-4 sm:py-3 sm:table-cell">
                                            {{$course->requirement}}</td>
                                        <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{$course->duration}}
                                        </td>
                                        <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">
                                            {{$course->exam_body}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </section>

        <!-- Trainers Section -->
        <section class="py-16 bg-white">
            <div class="container px-4 mx-auto">
                <div class="mb-12 text-center" data-aos="fade-up">
                    <h2 class="text-3xl font-bold">Meet Our Trainers</h2>
                    <div class="w-24 h-1 mx-auto mt-4 bg-orange-500 rounded"></div>
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600">
                        Learn from industry experts with extensive professional experience and a passion for
                        teaching.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($department->teamMembers as $trainer)
                    <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative inline-block mb-4">
                            <div class="w-48 h-48 mx-auto overflow-hidden rounded-full shadow-md">
                                <img src="{{ asset('storage/'.$trainer->photo) }}" alt="{{ $trainer->name }}"
                                    class="object-cover w-full h-full">
                            </div>
                            <div
                                class="absolute px-3 py-1 text-xs font-semibold text-white transform -translate-x-1/2 bg-orange-500 rounded-full -bottom-2 left-1/2">
                                {{ $trainer->years_of_experience }} Years Exp.
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">{{ $trainer->name }}</h3>
                        <p class="mb-2 text-orange-500">{{ $trainer->role->name }}</p>
                        <p class="text-sm text-gray-600 ">{{ $trainer->qualification }}</p>
                        {{-- <p class="mb-3 text-sm text-blue-600">{{ $trainer->email }}</p> --}}
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Student Success Stories Carousel -->
        <section class="py-16 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="mb-12 text-center" data-aos="fade-up">
                    <h2 class="text-3xl font-bold">Student Success Stories</h2>
                    <div class="w-24 h-1 mx-auto mt-4 bg-orange-500 rounded"></div>
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600">
                        See how our graduates have transformed their careers after completing our programs.
                    </p>
                </div>

                <div class="testimonial-slider" data-aos="fade-up">
                    <!-- Slider will be initialized with JavaScript -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Sample testimonials - in production, these would come from your database -->

                            @foreach ($successStories as $story)

                            <div class="swiper-slide">
                                <div class="p-6 bg-white rounded-lg shadow-md">
                                    <div class="flex items-center mb-4">
                                        <div class="w-16 h-16 mr-4 overflow-hidden rounded-full">
                                            <img src="{{ asset('storage/'.$story->photo) }}"
                                                alt="{{ $story->name }} Photo" class="object-cover w-full h-full">
                                        </div>
                                        <div>
                                            <h4 class="font-bold">{{ $story->name }}</h4>
                                            <p class="text-sm text-gray-600">Class of {{ $story->year }}, Now at
                                                {{
                                                $story->company}}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="italic text-gray-600">"{{ $story->statement }}"</p>
                                </div>
                            </div>

                            @endforeach
                        </div>

                        <!-- Slider controls -->
                        <div class="mt-6 swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 text-white bg-gradient-to-r from-orange-600 to-orange-500">
            <div class="container px-4 mx-auto">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <div class="mb-8 text-center md:mb-0 md:text-left" data-aos="fade-right">
                        <h2 class="mb-4 text-3xl font-bold">Ready to Start Your Career in {{ $department->name
                            }}?</h2>
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

    </main>

    <!-- JavaScript for interactive elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
    <script>
        // Initialize AOS animation library
    AOS.init({
      once: true,
      duration: 800,
      offset: 100,
    });
    
    // Initialize testimonial slider
    document.addEventListener('DOMContentLoaded', function() {
      new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 5000,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          }
        }
      });
    });
     
    </script>

</section>