<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\TeamMember;
use App\Models\Department;
use App\Models\Course;

new
#[Title("Deputy Principal Academics")]
class extends Component
{
    public $deputyAcademics;
    public $academicDepartmentsList = [];
    public $coursesList = [];
    public $institution;

    public function mount(): void
    {
        $this->deputyAcademics = TeamMember::with('role')
            ->whereHas('role', function ($query) {
                $query->where('name', 'Deputy Principal');
            })
            ->where('section_assigned', 'Academics')
            ->first();

        $this->academicDepartmentsList = Department::where('type', 'academic')->get();
        $this->coursesList = Course::with('department')->take(6)->get();
    }
}
?>

<div class="bg-gray-100">
    <div class="container px-4 py-16 mx-auto">
        <section class="mb-12 overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                @if ($deputyAcademics)
                <div class="md:w-1/3 lg:w-1/4">
                    <div class="relative h-full min-h-[300px] md:min-h-[400px] bg-gray-200 flex items-center justify-center">
                        @if ($deputyAcademics->photo)
                        <img src="{{ asset('storage/'.$deputyAcademics->photo) }}" 
                            alt="{{ $deputyAcademics->name }}"
                            class="object-cover w-full h-full">
                        @else
                        <div class="text-center">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                            <p class="mt-2 text-gray-500">Photo Coming Soon</p>
                        </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent md:hidden">
                            <h2 class="text-2xl font-bold text-white">{{ $deputyAcademics->name }}</h2>
                            <p class="text-lg text-gray-200">Deputy Principal - Academics</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:w-2/3 lg:w-3/4">
                    <div class="hidden md:block">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">{{ $deputyAcademics->name }}</h2>
                        <p class="mb-2 text-lg text-gray-600">Deputy Principal - Academics</p>
                        @if ($deputyAcademics->qualification)
                        <p class="mb-4 italic text-gray-600">{{ $deputyAcademics->qualifications }}</p>
                        @endif
                    </div>

                    @if ($deputyAcademics->bio)
                    <div class="mb-6 prose text-gray-700 max-w-none">
                        <p>{{ $deputyAcademics->bio }}</p>
                    </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="pb-2 mb-4 text-xl font-semibold text-primary border-b border-orange-200">A Message from Deputy Principal - Academics</h3>
                        <div class="prose text-gray-700 max-w-none">
                            <p>Welcome to the Academics Office. Our department is committed to maintaining high academic standards, curriculum delivery, and quality assurance. We ensure our students receive the best technical and vocational education aligned with industry needs.</p>
                        </div>
                    </div>

                    @if ($deputyAcademics->email || $deputyAcademics->phone)
                    <div class="p-4 mt-6 rounded-lg bg-gray-50">
                        <h4 class="mb-2 text-lg font-medium text-gray-800">Contact us</h4>
                        @if ($deputyAcademics->email)
                        <p class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $deputyAcademics->email }}</span>
                        </p>
                        @endif
                        @if ($deputyAcademics->phone)
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $deputyAcademics->phone }}</span>
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
                @else
                <div class="w-full p-8 text-center">
                    <div class="p-12 rounded-lg bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-gray-500">Deputy Principal Academics' information not available at this time.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>

        @if ($academicDepartmentsList->isNotEmpty())
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Academic Departments</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($academicDepartmentsList as $department)
                    <div class="p-6 transition-all duration-300 bg-white border-t-4 border-primary rounded-md shadow-sm hover:shadow-md group">
                        <div class="flex items-start">
                            <div class="flex items-center justify-center w-12 h-12 mr-4 text-white bg-primary rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $department->name }}</h4>
                                <p class="mt-1 text-sm text-gray-600">{{ $department->description ?? 'Explore the programs offered within this department.' }}</p>
                                <div class="mt-3">
                                    <a href="{{ route('academic.department', $department->slug) }}" class="inline-flex items-center text-sm font-medium text-primary transition-all duration-300 group-hover:text-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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

        @if ($coursesList->isNotEmpty())
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Featured Courses</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($coursesList as $course)
                    <div class="p-6 transition-all duration-300 bg-white border border-gray-200 rounded-lg hover:shadow-md">
                        <h4 class="mb-2 font-semibold text-gray-800">{{ $course->name }}</h4>
                        @if ($course->department)
                        <p class="mb-3 text-sm text-gray-600">{{ $course->department->name }}</p>
                        @endif
                        @if ($course->description)
                        <p class="mb-4 text-sm text-gray-600">{{ Str::limit($course->description, 100) }}</p>
                        @endif
                        <a href="{{ route('courses') }}" class="text-sm font-medium text-primary hover:text-orange-600">View Course Details →</a>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('courses') }}" class="inline-block px-6 py-3 font-bold text-white bg-primary rounded-lg hover:bg-orange-700">View All Courses</a>
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
                Start Your <span class="text-primary">Technical Training</span> Journey
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Explore our diverse range of courses and find the right path for your career.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('courses') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    View Courses <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
