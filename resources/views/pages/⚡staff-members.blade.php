<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\TeamMember;

new
#[Title('Our Leadership Team')]
class extends Component
{
    public $principal;
    public $deputies;
    public $administrators;
    public $hods;
    public $sectionHeads;
    public $trainers;
    public $others;

    public function mount()
    {
        $members = TeamMember::with(['assignments.role', 'assignments.department'])
            ->get();

        // helper: pick primary assignment
        $primary = function ($member) {
            return $member->assignments
                ->sortBy(fn ($a) => $a->role->level ?? 999)
                ->first();
        };

        // assign once (NO duplication across queries)
        $this->principal = $members
            ->first(fn ($m) => optional($primary($m)->role)->slug === 'principal');

        $this->deputies = $members
            ->filter(fn ($m) => optional($primary($m)->role)->slug === 'deputy-principal');

        $this->administrators = $members
            ->filter(fn ($m) => in_array(optional($primary($m)->role)->slug, [
                'registrar',
                'dean-of-students',
                'finance-officer',
                'procurement-officer',
            ]));

        $this->hods = $members
            ->filter(fn ($m) => optional($primary($m)->role)->slug === 'hod');

        $this->sectionHeads = $members
            ->filter(fn ($m) => optional($primary($m)->role)->slug === 'coordinator');

        $this->trainers = $members
            ->filter(fn ($m) => optional($primary($m)->role)->slug === 'trainer');

        $this->others = $members
            ->filter(fn ($m) => optional($primary($m)->role)->slug === 'support-staff');
    }
}

?>

