<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Course;
use App\Models\Department;
use App\Models\Application;
use Carbon\Carbon;

new
#[Title('Apply Now | Tetu Technical & Vocational College')]
class extends Component
{
    public $department_id = null;
    public $departments = [];
    public $courses = [];

    public $full_name;
    public $phone;
    public $alternative_phone;
    public $gender;
    public $id_number;

    public $course_id;
    public $start_term;

    public $high_school;
    public $high_school_grade;
    public $kcse_index_number;
    public $kcse_year;
    public $nemis_upi_number;

    public $parent_name;
    public $parent_phone;
    public $terms = false;

    public $startTermOptions = [];
    public $currentStep = 1;
    public $totalSteps = 4;

    public function mount()
    {
        $this->departments = Department::all();
        $this->startTermOptions = $this->getStartTermOptions();
    }

    public function updatedDepartmentId($value)
    {
        $this->courses = Course::where('department_id', $value)->get();

        // dd($this->courses);

        $this->course_id = null; // Reset course selection
    }



    public function getStartTermOptions(): array
	{
	    $currentDate = Carbon::now();

	    $terms = [
	        'January' => 1,
	        'May' => 5,
	        'September' => 9,
	    ];

	    $termEntries = [];

	    foreach ($terms as $label => $month) {

	        // Current year first
	        $termDate = Carbon::create(
	            $currentDate->year,
	            $month,
	            1
	        );

	        // Intake is available until the end of its month
	        $termEndDate = $termDate->copy()->endOfMonth();

	        // If this year's intake has already closed,
	        // use next year's intake.
	        if ($currentDate->gt($termEndDate)) {
	            $termDate->addYear();
	        }

	        $key = strtolower(substr($label, 0, 3)) . "_{$termDate->year}";

	        $termEntries[] = [
	            'date' => $termDate,
	            'key' => $key,
	            'label' => "{$label} {$termDate->year}",
	        ];
	    }

	    // Sort by actual intake date
	    usort($termEntries, function ($a, $b) {
	        return $a['date']->timestamp <=> $b['date']->timestamp;
	    });

	    // Convert to the format required by your select
	    $options = [];

	    foreach ($termEntries as $entry) {
	        $options[$entry['key']] = $entry['label'];
	    }

	    return $options;
	}

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function validateCurrentStep()
    {
        $rules = [];

        switch ($this->currentStep) {
            case 1:
                $rules = [
                    'full_name' => 'required|string|max:255',
                    'phone' => 'required|string|max:20',
                    'gender' => 'required|in:male,female,other',
                    'id_number' => 'required|string|max:255',
                ];
                break;

            case 2:
                $rules = [
                    'high_school' => 'required|string|max:255',
                    'high_school_grade' => 'required|string|max:50',
                    'kcse_index_number' => 'required|string|max:255',
                    'kcse_year' => 'required|digits:4|integer|min:1990|max:' . date('Y'),
                ];
                break;

            case 3:
                $rules = [
                    'department_id' => 'required|exists:departments,id',
                    'course_id' => 'required|exists:courses,id',
                    'start_term' => 'required|in:' . implode(',', array_keys($this->startTermOptions)),
                ];

                // Validate course belongs to department
                if ($this->course_id) {
                    $course = Course::find($this->course_id);
                    if (!$course || $course->department_id != $this->department_id) {
                        $this->addError('course_id', 'Selected course does not belong to the selected department.');
                    }
                }
                break;

            case 4:
                $rules = [
                    'parent_name' => 'required|string|max:255',
                    'parent_phone' => 'required|string|max:20',
                    'terms' => 'accepted',
                ];
                break;
        }

        $this->validate($rules);
    }

    public function submitApplication()
    {
        // Full validation before submission
        $this->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'gender' => 'required|in:male,female,other',
            'id_number' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
            'start_term' => 'required|in:' . implode(',', array_keys($this->startTermOptions)),
            'high_school' => 'required|string|max:255',
            'high_school_grade' => 'required|string|max:50',
            'kcse_index_number' => 'required|string|max:255',
            'kcse_year' => 'required|digits:4|integer|min:1990|max:' . date('Y'),
            'nemis_upi_number' => 'nullable|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'terms' => 'accepted',
        ]);

        // Extra validation: course must belong to department
        $course = Course::find($this->course_id);
        if (!$course || $course->department_id != $this->department_id) {
            $this->addError('course_id', 'Selected course does not belong to the selected department.');
            return;
        }

         $application = Application::updateOrCreate(
            ['id_number' => $this->id_number],  // find existing by id_number
            [
                'full_name' => $this->full_name,
                'phone' => $this->phone,
                'alternative_phone' => $this->alternative_phone,
                'gender' => $this->gender,
                'course_id' => $this->course_id,
                'start_term' => $this->start_term,
                'high_school' => $this->high_school,
                'high_school_grade' => $this->high_school_grade,
                'kcse_index_number' => $this->kcse_index_number,
                'kcse_year' => $this->kcse_year,
                'nemis_upi_number' => $this->nemis_upi_number,
                'parent_name' => $this->parent_name,
                'parent_phone' => $this->parent_phone,
            ]
        );

        session()->flash('message', 'Application submitted successfully! Download your confirmation letter.');

        return redirect()->route('admissions.complete', ['id' => $application->id]);

        // Reset only inputs (keep departments loaded)
        $this->reset([
            'department_id', 'courses', 'full_name', 'phone', 'alternative_phone', 'gender', 'id_number',
            'course_id', 'start_term', 'high_school', 'high_school_grade', 'kcse_index_number',
            'kcse_year', 'nemis_upi_number', 'parent_name', 'parent_phone', 'terms',
        ]);

        $this->currentStep = 1;
        $this->departments = Department::all();
        $this->startTermOptions = $this->getStartTermOptions();
    }
}

