<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('leave.show') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salary  Management- Viewing Salary : ' . $leave->employee->getFullName()) }}
        </h2>
    </x-slot>
    <div class="py-6 relative">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-8 ">

            <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl bg-white">
                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 bg-white ">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl">
                            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                                <span class="flex items-center justify-between py-3  ">
                                    <h3 class="text-3xl">{{ $leave->employee->getFullName() }}
                                    </h3>
                                    {{-- <x-badge color="green">{{ $employee->emp_type }}</x-badge> --}}
                            </div>

                        </div>
                        <div class="grid grid-cols-1 gap-2 ">
                            <div
                                class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <strong>Leave Information</strong>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Leave Type </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->leave_type }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Date From </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->date_from }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Date To </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->date_to }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> No of days </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->days }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Reason </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->reason }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Notes</strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $leave->notes }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Status </strong>
                                    </dt>

                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        
                                           {{$leave->status}}
                                       
                                    </dd>
                                </div>
                            </div>

                        </div>
                        <div
                            class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify ">
                            <div class="grid grid-cols-2 gap-3 ">


                                <span class="flex justify-end my-2 space-x-1 px-1 bg-auto">
                                    <x-link-button color="black"
                                        href="{{ route('leave.edit', ['leave' => $leave->id]) }}">Edit
                                    </x-link-button>
                                    <x-link-button color="blue" href=" {{ route('leave.index') }}">Back
                                    </x-link-button>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
