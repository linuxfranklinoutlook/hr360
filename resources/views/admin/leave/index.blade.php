<x-app-layout>

            <x-slot name="breadcrumbs">
                {{ Breadcrumbs::render('leave') }}
            </x-slot>

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Leave Management') }}
                </h2>
            </x-slot>

    <div class="py-6 relative">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 card">
                    <h3 class="text-4xl">Listing all Employees who have Taken/ Applied Leave</h3>

                    <div class="my-4">
                        <x-link-button color="blue" onClick="Livewire.emit('openModal', 'leave-create')">Create New
                        </x-link-button>
                        {{-- <x-link-button color="blue" href="{{ route('salary.create') }}">Create</x-link-button> --}}
                    </div>
                    <form action="" method="GET">
                        <div class="flex flex-col my-6">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Employee Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Employee ID
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Leave Type
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        No.of.Days
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Reason
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>

                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leave_data as $data)

                                                    <tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->employee->getFullName() }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            <x-link
                                                                href="{{ route('leave.show', ['leave' => $data->id]) }}">
                                                                {{ $data->employee->emp_id }}</x-link>
                                                        </td>



                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->leave_type }}
                                                        </td>


                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->days }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->reason }}
                                                        </td>

                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->status }}



                                                        </td>

                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="{{ route('leave.edit', ['leave' => $data->id]) }}"
                                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="my-3">
                                        {{ $leave_data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