<main class="bg-gradient-to-b from-white to-gray-100">

    <!-- Hero -->
    <div class="relative py-12 mb-8 bg-orange-700">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>

        <div class="container relative px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl">
                Our Staff Team
            </h1>

            <p class="max-w-2xl mx-auto text-lg text-orange-100">
                Meet the dedicated professionals who guide our institution toward excellence
            </p>
        </div>
    </div>

    <section class="container px-4 pb-20 mx-auto">

        {{-- ========================================================= --}}
        {{-- PRINCIPAL --}}
        {{-- ========================================================= --}}

        @if($principal)

        @php
        $principalAssignment = $principal->assignments
        ->firstWhere('role.slug', 'principal');
        @endphp

        <div class="mb-16" data-aos="fade-up">

            <div class="inline-block px-6 py-2 mb-6 text-sm font-semibold text-orange-900 bg-orange-100 rounded-full">
                Leadership
            </div>

            <h2 class="mb-10 text-3xl font-bold text-center text-gray-800">
                Principal
            </h2>

            <div class="flex justify-center">

                <div
                    class="max-w-lg overflow-hidden transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1">

                    <div class="flex flex-col items-center p-6 md:flex-row md:items-start">

                        <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">

                            <div class="p-1 rounded-full bg-gradient-to-r from-orange-500 to-orange-700">

                                <img @if ($principal->photo)
                                src="{{ asset('storage/'.$principal->photo) }}"
                                @else
                                src="{{ asset('images/default-avatar.jpg') }}"
                                @endif

                                alt="{{ $principal->name }}"
                                class="object-cover w-32 h-32 rounded-full md:w-40 md:h-40"
                                >

                            </div>

                        </div>

                        <div class="text-center md:text-left">

                            <h3 class="mb-1 text-2xl font-bold text-gray-800">
                                {{ $principal->name }}
                            </h3>

                            <p class="mb-3 font-medium text-orange-600">
                                {{
                                $principalAssignment?->custom_title
                                ?? $principalAssignment?->role?->name
                                ?? 'Principal'
                                }}
                            </p>
                            <p class="text-gray-600">
                                Dedicated to excellence and leadership in education,
                                inspiring students and staff alike.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endif


        {{-- ========================================================= --}}
        {{-- DEPUTIES --}}
        {{-- ========================================================= --}}

        @if($deputies->count() > 0)

        <div class="mb-16" data-aos="fade-up">

            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">
                Deputy Principals
            </h2>

            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
                Supporting our institution's vision and daily operations
            </p>

            <div class="max-w-2xl mx-auto grid gap-8 sm:grid-cols-2">

                @foreach ($deputies as $deputy)

                @php
                $assignment = $deputy->assignments
                ->firstWhere('role.slug', 'deputy-principal');
                @endphp

                <div
                    class="overflow-hidden transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-lg hover:-translate-y-1">

                    <div class="p-6 text-center">

                        <div
                            class="p-1 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-orange-600 w-28 h-28">

                            <img @if ($deputy->photo)
                            src="{{ asset('storage/'.$deputy->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $deputy->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 text-xl font-bold text-gray-800">
                            {{ $deputy->name }}
                        </h3>

                        <p class="mb-1 font-medium text-orange-600">
                            Deputy Principal
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ $assignment?->custom_title ??
                            $assignment?->role?->name }}
                        </p>
                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif



        {{-- ========================================================= --}}
        {{-- ADMINISTRATORS --}}
        {{-- ========================================================= --}}

        @if($administrators->count() > 0)

        <div class="mb-16" data-aos="fade-up" data-aos-duration="800">

            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">
                Administrators
            </h2>

            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
                Managing institutional operations and administrative functions
            </p>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                @foreach ($administrators as $admin)

                @php
                $assignment = $admin->assignments
                ->firstWhere('role.level', 3);
                @endphp

                <div
                    class="p-4 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">

                    <div class="text-center">

                        <div
                            class="w-24 h-24 p-1 mx-auto mb-3 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">

                            <img @if ($admin->photo)
                            src="{{ asset('storage/'.$admin->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $admin->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 text-lg font-bold text-gray-800">
                            {{ $admin->name }}
                        </h3>

                        <p class="mb-1 font-medium text-orange-600">
                            {{
                            $assignment?->custom_title
                            ?? $assignment?->role?->name
                            ?? 'Administrator'
                            }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif



        {{-- ========================================================= --}}
        {{-- HODS + COORDINATORS --}}
        {{-- ========================================================= --}}

        @if($hods->count() > 0 || $sectionHeads->count() > 0)

        <div class="mb-16" data-aos="fade-up">

            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">
                Department & Section Leaders
            </h2>

            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
                Coordinating our academic and operational departments
            </p>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                {{-- HODS --}}
                @foreach ($hods as $hod)

                @php
                $assignment = $hod->assignments
                ->firstWhere('role.slug', 'hod');
                @endphp

                <div
                    class="p-4 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">

                    <div class="text-center">

                        <div
                            class="w-24 h-24 p-1 mx-auto mb-3 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">

                            <img @if ($hod->photo)
                            src="{{ asset('storage/'.$hod->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $hod->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 text-lg font-bold text-gray-800">
                            {{ $hod->name }}
                        </h3>

                        <p class="mb-1 font-medium text-orange-600">
                            {{
                            $assignment?->custom_title
                            ?? $assignment?->role?->name
                            }}
                        </p>

                        <p class="text-sm text-gray-600">
                            {{ $assignment?->department?->name }}
                        </p>

                    </div>

                </div>

                @endforeach


                {{-- COORDINATORS --}}
                @foreach ($sectionHeads as $hos)

                @php
                $assignment = $hos->assignments
                ->firstWhere('role.slug', 'coordinator');
                @endphp

                <div
                    class="p-4 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">

                    <div class="text-center">

                        <div
                            class="w-24 h-24 p-1 mx-auto mb-3 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">

                            <img @if ($hos->photo)
                            src="{{ asset('storage/'.$hos->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $hos->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 text-lg font-bold text-gray-800">
                            {{ $hos->name }}
                        </h3>

                        <p class="mb-1 font-medium text-orange-600">
                            {{
                            $assignment?->custom_title
                            ?? $assignment?->role?->name
                            }}
                        </p>

                        <p class="text-sm text-gray-600">
                            {{ $assignment?->department?->name }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif


        {{-- ========================================================= --}}
        {{-- TRAINERS --}}
        {{-- ========================================================= --}}

        @if($trainers->count() > 0)

        <div class="mb-16" data-aos="fade-up">

            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">
                Our Expert Trainers
            </h2>

            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
                Dedicated professionals committed to educational excellence
            </p>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">

                @foreach ($trainers as $trainer)

                @php
                $assignment = $trainer->assignments
                ->firstWhere('role.slug', 'trainer');
                @endphp

                <div
                    class="p-3 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">

                    <div class="text-center">

                        <div
                            class="w-20 h-20 p-1 mx-auto mb-2 rounded-full bg-gradient-to-r from-orange-300 to-orange-500">

                            <img @if ($trainer->photo)
                            src="{{ asset('storage/'.$trainer->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $trainer->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 font-semibold text-gray-800 text-md">
                            {{ $trainer->name }}
                        </h3>

                        <p class="text-xs text-gray-600">
                            {{ $assignment?->department?->name }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif


        {{-- ========================================================= --}}
        {{-- SUPPORT STAFF --}}
        {{-- ========================================================= --}}

        @if($others->count() > 0)

        <div class="mt-16" data-aos="fade-up">

            <h2 class="mb-2 text-3xl font-bold text-center text-gray-800">
                Support Staff
            </h2>

            <p class="max-w-2xl mx-auto mb-10 text-center text-gray-600">
                The backbone of our daily operations
            </p>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">

                @foreach ($others as $staff)

                @php
                $assignment = $staff->assignments->first();
                @endphp

                <div
                    class="p-3 transition-all duration-300 transform bg-white rounded-lg shadow hover:shadow-md hover:-translate-y-1">

                    <div class="text-center">

                        <div class="w-20 h-20 p-1 mx-auto mb-2 rounded-full bg-gradient-to-r from-gray-200 to-gray-300">

                            <img @if ($staff->photo)
                            src="{{ asset('storage/'.$staff->photo) }}"
                            @else
                            src="{{ asset('images/default-avatar.jpg') }}"
                            @endif

                            alt="{{ $staff->name }}"
                            class="object-cover w-full h-full rounded-full"
                            >

                        </div>

                        <h3 class="mb-1 font-semibold text-gray-800 text-md">
                            {{ $staff->name }}
                        </h3>

                        <p class="text-xs text-gray-600">
                            {{
                            $assignment?->custom_title
                            ?? $assignment?->role?->name
                            }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif

    </section>


    {{-- FOOTER --}}
    <div class="py-6 text-center bg-orange-700">

        <p class="text-sm text-orange-100">
            Want to join our team?

            <a href="{{ route('vacancies') }}" class="font-medium underline">
                View career opportunities
            </a>
        </p>

    </div>

</main>
