<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\TeamMember;
use App\Models\Department;

new
#[Title('Principal\'s Office')] 
class extends Component
{
    public $principal;
    public $headsOfDepartments = []; 
    public $collegeOverview;
    public $ourValues = [];
    public $academicDepartmentsList = [];
    public $studentPopulation;
    public $keyAchievementsList = [];
    public $principalMessage;
    public $totalStudents;
    public $totalCourses;
    public $yearEstablished;

    public function mount(): void
    {
        // No caching — fetch directly from the database
        $this->principal = TeamMember::with('role')
            ->whereHas('role', function ($query) {
                $query->where('name', 'Principal');
            })
            ->first();
        


        // $this->principal->email = "info@tetutvc.ac.ke";
    

         
        $this->academicDepartmentsList = Department::all();

        // College stats and information
        $this->collegeOverview = "Tetu Technical and Vocational College (Tetu TVC) is a leading institution committed to providing high-quality technical and vocational education and training. We equip our students with practical skills and knowledge that are highly relevant to the demands of the modern workforce and contribute to national development.";
        
        $this->ourValues = [
            'Excellence' => 'Striving for the highest standards in education and training',
            'Innovation' => 'Embracing new ideas and technologies to improve learning outcomes',
            'Integrity' => 'Maintaining ethical standards and accountability in all endeavors',
            'Collaboration' => 'Working with industry partners and stakeholders for mutual success',
            'Relevance' => 'Ensuring our programs meet current industry needs and standards'
        ];
         
        
        $this->keyAchievementsList = [
            'Student population increase to over 1800, with a diverse range of courses',
            'Successful accreditation by relevant TVET bodies for all our technical programs',
            'Strategic partnerships with over 25 industry leaders ensuring internship placements for all students',
            '92% graduate employability rate in technical fields within six months of graduation',
            'National champions in 3 categories at the Kenya Music and Drama Festivals 2024', 
            'Attained National TVET Excellence Award for Best Technical College in 2024', 
        ];
        
        $this->principalMessage = "Welcome to Tetu Technical and Vocational College! We are dedicated to empowering our students with the technical competencies and entrepreneurial spirit needed to excel in their chosen careers. Our focus on practical, hands-on training ensures that our graduates are job-ready and can make a significant impact on the Kenyan economy. At Tetu TVC, we believe in learning by doing and providing real-world experiences that translate directly to workplace success. We invite you to explore the opportunities available at our institution and join our community of skilled professionals who are building Kenya's future.";
    }
}
?>


<div class="bg-gray-100">
    <div class="container px-4 py-16 mx-auto">


        <!-- Principal Section with improved layout -->
        <section class="mb-12 overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                @if ($principal)
                <div class="md:w-1/3 lg:w-1/4">
                    <div class="relative h-full">
                        <img src="{{ asset('storage/'.$principal->photo) }}" alt="{{ $principal->name }}"
                            class="object-cover w-full h-full"
                            onerror="this.src='{{ asset('images/placeholder-profile.jpg') }}'">
                        <div
                            class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent md:hidden">
                            <h2 class="text-2xl font-bold text-white">{{ $principal->name }}</h2>
                            <p class="text-lg text-gray-200">Principal, Tetu TVC</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:w-2/3 lg:w-3/4">
                    <div class="hidden md:block">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">{{ $principal->name }}</h2>
                        <p class="mb-2 text-lg text-gray-600">Principal, Tetu TVC</p>
                        @if ($principal->qualifications)
                        <p class="mb-4 italic text-gray-600">{{ $principal->qualifications }}</p>
                        @endif
                    </div>

                    @if ($principal->biography)
                    <div class="mb-6 prose text-gray-700 max-w-none">
                        <p>{{ $principal->biography }}</p>
                    </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="pb-2 mb-4 text-xl font-semibold text-orange-600 border-b border-orange-200">A Message
                            from the Principal</h3>
                        <div class="prose text-gray-700 max-w-none">
                            <p>{{ $principalMessage }}</p>
                        </div>
                    </div>

                    @if ($principal->email || $principal->phone)
                    <div class="p-4 mt-6 rounded-lg bg-gray-50">
                        <h4 class="mb-2 text-lg font-medium text-gray-800">Contact us</h4>
                        @if ($principal->email)
                        <p class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-orange-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $principal->email }}</span>
                        </p>
                        @endif
                        @if ($principal->phone)
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-orange-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $principal->phone }}</span>
                        </p>
                        @endif
                    </div>
                    @endif

                </div>
                @else
                <div class="w-full p-8 text-center">
                    <div class="p-12 rounded-lg bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-gray-500">Principal's information not available at this time.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>


        <!-- Core Values Section - Enhanced with descriptions -->
        @if (!empty($ourValues))
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Our Core Values</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($ourValues as $value => $description)
                    <div
                        class="p-6 transition-transform duration-300 transform bg-white border-l-4 border-orange-500 rounded-md shadow-sm hover:-translate-y-1">
                        <h4 class="mb-2 text-lg font-semibold text-orange-700">{{ $value }}</h4>
                        <p class="text-sm text-gray-600">{{ $description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Academic Departments Section - Enhanced with icons -->
        @if ($academicDepartmentsList->isNotEmpty())
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Academic Departments</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($academicDepartmentsList as $department)
                    <div
                        class="p-6 transition-all duration-300 bg-white border-t-4 border-orange-500 rounded-md shadow-sm hover:shadow-md group">
                        <div class="flex items-start">
                            <!-- Department icon would ideally come from DB, using placeholder here -->
                            <div
                                class="flex items-center justify-center w-12 h-12 mr-4 text-white bg-orange-500 rounded-full">
                                <!-- Default icon, ideally would be dynamic based on department type -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $department->name }}</h4>
                                <p class="mt-1 text-sm text-gray-600">{{ $department->description ?? 'Explore the
                                    programs offered within this department.' }}</p>

                                <!-- Program count badge - if you have this data -->
                                @if(isset($department->programs_count))
                                <span
                                    class="inline-block px-2 py-1 mt-2 text-xs text-orange-700 bg-orange-100 rounded-full">
                                    {{ $department->programs_count }} Programs
                                </span>
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('department', $department->slug) }}"
                                        class="inline-flex items-center text-sm font-medium text-orange-600 transition-all duration-300 group-hover:text-orange-700">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Key Achievements Section - Enhanced with design -->
        @if (!empty($keyAchievementsList))
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Key Achievements</h2>
                <div class="p-6 rounded-lg bg-orange-50">
                    <ul class="space-y-4">
                        @foreach ($keyAchievementsList as $achievement)
                        <li class="flex items-start">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-6 h-6 mt-1 mr-3 text-white bg-orange-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-700">{{ $achievement }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        @endif

    </div>




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
    <!-- End CTA Section -->
</div>