?>




<main class="bg-gray-50 min-h-screen">
    <!-- Hero Section -->
    <section class="relative clip-diagonal grain py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Campus" class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4"
                data-aos="fade-down">Admissions</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">Apply
                to {{ $setting->name }}</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Take
                the first step towards your future career. Complete your application in just a few minutes.</p>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                @if (session()->has('message'))
                <div
                    class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-8 flex items-center">
                    <x-ionicon-checkmark-circle class="text-green-500 mr-3 text-xl"/>
                    <div>
                        <h4 class="font-semibold">Application Submitted Successfully!</h4>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
                @endif

                <!-- Form Container -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-8">
                        <form wire:submit.prevent="submitApplication" class="space-y-8">

                            <!-- Step 1: Personal Information -->
                            @if ($currentStep == 1)
                            <div class="space-y-6">
                                <div class="text-center mb-8">
                                    <div
                                        class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <x-ionicon-person class="text-primary text-2xl"/>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>
                                    <p class="text-gray-600">Tell us about yourself</p>
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-person class="mr-2 text-primary"/>Full Name *
                                        </label>
                                        <input type="text" id="full_name" wire:model.lazy="full_name" required
                                            placeholder="Enter your full name"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        @error('full_name') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-call class="mr-2 text-primary"/>Phone Number *
                                        </label>
                                        <input type="tel" id="phone" wire:model.lazy="phone" required
                                            placeholder="0712345678"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alternative_phone"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-call class="mr-2 text-gray-400"/>Alternative Phone Number
                                    </label>
                                    <input type="tel" id="alternative_phone" wire:model.lazy="alternative_phone"
                                        placeholder="Optional alternative number"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('alternative_phone') <span class="text-red-500 text-sm mt-1 block">{{
                                        $message }}</span> @enderror
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-male-female class="mr-2 text-primary"/>Gender *
                                        </label>
                                        <select id="gender" wire:model="gender" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                            <option value="">Select your gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @error('gender') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="id_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-id-card class="mr-2 text-primary"/>ID Number/Birth
                                            Certificate *
                                        </label>
                                        <input type="text" id="id_number" wire:model.lazy="id_number" required
                                            placeholder="Enter ID or Birth Certificate number"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        @error('id_number') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Step 2: Academic Background -->
                            @if ($currentStep == 2)
                            <div class="space-y-6">
                                <div class="text-center mb-8">
                                    <div
                                        class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <x-ionicon-school class="text-primary text-2xl"/>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Academic Background</h2>
                                    <p class="text-gray-600">Your educational history</p>
                                </div>

                                <div class="form-group">
                                    <label for="high_school" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-school class="mr-2 text-primary"/>High School Name *
                                    </label>
                                    <input type="text" id="high_school" wire:model.lazy="high_school" required
                                        placeholder="Enter your high school name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('high_school') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="high_school_grade"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-medal class="mr-2 text-primary"/>High School Grade *
                                    </label>
                                    <input type="text" id="high_school_grade" wire:model.lazy="high_school_grade"
                                        required placeholder="e.g., C+, B-, A"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('high_school_grade') <span class="text-red-500 text-sm mt-1 block">{{
                                        $message }}</span> @enderror
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="kcse_index_number"
                                            class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-calculator class="mr-2 text-primary"/>KCSE Index Number *
                                        </label>
                                        <input type="text" id="kcse_index_number" wire:model.lazy="kcse_index_number"
                                            required placeholder="Enter KCSE index number"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        @error('kcse_index_number') <span class="text-red-500 text-sm mt-1 block">{{
                                            $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kcse_year" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <x-ionicon-calendar class="mr-2 text-primary"/>KCSE Year *
                                        </label>
                                        <input type="number" id="kcse_year" wire:model.lazy="kcse_year" required
                                            placeholder="{{ date('Y') }}" min="1990" max="{{ date('Y') }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        @error('kcse_year') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nemis_upi_number"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-finger-print class="mr-2 text-gray-400"/>NEMIS/UPI Number
                                    </label>
                                    <input type="text" id="nemis_upi_number" wire:model.lazy="nemis_upi_number"
                                        placeholder="Optional - if available"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('nemis_upi_number') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>
                            </div>
                            @endif

                            <!-- Step 3: Course Selection -->
                            @if ($currentStep == 3)
                            <div class="space-y-6">
                                <!-- Department Selection -->
                                <div class="form-group">
                                    <label for="departmentId" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-business class="mr-2 text-primary"/>Department *
                                    </label>

                                    <select wire:model.live="department_id"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        <option value="">Select a department</option>
                                        @foreach ($departments->where('type', 'academic') as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('department_id') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <!-- Course Selection -->
                                <div class="form-group">
                                    <label for="courseId" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-library class="mr-2 text-primary"/>Desired Course of Study *
                                    </label>
                                    <select id="courseId" wire:model="course_id" @if(is_null($department_id)) disabled
                                        @endif required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        <option value="">Select a course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>


                                <div class="form-group">
                                    <label for="start_term" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-calendar class="mr-2 text-primary"/>Intended Start Term *
                                    </label>
                                    <select id="start_term" wire:model="start_term" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                        <option value="">Select a term</option>
                                        @foreach($startTermOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('start_term') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>


                            </div>
                            @endif


                            <!-- Step 4: Parent/Guardian Information -->
                            @if ($currentStep == 4)
                            <div class="space-y-6">
                                <div class="text-center mb-8">
                                    <div
                                        class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <x-ionicon-people class="mr-2 text-primary text-2xl"/>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Parent/Guardian Information</h2>
                                    <p class="text-gray-600">Emergency contact details</p>
                                </div>

                                <div class="form-group">
                                    <label for="parent_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-person class="mr-2 text-primary"/>Parent/Guardian Name *
                                    </label>
                                    <input type="text" id="parent_name" wire:model.lazy="parent_name" required
                                        placeholder="Enter parent/guardian full name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('parent_name') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parent_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <x-ionicon-call class="mr-2 text-primary"/>Parent/Guardian Phone Number *
                                    </label>
                                    <input type="tel" id="parent_phone" wire:model.lazy="parent_phone" required
                                        placeholder="0712345678"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    @error('parent_phone') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <div class="flex items-start">
                                        <input type="checkbox" id="terms" wire:model="terms" required
                                            class="mt-1 mr-3 w-5 h-5 text-primary bg-gray-600 border-gray-300 rounded focus:ring-primary">
                                        <label for="terms" class="text-sm text-gray-700 leading-relaxed">
                                            I agree to the <a href="{{ route('terms.conditions') }}"
                                                class="text-primary hover:underline">terms and
                                                conditions</a>
                                            and confirm that all information provided is accurate and complete. I
                                            understand that
                                            false information may result in application rejection.
                                        </label>
                                    </div>
                                    @error('terms') <span class="text-red-500 text-sm mt-2 block ml-8">
                                        {{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif

                            <!-- Navigation Buttons -->
                            <div class="flex justify-between items-center pt-8 border-t border-gray-200">
                                @if ($currentStep > 1)
                                <button type="button" wire:click="previousStep"
                                    class="flex items-center px-6 py-3 text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors">
                                    <x-ionicon-arrow-back class="mr-2"/>Previous
                                </button>
                                @else
                                <div></div>
                                @endif

                                @if ($currentStep < $totalSteps) <button type="button" wire:click="nextStep"
                                    class="flex items-center px-6 py-3 text-white bg-primary rounded-xl hover:opacity-80 transition-colors">
                                    Next<x-ionicon-arrow-forward class="ml-2"/>
                                    </button>
                                    @else
                                    <button type="submit"
                                        class="flex items-center px-8 py-3 text-white bg-primary rounded-xl hover:opacity-80 transition-colors font-semibold">
                                        <x-ionicon-paper-plane class="mr-2"/>Submit Application
                                    </button>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="mt-12 text-center">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Need Help?</h3>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <x-ionicon-call class="text-primary text-2xl mb-2"/>
                                <h4 class="font-semibold text-gray-800">Call Us</h4>
                                <p class="text-gray-600 text-sm">{{ $setting->phone }}</p>
                            </div>
                            <div class="text-center">
                                <x-ionicon-mail class="text-primary text-2xl mb-2"/>
                                <h4 class="font-semibold text-gray-800">Email Us</h4>
                                <p class="text-gray-600 text-sm">{{ $setting->email }}</p>
                            </div>
                            <div class="text-center">
                                <x-ionicon-location class="text-primary text-2xl mb-2"/>
                                <h4 class="font-semibold text-gray-800">Visit Us</h4>
                                <p class="text-gray-600 text-sm">{{ $setting->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
