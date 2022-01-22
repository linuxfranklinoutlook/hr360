<!DOCTYPE html>
<html>
<head>
  <title>Laravel Bootstrap Datepicker</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>

           <div class="p-6 bg-blue">
               <h3 class="text-2xl">Create Leave</h3>
               <div class="overflow-hidden shadow-sm sm:rounded-lg ">
                   {{-- @if ($errors->any())
                       <x-validation-error :errors="$errors" />
                   @endif --}}
                   @if ($errors->any())
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif

                   <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf

                       <x-select label="Employee Name" name="id"
                           onchange="document.getElementById('employee_id').value=this.options[this.selectedIndex].value;">
                           // document.getElementById('full_name').value=this.options[this.selectedIndex].text;">
                           @foreach ($employee as $emp)
                               <option value="{{ $emp->id }}">{{ $emp->getFullName() }}
                               </option>
                           @endforeach
                       </x-select>
                       <input type="hidden" value="" id="employee_id" name="employee_id">
                       <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                           <span class="flex items-center justify-between py-3  ">
                               <h3 class="antialiased">Enter leave details </h3>
                           </span>
                           <div class="my-6">
                               <x-select type="text" label="Leave Type" value="{{ old('leave_type') }}"
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
                           </div>
                           <div class="my-6">
                               <x-input type="text" label="Date From" class="date" name="date_from"
                                   value="{{ old('date_from') }}" />
                           </div>
                           <div class="my-6">
                               <x-input type="text" label="Date To" class="date" name="date_to"
                                   value="{{ old('date_to') }}" />
                           </div>
                           {{-- <div class="my-6">
                               <x-input type="number" label="No.of Days" name="days" value="{{ old('days') }}" />
                           </div> --}}
                           <div class="my-6">
                               <x-input type="text" label="Reason" name="reason" value="{{ old('reason') }}" />
                           </div>
                           <div class="my-6">
                               <x-input type="text" label="Notes" name="notes" value="{{ old('notes') }}" />
                           </div>
                       </div>
                       <span class="flex items-right justify-center my-3 space-x-3 px-4">
                           <x-button>Submit</x-button>
                       </span>
                   </form>
               </div>
           </div>
</body>
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
