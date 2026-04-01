<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\TeamMember;
use App\Models\Department;

new
#[Title("Deputy Principal Administration")]
class extends Component
{
    public $deputyAdmin;
    public $academicDepartmentsList = [];
    public $institution;

    public function mount(): void
    {
        $this->deputyAdmin = TeamMember::with('role')
            ->whereHas('role', function ($query) {
                $query->where('name', 'Deputy Principal Administration');
            })
            ->first();

        $this->academicDepartmentsList = Department::all();
    }
}
?>

<div class="bg-gray-100">
    <div class="container px-4 py-16 mx-auto">
        <section class="mb-12 overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                @if ($deputyAdmin)
                <div class="md:w-1/3 lg:w-1/4">
                    <div class="relative h-full">
                        <img src="{{ $deputyAdmin->photo ? asset('storage/'.$deputyAdmin->photo) : asset('images/placeholder-user.png') }}" 
                            alt="{{ $deputyAdmin->name }}"
                            class="object-cover w-full h-full">
                        <div class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent md:hidden">
                            <h2 class="text-2xl font-bold text-white">{{ $deputyAdmin->name }}</h2>
                            <p class="text-lg text-gray-200">Deputy Principal Administration</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:w-2/3 lg:w-3/4">
                    <div class="hidden md:block">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">{{ $deputyAdmin->name }}</h2>
                        <p class="mb-2 text-lg text-gray-600">Deputy Principal Administration</p>
                        @if ($deputyAdmin->qualifications)
                        <p class="mb-4 italic text-gray-600">{{ $deputyAdmin->qualifications }}</p>
                        @endif
                    </div>

                    @if ($deputyAdmin->bio)
                    <div class="mb-6 prose text-gray-700 max-w-none">
                        <p>{{ $deputyAdmin->bio }}</p>
                    </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="pb-2 mb-4 text-xl font-semibold text-primary border-b border-orange-200">A Message from Deputy Principal Administration</h3>
                        <div class="prose text-gray-700 max-w-none">
                            <p>Welcome to the Administration Office. Our department is dedicated to ensuring efficient institutional operations, student welfare, and administrative excellence. We work tirelessly to create an enabling environment for teaching and learning.</p>
                        </div>
                    </div>

                    @if ($deputyAdmin->email || $deputyAdmin->phone)
                    <div class="p-4 mt-6 rounded-lg bg-gray-50">
                        <h4 class="mb-2 text-lg font-medium text-gray-800">Contact us</h4>
                        @if ($deputyAdmin->email)
                        <p class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $deputyAdmin->email }}</span>
                        </p>
                        @endif
                        @if ($deputyAdmin->phone)
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $deputyAdmin->phone }}</span>
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
                        <p class="text-gray-500">Deputy Principal Administration's information not available at this time.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>

        @if ($academicDepartmentsList->isNotEmpty())
        <section class="py-12 mb-12 bg-white rounded-lg shadow-md">
            <div class="px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Departments Under Administration</h2>
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
                                    <a href="{{ route('department', $department->slug) }}" class="inline-flex items-center text-sm font-medium text-primary transition-all duration-300 group-hover:text-primary">
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
    </div>

    <section class="py-16 text-white bg-primary">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <div class="mb-8 text-center md:mb-0 md:text-left">
                    <h2 class="mb-4 text-3xl font-bold">Ready to Join Our Institution?</h2>
                    <p class="max-w-xl text-white/90">Take the first step toward your future career. Apply now for our upcoming intake.</p>
                </div>
                <div class="flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('admissions') }}" class="px-6 py-3 font-bold text-center text-primary transition duration-300 bg-white rounded-lg hover:bg-gray-100">Apply Now</a>
                    <a href="{{ route('contact') }}" class="px-6 py-3 font-bold text-center text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white/10">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</div>
