<?php

use Livewire\Attributes\Title;
use Livewire\Component;
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


    // institution
    public $institution;

    public function mount(): void
    {
        // No caching — fetch directly from the database
        $this->principal = TeamMember::with('role')
            ->whereHas('role', function ($query) {
                $query->where('name', 'Principal');
            })
            ->first();

        $this->academicDepartmentsList = Department::all();

        // College stats and information
        $this->collegeOverview = "$this->institution->name is a leading institution committed to providing high-quality technical and vocational education and training. We equip our students with practical skills and knowledge that are highly relevant to the demands of the modern workforce and contribute to national development.";

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
                    <div class="relative h-full min-h-[300px] md:min-h-[400px] bg-gray-200 flex items-center justify-center">
                        @if ($institution->principal_photo)
                        <img src="{{ asset('storage/'.$institution->principal_photo) }}" alt="{{ $principal->name }}"
                            class="object-cover w-full h-full">
                        @else
                        <div class="text-center">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                            <p class="mt-2 text-gray-500">Photo Coming Soon</p>
                        </div>
                        @endif
                        <div
                            class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent md:hidden">
                            <h2 class="text-2xl font-bold text-white">{{ $principal->name }}</h2>
                            <p class="text-lg text-gray-200">Principal, {{ $institution->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:w-2/3 lg:w-3/4">
                    <div class="hidden md:block">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">{{ $principal->name }}</h2>
                        <p class="mb-2 text-lg text-gray-600">Principal, {{ $institution->name }}</p>
                        @if ($principal->qualifications)
                        <p class="mb-4 italic text-gray-600">{{ $principal->qualifications }}</p>
                        @endif
                    </div>

                    @if ($institution->welcome_message)
                    <div class="mb-6 prose text-gray-700 max-w-none">
                        <p>{{ $institution->welcome_message }}</p>
                    </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="pb-2 mb-4 text-xl font-semibold text-primary border-b border-orange-200">A Message
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $principal->email }}</span>
                        </p>
                        @endif
                        @if ($principal->phone)
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none"
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
                        class="p-6 transition-transform duration-300 transform bg-white border-l-4 border-primary rounded-md shadow-sm hover:-translate-y-1">
                        <h4 class="mb-2 text-lg font-semibold text-primary">{{ $value }}</h4>
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
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Departments</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($academicDepartmentsList as $department)
                    <div
                        class="p-6 transition-all duration-300 bg-white border-t-4 border-primary rounded-md shadow-sm hover:shadow-md group">
                        <div class="flex items-start">
                            <!-- Department icon would ideally come from DB, using placeholder here -->
                            <div
                                class="flex items-center justify-center w-12 h-12 mr-4 text-white bg-primary rounded-full">
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
                                    class="inline-block px-2 py-1 mt-2 text-xs text-primary bg-orange-100 rounded-full">
                                    {{ $department->programs_count }} Programs
                                </span>
                                @endif

                                <div class="mt-3">
                                    <a href="{{ $department->type === 'academic' ? route('academic.department', $department->slug) : route('non.academic.department', $department->slug) }}"
                                        class="inline-flex items-center text-sm font-medium text-primary transition-all duration-300 group-hover:text-primary">
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
                                class="flex items-center justify-center flex-shrink-0 w-6 h-6 mt-1 mr-3 text-white bg-primary rounded-full">
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




    {{-- ═══════════════════════════════════════════
    CTA BANNER
    ═══════════════════════════════════════════ --}}
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Ready to Start Your <span class="text-primary">Career?</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Take the first step toward your future career. Apply now for our upcoming intake and join our community of successful graduates.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
