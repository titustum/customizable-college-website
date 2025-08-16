<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Department;
use App\Models\Application;
use Carbon\Carbon;

new
#[Title('Apply Now')] 
class extends Component
{ 
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

    public function mount()
    {
        $this->departments = Department::all();
        $this->courses = Course::all();
        $this->startTermOptions = $this->getStartTermOptions();
    }
 

    public function getStartTermOptions(): array
    {
        $currentDate = Carbon::now();
        $options = [];
        $terms = [
            'May' => 5,
            'September' => 9,
            'January' => 1
        ];

        // Add current term dynamically
        foreach ($terms as $label => $month) {
            $year = ($currentDate->month <= $month) ? $currentDate->year : $currentDate->year + 1;
            $termDate = Carbon::create($year, $month, 1);

            // Ensure we include the current term and upcoming terms
            if ($currentDate->gte(Carbon::create($currentDate->year, $month, 1)) || $currentDate->lte($termDate)) {
                $key = strtolower(substr($label, 0, 3)) . "_{$year}";
                $options[$key] = "$label $year";
            }
        }

        // Add terms for the next two years dynamically
        for ($i = 1; $i <= 2; $i++) {
            foreach ($terms as $label => $month) {
                $year = $currentDate->year + $i;
                $termDate = Carbon::create($year, $month, 1);
                $key = strtolower(substr($label, 0, 3)) . "_{$year}";
                $options[$key] = "$label $year";
            }
        }

        return $options;
    }



    public function submitApplication()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'gender' => 'required|in:male,female,other',
            'id_number' => 'required|string|max:255',
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

        Application::create([
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

        session()->flash('message', 'Application submitted successfully!');
        $this->reset();
        $this->startTermOptions = $this->getStartTermOptions(); // Refresh start term options
        $this->courses = []; // Clear courses after submission 
    }
}

?>

<main>
    <section class="w-full px-4 py-16 bg-gray-50">
        <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
            <h2 class="mb-8 text-2xl font-bold text-center text-gray-800 lg:text-3xl">Student Application Form</h2>

            @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('message') }}
            </div>
            @endif

            <form wire:submit.prevent="submitApplication" class="space-y-6" data-aos="fade-up">

                <div>
                    <label for="courseId" class="block mb-2 font-medium text-gray-700">Desired Course of Study</label>
                    <select id="courseId" wire:model="course_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"
                        @if(count($courses)==0) disabled @endif>
                        <option value="">Select a course</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->department->name }} - {{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="full_name" class="block mb-2 font-medium text-gray-700">Full Name</label>
                        <input type="text" id="full_name" wire:model="full_name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone" wire:model="phone" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div>
                    <label for="alternative_phone" class="block mb-2 font-medium text-gray-700">Alternative Phone
                        (Optional)</label>
                    <input type="tel" id="alternative_phone" wire:model="alternative_phone"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="gender" class="block mb-2 font-medium text-gray-700">Gender</label>
                        <select id="gender" wire:model="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                            <option value="">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="id_number" class="block mb-2 font-medium text-gray-700">ID No./Birth Cert.</label>
                        <input type="text" id="id_number" wire:model="id_number" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div>
                    <label for="high_school" class="block mb-2 font-medium text-gray-700">High School Name</label>
                    <input type="text" id="high_school" wire:model="high_school" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div>
                    <label for="high_school_grade" class="block mb-2 font-medium text-gray-700">High School
                        Grade</label>
                    <input type="text" id="high_school_grade" wire:model="high_school_grade" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="kcse_index_number" class="block mb-2 font-medium text-gray-700">KCSE Index
                            Number</label>
                        <input type="text" id="kcse_index_number" wire:model="kcse_index_number"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                    <div>
                        <label for="kcse_year" class="block mb-2 font-medium text-gray-700">KCSE Year</label>
                        <input type="number" id="kcse_year" wire:model="kcse_year"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div>
                    <label for="nemis_upi_number" class="block mb-2 font-medium text-gray-700">NEMIS/UPI Number (If
                        Applicable)</label>
                    <input type="text" id="nemis_upi_number" wire:model="nemis_upi_number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div>
                    <label for="parent_name" class="block mb-2 font-medium text-gray-700">Parent/Guardian Name</label>
                    <input type="text" id="parent_name" wire:model="parent_name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>
                <div>
                    <label for="parent_phone" class="block mb-2 font-medium text-gray-700">Parent/Guardian Phone
                        Number</label>
                    <input type="tel" id="parent_phone" wire:model="parent_phone" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div>
                    <label for="start_term" class="block mb-2 font-medium text-gray-700">Intended Start Term</label>
                    <select id="start_term" wire:model="start_term" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="">Select a term</option>
                        @foreach($startTermOptions as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" wire:model="terms" required class="mr-2">
                    <label for="terms" class="text-gray-700">I agree to the terms and conditions</label>
                </div>

                <button type="submit"
                    class="w-full px-6 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-md hover:bg-orange-700">Submit
                    Application</button>
            </form>
        </div>
    </section>
</main>