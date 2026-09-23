<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\TeamMember;

new
#[Title('Principal\'s Office')]
class extends Component
{
    public $principal;
    public $headsOfDepartments = [];
    public $collegeOverview;
    public $ourValues = [];
    public $studentPopulation;
    public $keyAchievementsList = [];
    public $principalMessage;
    public $totalStudents;
    public $totalCourses;
    public $yearEstablished;


    // institution setting
    public $setting;

    public function mount(): void
    {
        // No caching — fetch directly from the database
        $this->principal = TeamMember::whereHas('roles', fn ($q) =>
                                $q->where('slug', 'principal')
                            )->first();

        // College stats and information
        $this->collegeOverview = "$this->setting->name is a leading institution committed to providing high-quality technical and vocational education and training. We equip our students with practical skills and knowledge that are highly relevant to the demands of the modern workforce and contribute to national development.";

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
            'National champions in 3 categories at the Kenya Music and Drama Festivals 2025',
            'Attained National TVET Excellence Award for Best Technical College in 2025',
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
                <div class="md:w-1/3 lg:w-1/4 shrink-0">
                    <div
                        class="relative h-full min-h-[300px] md:min-h-[400px] bg-gray-200 flex items-center justify-center">
                        @if ($principal->photo)
                        <img src="{{ asset('storage/'.$principal->photo) }}" alt="{{ $principal->name }}"
                            class="object-cover w-full h-full">
                        @else
                        <div class="text-center">
                            <x-ionicon-person class="text-6xl text-gray-400"/>
                            <p class="mt-2 text-gray-500">Photo Coming Soon</p>
                        </div>
                        @endif
                        <div
                            class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent md:hidden">
                            <h2 class="text-2xl font-bold text-white">{{ $principal->name }}</h2>
                            <p class="text-lg text-gray-200">Principal, {{ $setting->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:w-2/3 lg:w-3/4">
                    <div class="hidden md:block">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">{{ $principal->name }}</h2>
                        <p class="mb-2 text-lg text-gray-600">Principal, {{ $setting->name }}</p>
                        @if ($principal->qualification)
                        <p class="mb-4 italic text-gray-600">{{ $principal->qualifications }}</p>
                        @endif
                    </div>

                    @if ($setting->welcome_message)
                    <div class="mb-6 prose text-gray-700 max-w-none">
                        {!! $setting->welcome_message !!}
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
                Take the first step toward your future career. Apply now for our upcoming intake and join our community
                of successful graduates.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <x-ionicon-arrow-forward class="text-xs"/>
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <x-ionicon-mail class="text-xs"/> Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
