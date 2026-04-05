<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Vacancy;
use App\Models\Institution;
use App\Models\Department;

new
#[Title("Job Vacancies")]
#[Layout('layouts::app')]
class extends Component
{
    public $selectedDepartment = 'all';
    public $search = '';

    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College'];

        $vacancies = Vacancy::query()
            ->with('department')
            ->when($this->selectedDepartment !== 'all', function ($query) {
                $query->where('department_id', $this->selectedDepartment);
            })
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('reference_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('department', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            })
            ->orderBy('application_deadline', 'asc')
            ->get();

        $departments = Department::orderBy('name')->pluck('name', 'id')->toArray();

        return [
            'institution' => $institution,
            'vacancies' => $vacancies,
            'departments' => $departments,
        ];
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
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4"
                data-aos="fade-down">Careers</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Job
                Vacancies</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Join
                our team and make a difference in the lives of our students.</p>
        </div>
    </section>

    <!-- Vacancies Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row gap-4" data-aos="fade-up">
                <div class="flex-grow">
                    <div class="relative">
                        <input wire:model.debounce.300ms="search" type="text"
                            placeholder="Search by title, department or reference..."
                            class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Department Filter -->
            <div class="mb-10 flex flex-wrap justify-center gap-3" data-aos="fade-up">
                <button wire:click="$set('selectedDepartment', 'all')"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedDepartment === 'all' ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    All Departments
                </button>
                @foreach($departments as $department)
                <button wire:click="$set('selectedDepartment', {{ $department->id }})"
                    class="px-5 py-2 rounded-full font-semibold transition-all {{ $selectedDepartment == $department->id ? 'bg-primary text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-primary hover:text-primary' }}">
                    {{ $department->name }}
                </button>
                @endforeach
            </div>

            <!-- Vacancies List -->
            @if(count($vacancies))
            <div class="space-y-6">
                @foreach($vacancies as $index => $vacancy)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-start gap-6">
                            <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    @if($vacancy->status === 'open')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span> Open
                                    </span>
                                    @elseif($vacancy->status === 'closed')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span> Closed
                                    </span>
                                    @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600">
                                        Cancelled
                                    </span>
                                    @endif
                                    <span class="text-sm text-gray-500 font-medium">{{ $vacancy->reference_number
                                        }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-primary transition-colors">
                                    {{ $vacancy->title }}
                                </h3>
                                @if($vacancy->department)
                                <p class="text-sm text-gray-500 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    {{ $vacancy->department->name }}
                                </p>
                                @endif
                                @if($vacancy->description)
                                <p class="text-gray-600 mb-4 line-clamp-2">{{ $vacancy->description }}</p>
                                @endif
                                <div class="flex flex-wrap items-center gap-4 text-sm">
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>Published: {{ $vacancy->published_at?->format('M d, Y') ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Deadline: {{ $vacancy->application_deadline->format('M d, Y') }}</span>
                                    </div>
                                    @if($vacancy->attachment_path)
                                    <a href="{{ Storage::url($vacancy->attachment_path) }}" download
                                        class="inline-flex items-center gap-2 text-primary font-semibold hover:text-orange-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                        Download Job Details
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Vacancies Available</h3>
                <p class="text-gray-500">Check back later for new career opportunities.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;">
        </div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Can't Find What You're Looking For?
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                data-aos-delay="200">
                Submit your CV for future opportunities or contact our HR department.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Contact HR <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>
</main>
