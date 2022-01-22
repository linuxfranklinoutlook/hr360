<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('tasks') }}
   </x-slot>

   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Edit Tasks') }}
      </h2>
   </x-slot>

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
         <div class="py-6 relative max-w-8xl mx-auto sm:px-9 lg:px-8  bg-gray-10 sm:rounded-lg">

            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">
               <span class="flex items-center justify-between py-3  ">
                  <h3 class="text-2xl text-white">Edit or Update
                  </h3>
               </span>
                 
            </div>

            


            <div class="backdrop-filter max-w-8xl mx-auto backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">





                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

                  <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PATCH')

                     <div class="my-6  p-1 ">
                        <x-select type="text" label="Project Name" name="project_id" id="project_id"
                           value="{{ old('project_name') }}">

                           <option value="{{ $task->projects->id }}">
                              {{ $task->projects->project_name }}</option>

                        </x-select>
                        {{-- <div class="my-6">
                           <x-select label="Assigned to Position *" name="desigination">
                              <option value="{{ $task->employees->desigination }}">
                                 {{ $task->employees->desigination }}</option>
                              <option value="HR Management">HR Management</option>
                              <option value="Finance Admin">Finance Admin</option>
                              <option value="IT Admin">IT Admin</option>
                              <option value="Full Stack Developer">Full Stack Developer</option>
                              <option value="Full Stack Developer & Tech Support">Full Stack Developer & Tech
                                 Support</option>
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
                           <x-select type="text" label="Assign To" name="employee_id" id="assign_to_managers[]"
                              value="{{ old('assign_to_managers') }}">

                              <option value="{{ $task->employees->id }}">
                                 {{ $task->employees->getFullName() }}</option>
                              @foreach ($employees as $employee)
                                 <option>{{ $employee->getFullName() }}</option>

                              @endforeach

                           </x-select>
                        </div>

                        <div class="my-6 p-1">
                           <x-input type="text" class="date" label="Starting Date" name="requested_on"
                              id="starting_date" value="{{ $task->projects->requested_on }}" />
                        </div>
                        <div class="my-6 p-1">
                           <x-input type="text" class="date" label="Ending Date" name="delivered_on"
                              id="ending_date" value="{{ $task->projects->delivered_on  }}" />
                        </div>
                        <x-select name="task_status" id="task_status" label="Task Status">
                           <option value="{{ $task->task_status }}">{{ $task->task_status }}</option>
                           <option value="Completed">Completed</option>
                           <option value="Pending">Pending</option>
                           <option value="Limbo">Limbo </option>
                        </x-select>
                        <div class="my-6 p-1">
                           <x-textarea type="text" label="Notes" name="notes">
                              {{ old('notes') }}</x-textarea>
                        </div>
                        <div
                        class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">

                        <div class="grid grid-cols-3 gap-4 p-6">
                           <span class="flex items-right justify-center my-3 space-x-3 px-4">
                              <x-button color="green">Update</x-button>
         
                           </span>
                     </form>
                     <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <span class="flex items-right justify-center my-3 space-x-3 px-4">
                           <x-button color="red">Delete
                           </x-button>
                        </span>
                     </form>
         
         
                     <span class="flex items-right justify-center my-3 space-x-3 px-4">
                        <x-link-button color="black" href=" {{ route('tasks.index') }}">Back
                        </x-link-button>
                     </span>
         
                  </div>
                       
                  </form>
               </div>
            </div>
         </div>
      </div>



   </body>

   </html>
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
</x-app-layout>