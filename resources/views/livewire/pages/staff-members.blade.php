<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\TeamMember;
use App\Models\Role;

new
#[Title('Our Leadership Team')]
class extends Component
{
    public $principals;
    public $deputies;
    public $hods;
    public $sectionHeads;
    public $trainers;
    public $others;

    public function mount(){
        $this->principals = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Principal');
        })->get();

        $this->deputies = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Deputy Principal');
        })->get();

        $this->hods = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'HOD');
        })->get();

        $this->sectionHeads = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Head of Section');
        })->orWhere(function ($query) {
            $query->whereDoesntHave('role', function ($q) {
                      $q->whereIn('name', ['Principal', 'Deputy Principal', 'HOD', 'Trainer', 'Others', 'Head of Section']);
                  });
        })->get();
 

        $this->trainers = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Trainer');
        })->get();

        $this->others = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'others');
        })->get();
    }
};

?>

<main class="bg-gradient-to-b from-white to-gray-100">
    <!-- Hero Section with Background -->
    <div class="relative py-12 mb-8 bg-orange-700">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <div class="container relative px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl">Our Staff Team</h1>
            <p class="max-w-2xl mx-auto text-lg text-orange-100">Meet the dedicated professionals who guide our
                institution toward excellence</p>
        </div>
    </div>

    <!-- Team Section Container -->
    <section class="container px-4 pb-20 mx-auto">
        <!-- Principal -->
        @if(count($principals) > 0)
        <div class="mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-block px-6 py-2 mb-6 text-sm font-semibold text-orange-900 bg-orange-100 rounded-full">
                Leadership</div>
            <h2 class="mb-10 text-3xl font-bold text-center text-gray-800">Principal</h2>
            <div class="flex justify-center">
                @foreach ($principals as $principal)
                <div
                    class="max-w-lg overflow-hidden transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1">
                    <div class="flex flex-col items-center p-6 md:flex-row md:items-start">
                        <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                            <div class="p-1 rounded-full bg-gradient-to-r from-orange-500 to-orange-700">
                                <img src="{{ asset('storage/'.$principal->photo) }}"
                                    alt="Photo of {{ $principal->name }}"
                                    class="object-cover w-32 h-32 rounded-full md:w-40 md:h-40">
                            </div>
                        </div>
                        <div class="text-center md:text-left">
                            <h3 class="mb-1 text-2xl font-bold text-gray-800">{{ $principal->name }}</h3>
                            <p class="mb-3 font-medium text-orange-600">{{ $principal->role->name }}</p>

                            <!-- Hardcoded short description -->
                            <p class="mb-4 text-gray-600">
                                Dedicated to excellence and leadership in education, inspiring students and staff alike.
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endif

        <!-- Deputy Principals -->
        @if(count($deputies) > 0)
        <div class="mb-16" data-aos="fade-up" data-aos-duration="800">
            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">Deputy Principals</h2>
            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">Supporting our institution's vision and daily
                operations</p>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-{{ min(count($deputies), 3) }}">
                @foreach ($deputies as $deputy)
                <div
                    class="overflow-hidden transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6 text-center">
                        <div
                            class="p-1 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-orange-600 w-28 h-28">
                            <img src="{{ asset('storage/'.$deputy->photo) }}" alt="{{$deputy->name}}"
                                class="object-cover w-full h-full rounded-full">
                        </div>
                        <h3 class="mb-1 text-xl font-bold text-gray-800">{{$deputy->name}}</h3>
                        <p class="mb-1 font-medium text-orange-600">{{ $deputy->role->name }}</p>
                        @if($deputy->section_assigned)
                        <p class="text-sm text-gray-600">{{ $deputy->section_assigned }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Section Heads - Combined HODs and Section Heads -->
        @if(count($hods) > 0 || count($sectionHeads) > 0)
        <div class="mb-16" data-aos="fade-up" data-aos-duration="800">
            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">Department & Section Leaders</h2>
            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">Coordinating our academic and operational
                departments</p>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- HODs -->
                @foreach ($hods as $hod)
                <div
                    class="p-4 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">
                    <div class="text-center">
                        <div
                            class="w-24 h-24 p-1 mx-auto mb-3 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">
                            <img src="{{ asset('storage/'.$hod->photo) }}" alt="{{ $hod->name }}"
                                class="object-cover w-full h-full rounded-full">
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-gray-800">{{ $hod->name }}</h3>
                        <p class="mb-1 font-medium text-orange-600">{{ $hod->role->name }}</p>
                        <p class="text-sm text-gray-600">{{ $hod->department->name }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Other Section Heads -->
                @foreach ($sectionHeads as $hos)
                <div
                    class="p-4 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">
                    <div class="text-center">
                        <div
                            class="w-24 h-24 p-1 mx-auto mb-3 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">
                            <img src="{{ asset('storage/'.$hos->photo) }}" alt="{{ $hos->name }}"
                                class="object-cover w-full h-full rounded-full">
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-gray-800">{{ $hos->name }}</h3>
                        <p class="mb-1 font-medium text-orange-600">{{ $hos->role->name }}</p>
                        <p class="text-sm text-gray-600">{{ $hos->section_assigned }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Trainers -->
        @if(count($trainers) > 0)
        <div data-aos="fade-up" data-aos-duration="800">
            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">Our Expert Trainers</h2>
            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">Dedicated professionals committed to
                educational excellence</p>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($trainers as $trainer)
                <div
                    class="p-3 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">
                    <div class="text-center">
                        <div
                            class="w-20 h-20 p-1 mx-auto mb-2 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">
                            <img src="{{ asset('storage/'.$trainer->photo) }}" alt="{{$trainer->name}}"
                                class="object-cover w-full h-full rounded-full">
                        </div>
                        <h3 class="mb-1 font-semibold text-gray-800 text-md">{{$trainer->name}}</h3>
                        <p class="text-xs text-gray-600">{{$trainer->department->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Other Staff (if needed) -->
        @if(count($others) > 0)
        <div class="mt-16" data-aos="fade-up" data-aos-duration="800">
            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">Support Staff</h2>
            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">The backbone of our daily operations</p>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($others as $staff)
                <div
                    class="p-3 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">
                    <div class="text-center">
                        <div class="w-20 h-20 p-1 mx-auto mb-2 rounded-full bg-gradient-to-r from-gray-200 to-gray-300">
                            <img src="{{ asset('storage/'.$staff->photo) }}" alt="{{$staff->name}}"
                                class="object-cover w-full h-full rounded-full">
                        </div>
                        <h3 class="mb-1 font-semibold text-gray-800 text-md">{{$staff->name}}</h3>
                        <p class="text-xs text-gray-600">{{$staff->role->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>

    <!-- Footer Note -->
    <div class="py-6 text-center bg-orange-700">
        <p class="text-sm text-orange-100">Want to join our team? <a href="#" class="font-medium underline">View career
                opportunities</a></p>
    </div>
</main>