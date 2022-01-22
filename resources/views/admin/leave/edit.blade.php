<x-app-layout>
     <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('leave.edit') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Leave	') }}
        </h2>
    </x-slot>
    <div class="p-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass backdrop-filter backdrop-blur-xl">

                    <h3 class="text-xl">Edit Leave for {{ $leave->employee->getFullName() }} (
                        {{ $leave->employee->emp_id }} )</h3>

                    @if ($errors->any())
                        <x-validation-error :errors="$errors" />
                    @endif

                    <form action="{{ route('leave.update', ['leave' => $leave]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 gap-6 ">

                            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">

                                <div class="my-6">
                                    <x-select type="text" label="Leave Type" value="{{ $leave->leave_type }}"
                                        name="leave_type">
                                        <option value="Earned Leave (EL)">Earned Leave (EL)</option>
                                        <option value="Casual Leave (CL)">Casual Leave (CL)</option>
                                        <option value="Sick Leave (SL)">Sick Leave (SL)</option>
                                        <option value="Maternity Leave (ML)">Maternity Leave (ML)</option>
                                        <option value="Compensatory Off (Comp-off)">Compensatory Off (Comp-off)</option>
                                        <option value="Marriage Leave">Marriage Leave</option>
                                        <option value="Paternity Leave">Paternity Leave</option>
                                        <option value="Bereavement Leave"></option>
                                    </x-select>

                                    <div class="my-6">
                                        <x-input type="text" label="Date From" name="date_from"
                                            value="{{ $leave->date_from }}" maxlength="10" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Date To" name="date_to"
                                            value="{{ $leave->date_to }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="No of Days" name="days"
                                            value="{{ $leave->days }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Reason" name="reason"
                                            value="{{ $leave->reason }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Notes" name="notes" value="{{ $leave->notes }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-select type="text" label="Update Status" 
											
											 name="status" id="status"  
                                            
                                                value="test">
                                            <option value="{{$leave->status}}">{{$leave->status}}</option>
                                            <option value="Unapproved">Unapproved</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                        </x-select>
                                    </div>
                                </div>
                                <span class="flex items-right justify-center my-3 space-x-3 px-4">
                                    <x-button color="red">Update
                                    </x-button>

                                    <x-link-button color="blue" href="{{ route('leave.index') }}" bg-blue>Back
                                    </x-link-button>
                                </span>
                            </div>
						</div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
 