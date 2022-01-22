<x-app-layout>
	<x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('salary.create') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salary Management') }}
        </h2>
    </x-slot>

<div>
	<x-button onClick="Livewire.emit('openModal', 'salary-create-structure')">Add New Record</x-button>
</div>
</x-app-layout>
