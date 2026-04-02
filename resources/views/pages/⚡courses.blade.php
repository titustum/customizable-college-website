<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Course;
use App\Models\Department;
use App\Models\Institution;

new
#[Title('Courses')]
#[Layout('layouts::app')]
class extends Component
{
    public $search = '';
    public $department = '';
    public $page = 1;

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        return [
            'institution' => $institution,
            'departments' => Department::with(['courses' => function ($query) {
                $query->when($this->search, function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            }])
            ->when($this->department, function ($query) {
                $query->where('name', $this->department);
            })
            ->get(),
        ];
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'department' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->page = 1;
    }

    public function updatingDepartment()
    {
        $this->page = 1;
    }
};
?>

<main class="bg-gray-50">
    <!-- Hero Section -->
    <section class="relative clip-diagonal grain py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Campus" class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">Academics</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Our Courses</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Discover our diverse range of technical and vocational courses designed to prepare you for your career.</p>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search courses..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="md:w-64">
                    <select wire:model.live="department" wire:key="department-select"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                        <option value="{{ $dept->name }}">{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @foreach($departments as $departmentIndex => $department)
            @if(count($department->courses) > 0)
            <div class="mb-12 overflow-hidden bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="{{ $departmentIndex * 100 }}">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <img src="{{ $department->photo ? asset('storage/'. $department->photo) : asset('images/placeholders/department-placeholder.webp') }}" alt="{{ $department->name }}"
                            class="object-cover w-16 h-16 rounded-xl">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $department->name }}</h2>
                            @if($department->description)
                            <p class="text-sm text-gray-500 mt-1">{{ Str::limit($department->description, 100) }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-6 overflow-x-auto">
                    <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                        <thead class="text-white bg-primary">
                            <tr>
                                <th class="px-2 py-2 text-left sm:px-4 sm:py-3">Course</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 sm:table-cell">Requirements</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Duration</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Exam Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department->courses as $course)
                            <tr class="border-b border-gray-200">
                                <td class="px-2 py-2 sm:px-4 sm:py-3">
                                    <div class="font-medium">{{ $course->name }}</div>
                                    <div class="text-sm text-gray-500 sm:hidden">{{ $course->requirement }}</div>
                                    <div class="text-sm text-gray-500 sm:hidden md:hidden">{{ $course->duration }} | {{ $course->exam_body }}</div>
                                </td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 sm:table-cell">{{ $course->requirement ?? 'N/A' }}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{ $course->duration ?? 'N/A' }}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{ $course->exam_body ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            @endforeach

            @if($departments->flatMap->courses->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Courses Found</h3>
                <p class="text-gray-500">Try adjusting your search or filter criteria.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Ready to <span class="text-primary">Start Your Career</span>?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Join {{ $institution->name }} and gain practical skills that employers are looking for.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
</main>
