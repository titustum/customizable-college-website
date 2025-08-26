<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Department;

new
#[Title('Courses')] 
class extends Component
{
    public $search = '';
    public $department = '';
    public $page = 1;

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

    public function departments()
    {
        return Department::with(['courses' => function ($query) {
            $query->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }])
        ->when($this->department, function ($query) {
            $query->where('name', $this->department);
        })
        ->get();
    }
};
?>

<section class="min-h-screen py-16 bg-gray-100 to-orange-200">
    <div class="container px-4 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-orange-600">Explore Our Courses</h1>

        <div class="flex flex-col mb-8 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
            <div class="flex-grow">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search courses..."
                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model.live="department" wire:key="department-select"
                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
                    <option value="">All Departments</option>
                    @foreach($this->departments() as $dept)
                    <option value="{{ $dept->name }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @foreach($this->departments() as $department)
        @if(count($department->courses) > 0)
        <div class="mb-12 overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="p-6">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('storage/'. $department->photo) }}" alt="{{ $department->name }}"
                        class="object-cover w-16 h-16 mr-4 border rounded-full">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $department->name }}</h2>
                </div>

                <div class="mb-6 overflow-x-auto">
                    <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                        <thead class="text-white bg-orange-600">
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
                                    <div class="font-medium">{{$course->name}}</div>
                                    <div class="text-sm text-gray-500 sm:hidden">{{$course->requirement}}</div>
                                    <div class="text-sm text-gray-500 sm:hidden md:hidden">{{$course->duration}} |
                                        {{$course->exam_body}}</div>
                                </td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 sm:table-cell">{{$course->requirement}}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{$course->duration}}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{$course->exam_body}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>