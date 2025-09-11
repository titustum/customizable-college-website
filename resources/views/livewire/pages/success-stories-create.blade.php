<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\SuccessStory;
use App\Models\Department;
use App\Models\Course;
use Livewire\WithFileUploads;

new
#[Title('Create Success Story | Tetu Technical & Vocational College')]
class extends Component
{
    use WithFileUploads;

    public $name;
    public $department_id;
    public $course;
    public $year;
    public $occupation;
    public $company;
    public $statement;
    public $photo;
    public $rating = 5;

    public function with()
    {
        return [
            'departments' => Department::select('id', 'name')->get(),
        ];
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'course' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'occupation' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'statement' => 'required|string|max:2000',
            'photo' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Store the uploaded photo
        if ($this->photo) {
            $validated['photo'] = $this->photo->store('success_stories', 'public');
        }

        // Save to database
        SuccessStory::create($validated);

        // Optional: flash success message and reset
        session()->flash('success', 'Your story has been submitted! Once approved, you’ll join the ranks of our amazing alumni who are shaping the future through skills learned at Tetu Technical & Vocational College.');
        $this->reset();
    }
};
?>



<main class="overflow-hidden">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Tetu TVC Campus"
                class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h1 class="mb-2 text-4xl font-bold text-white md:text-5xl lg:text-6xl">Create Success Story</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">Share your journey and inspire others</p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-3xl mx-auto mb-12 text-center" data-aos="fade-up">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Share Your Success Story</h2>
                <p class="text-lg text-gray-600">We'd love to hear about your experiences and achievements after
                    graduating from Tetu Technical & Vocational College. Your story can inspire others!</p>
            </div>

            <!-- Flash Success -->
            @if (session()->has('success'))
            <div class="max-w-3xl mx-auto mb-6 text-green-700 bg-green-100 p-4 rounded">
                {{ session('success') }}
            </div>
            @endif

            <form wire:submit.prevent="submit" class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" wire:model.defer="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Department -->
                <div class="mb-6">
                    <label for="department_id" class="block mb-2 text-sm font-medium text-gray-700">Department</label>
                    <select id="department_id" wire:model.defer="department_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="" disabled>Select your department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Course -->
                <div class="mb-6">
                    <label for="course" class="block mb-2 text-sm font-medium text-gray-700">Course Studied</label>
                    <input type="text" id="course" wire:model.defer="course" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('course') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Year of Graduation -->
                <div class="mb-6">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-700">Graduation Year</label>
                    <input type="text" id="year" wire:model.defer="year" required maxlength="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('year') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Occupation -->
                <div class="mb-6">
                    <label for="occupation" class="block mb-2 text-sm font-medium text-gray-700">
                        Current Occupation <span class="text-sm text-gray-500">(e.g., Salonist, Engineer,
                            Plumber)</span>
                    </label>
                    <input type="text" id="occupation" wire:model.defer="occupation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('occupation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Company -->
                <div class="mb-6">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-700">
                        Company / Organization <span class="text-sm text-gray-500">(e.g., Safaricom, ABC
                            Electricals)</span>
                    </label>
                    <input type="text" id="company" wire:model.defer="company" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('company') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Statement -->
                <div class="mb-6">
                    <label for="statement" class="block mb-2 text-sm font-medium text-gray-700">
                        Share Your Story <span class="text-sm text-gray-500">(Tell us about your experience at Tetu TVC,
                            how
                            it helped you, and where you are now)</span>
                    </label>
                    <textarea id="statement" wire:model.defer="statement" rows="6" required
                        placeholder="e.g. Tetu TVC gave me hands-on skills in plumbing that helped me start my own business..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                    @error('statement') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>


                <div class="mb-6">
                    <label for="rating" class="block mb-2 text-sm font-medium text-gray-700">
                        Rate Your Experience <span class="text-gray-500 text-sm">(1 = poor, 5 = excellent)</span>
                    </label>
                    <input type="range" id="rating" wire:model.defer="rating" min="1" max="5" step="1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-orange-500">
                    <div class="flex justify-between text-sm text-gray-600 mt-1 px-1">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                    </div>
                    @error('rating') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>


                <!-- Photo Upload -->
                <div class="mb-6">
                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-700">Upload a Photo</label>
                    <input type="file" id="photo" wire:model="photo" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('photo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                    @if ($photo)
                    <div class="mt-4">
                        <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview"
                            class="w-32 h-32 object-cover rounded-lg">
                    </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="px-6 py-3 text-white bg-orange-600 hover:bg-orange-700 font-semibold rounded-lg shadow-lg transition duration-300">
                        Submit Story
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>