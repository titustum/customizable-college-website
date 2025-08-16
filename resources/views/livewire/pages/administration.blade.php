<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\TeamMember;
use App\Models\Role;
use Illuminate\View\View;

new
#[Title('Administrative Staff')] 
class extends Component
{
    public $administrativeStaff;

    public function mount(): void
    {
        $adminRoles = [
            'Dean of Students', 
            'Registrar', 
            'Principal', 
            'Finance Officer',
            'Secretary'
        ];

        $this->administrativeStaff = TeamMember::whereHas('role', function ($query) use ($adminRoles) {
            $query->whereIn('name', $adminRoles);
        })->get();
    }
     
}

?>

<main class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">Our Administrative Leadership</h1>

        @if ($administrativeStaff->isEmpty())
        <p class="text-center text-gray-600">No administrative leadership members found.</p>
        @else
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($administrativeStaff as $staff)
            <div data-aos="fade-up" class="p-6 text-center bg-white rounded-lg shadow-md">
                @if ($staff->photo)
                <img src="{{ asset('storage/'.$staff->photo) }}" alt="{{ $staff->name }}"
                    class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                @else
                <div class="flex items-center justify-center w-32 h-32 mx-auto mb-4 bg-gray-300 rounded-full">
                    <svg class="w-16 h-16 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-800">{{ $staff->name }}</h3>
                <p class="text-gray-600">{{ $staff->role->name }}</p>
                @if ($staff->department)
                <p class="text-sm text-gray-500">{{ $staff->department->name }}</p>
                @endif
                @if ($staff->email)
                <p class="text-sm text-blue-500"><a href="mailto:{{ $staff->email }}">{{ $staff->email }}</a></p>
                @endif
                {{-- You can add more details here as needed --}}
            </div>
            @endforeach
        </div>
        @endif
    </div>
</main>