<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Department;
use App\Models\Applicant;
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
        $options = [];
        $terms = [
            'January' => 1,
            'May' => 5,
            'September' => 9
        ];

        $termEntries = [];

        // Current & upcoming terms
        foreach ($terms as $label => $month) {
            $year = ($currentDate->month <= $month) ? $currentDate->year : $currentDate->year + 1;
            $termDate = Carbon::create($year, $month, 1);

            if ($currentDate->lte($termDate)) {
                $key = strtolower(substr($label, 0, 3)) . "_{$year}";
                $termEntries[$termDate->timestamp] = [$key, "$label $year"];
            }
        }

        // Next two years
        for ($i = 1; $i <= 2; $i++) {
            foreach ($terms as $label => $month) {
                $year = $currentDate->year + $i;
                $termDate = Carbon::create($year, $month, 1);
                $key = strtolower(substr($label, 0, 3)) . "_{$year}";
                $termEntries[$termDate->timestamp] = [$key, "$label $year"];
            }
        }

        ksort($termEntries); // Sort by timestamp

        foreach ($termEntries as [$key, $label]) {
            $options[$key] = $label;
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

        Applicant::create([
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'alternative_phone' => $this->alternative_phone,
            'gender' => $this->gender,
            'id_number' => $this->id_number,
            'course_id' => $this->course_id,
            'start_term' => $this->start_term,
            'high_school' => $this->high_school,
            'high_school_grade' => $this->high_school_grade,
            'kcse_index_number' => $this->kcse_index_number,
            'kcse_year' => $this->kcse_year,
            'nemis_upi_number' => $this->nemis_upi_number,
            'parent_name' => $this->parent_name,
            'parent_phone' => $this->parent_phone,
        ]);

        session()->flash('message', 'Application submitted successfully! You will receive a confirmation SMS shortly.');

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
    <section class="relative py-16 bg-gradient-to-r from-orange-600 to-orange-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Apply to Tetu Technical College</h1>
                <p class="text-xl text-white/90 mb-8">Take the first step towards your future career. Complete your
                    application in just a few minutes.</p>

                <!-- Progress Indicator -->
                <div class="flex justify-center items-center space-x-4 mb-8">
                    @for ($i = 1; $i <= $totalSteps; $i++) <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold
                                {{ $i <= $currentStep ? 'bg-white text-orange-600' : 'bg-white/20 text-white/60' }}">
                            {{ $i }}
                        </div>
                        @if ($i < $totalSteps) <div class="w-8 h-1 mx-2 
                                    {{ $i < $currentStep ? 'bg-white' : 'bg-white/20' }}">
                </div>
                @endif
            </div>
            @endfor
        </div>

        <!-- Step Labels -->
        <div class="text-sm text-white/80">
            Step {{ $currentStep }} of {{ $totalSteps }}:
            @if($currentStep == 1) Personal Information
            @elseif($currentStep == 2) Academic Background
            @elseif($currentStep == 3) Course Selection
            @else Parent/Guardian Information
            @endif
        </div>
        </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                @if (session()->has('message'))
                <div
                    class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-8 flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
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
                                        <i class="fas fa-user text-orange-600 text-2xl"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>
                                    <p class="text-gray-600">Tell us about yourself</p>
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <i class="fas fa-user mr-2 text-orange-500"></i>Full Name *
                                        </label>
                                        <input type="text" id="full_name" wire:model.lazy="full_name" required
                                            placeholder="Enter your full name"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                        @error('full_name') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <i class="fas fa-phone mr-2 text-orange-500"></i>Phone Number *
                                        </label>
                                        <input type="tel" id="phone" wire:model.lazy="phone" required
                                            placeholder="0712345678"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                        @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alternative_phone"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone-alt mr-2 text-gray-400"></i>Alternative Phone Number
                                    </label>
                                    <input type="tel" id="alternative_phone" wire:model.lazy="alternative_phone"
                                        placeholder="Optional alternative number"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    @error('alternative_phone') <span class="text-red-500 text-sm mt-1 block">{{
                                        $message }}</span> @enderror
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <i class="fas fa-venus-mars mr-2 text-orange-500"></i>Gender *
                                        </label>
                                        <select id="gender" wire:model="gender" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
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
                                            <i class="fas fa-id-card mr-2 text-orange-500"></i>ID Number/Birth
                                            Certificate *
                                        </label>
                                        <input type="text" id="id_number" wire:model.lazy="id_number" required
                                            placeholder="Enter ID or Birth Certificate number"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
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
                                        <i class="fas fa-graduation-cap text-orange-600 text-2xl"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Academic Background</h2>
                                    <p class="text-gray-600">Your educational history</p>
                                </div>

                                <div class="form-group">
                                    <label for="high_school" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-school mr-2 text-orange-500"></i>High School Name *
                                    </label>
                                    <input type="text" id="high_school" wire:model.lazy="high_school" required
                                        placeholder="Enter your high school name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    @error('high_school') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="high_school_grade"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-award mr-2 text-orange-500"></i>High School Grade *
                                    </label>
                                    <input type="text" id="high_school_grade" wire:model.lazy="high_school_grade"
                                        required placeholder="e.g., C+, B-, A"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    @error('high_school_grade') <span class="text-red-500 text-sm mt-1 block">{{
                                        $message }}</span> @enderror
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div class="form-group">
                                        <label for="kcse_index_number"
                                            class="block text-sm font-semibold text-gray-700 mb-2">
                                            <i class="fas fa-hashtag mr-2 text-orange-500"></i>KCSE Index Number *
                                        </label>
                                        <input type="text" id="kcse_index_number" wire:model.lazy="kcse_index_number"
                                            required placeholder="Enter KCSE index number"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                        @error('kcse_index_number') <span class="text-red-500 text-sm mt-1 block">{{
                                            $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kcse_year" class="block text-sm font-semibold text-gray-700 mb-2">
                                            <i class="fas fa-calendar mr-2 text-orange-500"></i>KCSE Year *
                                        </label>
                                        <input type="number" id="kcse_year" wire:model.lazy="kcse_year" required
                                            placeholder="{{ date('Y') }}" min="1990" max="{{ date('Y') }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                        @error('kcse_year') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nemis_upi_number"
                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-fingerprint mr-2 text-gray-400"></i>NEMIS/UPI Number
                                    </label>
                                    <input type="text" id="nemis_upi_number" wire:model.lazy="nemis_upi_number"
                                        placeholder="Optional - if available"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
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
                                        <i class="fas fa-building mr-2 text-orange-500"></i>Department *
                                    </label>

                                    <select wire:model.live="department_id"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                        <option value="">Select a department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('department_id') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <!-- Course Selection -->
                                <div class="form-group">
                                    <label for="courseId" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-book-open mr-2 text-orange-500"></i>Desired Course of Study *
                                    </label>
                                    <select id="courseId" wire:model="course_id" @if(is_null($department_id)) disabled
                                        @endif required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
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
                                        <i class="fas fa-calendar-alt mr-2 text-orange-500"></i>Intended Start Term *
                                    </label>
                                    <select id="start_term" wire:model="start_term" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
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
                                        <i class="fas fa-users mr-2 text-orange-600 text-2xl"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800">Parent/Guardian Information</h2>
                                    <p class="text-gray-600">Emergency contact details</p>
                                </div>

                                <div class="form-group">
                                    <label for="parent_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-user-tie mr-2 text-orange-500"></i>Parent/Guardian Name *
                                    </label>
                                    <input type="text" id="parent_name" wire:model.lazy="parent_name" required
                                        placeholder="Enter parent/guardian full name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    @error('parent_name') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parent_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-2 text-orange-500"></i>Parent/Guardian Phone Number *
                                    </label>
                                    <input type="tel" id="parent_phone" wire:model.lazy="parent_phone" required
                                        placeholder="0712345678"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    @error('parent_phone') <span class="text-red-500 text-sm mt-1 block">{{ $message
                                        }}</span> @enderror
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <div class="flex items-start">
                                        <input type="checkbox" id="terms" wire:model="terms" required
                                            class="mt-1 mr-3 w-5 h-5 text-orange-600 bg-gray-600 border-gray-300 rounded focus:ring-orange-500">
                                        <label for="terms" class="text-sm text-gray-700 leading-relaxed">
                                            I agree to the <a href="{{ route('terms.conditions') }}"
                                                class="text-orange-600 hover:underline">terms and
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
                                    <i class="fas fa-arrow-left mr-2"></i>Previous
                                </button>
                                @else
                                <div></div>
                                @endif

                                @if ($currentStep < $totalSteps) <button type="button" wire:click="nextStep"
                                    class="flex items-center px-6 py-3 text-white bg-orange-600 rounded-xl hover:bg-orange-700 transition-colors">
                                    Next<i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                    @else
                                    <button type="submit"
                                        class="flex items-center px-8 py-3 text-white bg-orange-600 rounded-xl hover:bg-orange-700 transition-colors font-semibold">
                                        <i class="fas fa-paper-plane mr-2"></i>Submit Application
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
                                <i class="fas fa-phone text-orange-500 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-gray-800">Call Us</h4>
                                <p class="text-gray-600 text-sm">+254 712 345 678</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-envelope text-orange-500 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-gray-800">Email Us</h4>
                                <p class="text-gray-600 text-sm">admissions@tetutvc.ac.ke</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-map-marker-alt text-orange-500 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-gray-800">Visit Us</h4>
                                <p class="text-gray-600 text-sm">Tetu Technical College</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>