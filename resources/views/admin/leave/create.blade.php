<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leave Management') }}
        </h2>
    </x-slot>

<div>
	<x-button onClick="Livewire.emit('openModal', 'leave-create')">Create Leave</x-button>
</div>
</x-app-layout>
