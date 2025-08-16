<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\TeamMember;
use App\Models\Role;
use App\Models\Department;

new
#Title('Team Members') 
class extends Component
{
    public $search = '';
    public $department = '';
    public $roleOrder = [];
    public $departments = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'department' => ['except' => ''],
    ];

    public function mount()
    {
        $this->departments = Department::pluck('name');
        $this->roleOrder = [
            'Principal',
            'Deputy Principal',
            'HOD',
            'Registrar',
            'Dean of Students',
            'Finance Officer',
            'Academic Officer',
            'Web Master',
            'Internal Auditor',
            'Research & Innovations Officer',
            'Trainer',
            'Others'
        ];
    }

    public function teamMembers()
    {
        return TeamMember::with(['role', 'department'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->department, function ($query) {
                $query->whereHas('department', function ($q) {
                    $q->where('name', $this->department);
                });
            })
            ->get()
            ->groupBy('role.name');
    }

}
?>

<section class="min-h-screen py-16 bg-gradient-to-br from-orange-100 to-orange-200">
    <div class="container px-4 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-orange-600">Our Team</h1>

        <div class="flex flex-col mb-8 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
            <div class="flex-grow">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search team members..."
                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model="department"
                    class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
                    <option value="">All Departments</option>
                    @foreach($this->departments() as $dept)
                    <option value="{{ $dept }}">{{ $dept }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @foreach($roleOrder as $role)
        @if(isset($this->teamMembers()[$role]))
        <div class="mb-12">
            <h2 class="mb-6 text-2xl font-semibold text-orange-600">
                {{ $role }}@if($role != 'Others')s@endif
            </h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($this->teamMembers()[$role] as $member)
                <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                    @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                        class="object-cover w-full h-48">
                    @else
                    <div class="flex items-center justify-center w-full h-48 bg-gray-200">
                        <span class="text-gray-500">No image available</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold text-orange-600">{{ $member->name }}</h3>
                        <p class="mb-2 text-gray-600"><strong>Department:</strong> {{ $member->department->name }}</p>
                        <p class="mb-2 text-gray-600"><strong>Qualification:</strong> {{ $member->qualification }}</p>
                        <p class="text-gray-600"><strong>Experience:</strong> {{ $member->experience }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>