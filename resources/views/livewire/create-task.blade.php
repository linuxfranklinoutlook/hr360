
 
 
    <!DOCTYPE html>
    <html>
 
    <head>
       <title>Create Project </title>
      
       <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
       @livewireStyles()
    </head>
 
    <body>
 
       
      <div class="py-6 relative">
         <div class="max-w-9xl mx-auto sm:px-4 lg:px-4 sm:rounded-lg">
            <div
               class="max-w-9xl mx-auto backdrop-filter  backdrop-blur-xl px-3 py-3 rounded-md shadow my-7 bg-gray-100 p-8">
               <div class="overflow-hidden shadow-sm sm:rounded-lg p-6">

                  <div class="p-1 bg-white rounded-md px-15 py-15 text-center">
                   
                      <h3 class="text-sm">Assign a  Task</h3>
                  
                </div>
 
 
 
                @if ($errors->any())
                   <div class="alert alert-danger">
                      <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                   </div>
                @endif
 
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   
                      <div class="my-6  p-1 ">
                         <x-select type="text" label="Project Name" name="project_id" id="project_id"
                            value="{{ old('project_name') }}">
                            @foreach ($projects as $project)
                               <option value="{{ $project->id }}">
                                  {{ $project->project_name }}</option>
                            @endforeach
                         </x-select>
                         {{-- <div class="my-6">
                            <x-select label="Assigned to Position *" name="desigination">
                               <option value="HR Management">HR Management</option>
                               <option value="Finance Admin">Finance Admin</option>
                               <option value="IT Admin">IT Admin</option>
                               <option value="Full Stack Developer">Full Stack Developer</option>
                               <option value="Full Stack Developer & Tech Support">Full Stack Developer & Tech Support</option>
                               <option value="Flutter Developer">Flutter Developer</option>
                               <option value="Quality Analyst">Quality Analyst</option>
                               <option value="Marketing/Sales">Marketing/Sales</option>
                               <option value="DevOps & s/w Developer">DevOps & s/w developer</option>
                               <option value="Product Manager">Product Manager</option>
                               <option value="Project Manager">Project Manager</option>
                               <option value="UI/UX Developer">UI/UX Developer</option>
                               <option value="Front End Developer">Front End Developer</option>
                               <option value="Founder">Founder</option>
                               <option value="Co-Founder">Co-Founder</option>
                               <option value="Others">Others</option>
 
                            </x-select>
                         </div> --}}
                         <div class="my-6  p-1 ">
                            <x-select type="text" label="Assign To" name="employee_id"
                               id="assign_to_managers[]" value="{{ old('assign_to_managers') }}" >
                               @foreach ($employees as $employee)
                                  <option value="{{ $employee->id }}">
                                     {{ $employee->getFullName() }}</option>
                               @endforeach
                            </x-select>
                         </div>
                         
                         {{-- <div class="my-6 p-1">
                            <x-input type="text" class="date" label="Starting Date" name="starting_date"
                               id="starting_date" value="{{ old('starting_date') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" class="date" label="Ending Date" name="ending_date"
                               id="ending_date" value="{{ old('ending_date') }}" />
                         </div> --}}
                         <x-select name="task_status" id="task_status" label="Task Status">
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                            <option value="Limbo">Limbo </option>
                         </x-select>
                         <div class="my-6 p-1">
                            <x-textarea type="text" label="Notes" name="notes">
                               {{ old('notes') }}</x-textarea>
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
    @livewireScripts()
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
       integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
       integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
       integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
       integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
       crossorigin="anonymous"></script>

 