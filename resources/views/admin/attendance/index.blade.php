<x-app-layout>

    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('attendance') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance Management') }}
        </h2>
    </x-slot> 

    <div class="py-6 relative">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 card">
                    <h3 class="text-4xl">Employees Attendance Details</h3>

                    <div class="my-4">
                        <x-link-button color="blue" href="{{ route('attendance.create') }}">Mark Attendance
                        </x-link-button>
                    </div>
                    <form action="{{ route('attendance.show','date') }}" method="GET">
                        <div class="flex items-center space-x-3 flex-wrap gap-2">
                           <span class="flex-1">
                               <x-select name="id" label="Select Employee">
                                @foreach ($employees as $emp)
                                   <option value={{ $emp->id }}>
                                   {{ $emp->getFullName()}}
                                   </option>
                                   @endforeach
                               </x-select>
                              <x-input type="date" class="datepicker" name="from_date"
                                 placeholder="Search  by starting Date" label="Search  by starting Date" />
                                 <x-input type="date" name="to_date"
                                 placeholder="Search  by Ending Date" label="Search  by ending  Date" />
                              <x-button>Submit</x-button>
                              <x-link-button color="red" href="{{ route('attendance.index') }}">Clear Filters
                              </x-link-button>
                           </span>
                        </div>
                     </form>

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
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Notes
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($attendances as $attendance)
                                                    {{-- <tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}"> --}}
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $attendance->employees->getFullName() }}

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $attendance->employees->emp_id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $attendance->created_at }}

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $attendance->status }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $attendance->notes }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('attendance.edit', ['attendance' => $attendance->id]) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                <!-- Odd row -->
                                                <!-- More people... -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="my-3">
                                        {{-- {{ $attendance->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    