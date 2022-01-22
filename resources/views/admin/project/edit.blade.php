<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('projects.create') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Update Project ') }}
      </h2>
   </x-slot>



   <!DOCTYPE html>
   <html>

   <head>
      <title>Update Project </title>
      
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

            <form action="{{ route('projects.update', ['project' => $project]) }}" method="POST"
               enctype="multipart/form-data">
               @csrf
               @method('PATCH')
               <div class="my-6  p-1 ">
                  <x-input name="client_name" id="client_name" label="Client Name" label="Client Name"
                     value="{{ $project->client->client_name }}" />

               </div>
               <div class="my-1 p-1 ">
                  <x-input type="text" label="Project Name" name="project_name" id="project_name"
                     value="{{ $project->project_name }}" />
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" label="Project Manager" name="project_manager" id="project_manager"
                     value="{{ $project->project_manager }}" />
               </div>
               <div class="my-6 p-1">
                  {{-- <x-input type="text" label="Task Type" name="task_type"
                                                        id="task_type" value="{{ old('task_type') }}" /> --}}
                  <x-select name="task_type" id="task_type" label="Task Type">
                     <option value="{{ $project->task_type }}">{{ $project->task_type }}</option>
                     <option value="Enhancement">Enhancement</option>
                     <option value="Change Request">Change Request</option>
                     <option value="Bug">Bug</option>
                     <option value="User Interface">User Interface</option>
                     <option value="Training">Training</option>
                     <option value="Support">Support</option>
                  </x-select>
               </div>
               <div class="my-6 p-1">
                  <x-textarea type="text" label="Description" name="description" id="description">{{ $project->description }} </x-textarea>
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" label="Requested By" name="requested_by" id="requested_by"
                     value="{{ $project->requested_by }}" />
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" class="date" label="Requested On" name="requested_on" id="requested_on"
                     value="{{ $project->requested_on }}" />
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" label="Effort Estimation by" name="effort_estimation_by"
                     id="effort_estimation_by" value="{{ $project->effort_estimation_by }}" />
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" label="Estimated Hours" name="estimated_hours" id="hours"
                     value="{{ $project->estimated_hours }}" />
               </div>
               <div class="my-6 p-1">

                  <x-select name="deployed_on_staging" id="deployed_on_staging" label="Deployed On Staging">
                     <option value="{{ $project->deployed_on_staging }}">
                        {{ $project->deployed_on_staging  }}</option>
                     <option value="0">No</option>
                     <option value="1">Yes</option>
                  </x-select>
               </div>
               <div class="my-6 p-1">


                  <x-select name="deployed_on_production" id="deployed_on_production" label="Deployed On Production">
                     <option value="{{ $project->deployed_on_production }}">
                        {{ $project->deployed_on_production }}</option>
                     <option value="0">No</option>
                     <option value="1">Yes</option>
                  </x-select>
               </div>
               <div class="my-6 p-1">
                  <x-input type="text" class="date" label="Delivered On" name="delivered_on" id="deliverd_on"
                     value="{{ $project->delivered_on }}" />
               </div>
               <div class="my-6 p-1">
                  <x-select name="current_status" id="current_status" label="Current Status">
                     <option value="{{ $project->current_status }}">{{ $project->current_status }}</option>
                     <option value="In Progress">In Progress</option>
                     <option value="Completed">Completed</option>
                     <option value="Limbo">Limbo</option>
                  </x-select>
               </div>
               {{-- <div class="my-6">
                            <x-input type="text" label="Developers" name="developers"
                                value="{{ old('developers') }}" />
                        </div>
                        <div class="my-6">
                            <x-input type="text" label="Designer" name="designers" value="{{ old('designers') }}" />
                        </div> --}}

               <div class="my-6 p-1">
                  <x-textarea type="text" label="Notes" name="notes">
                     {{ $project->notes }}</x-textarea>
               </div>
            </div>
               <div
                     class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">
               <div class="grid grid-cols-3 gap-4 p-6">
                  <span class="flex items-right justify-center my-3 space-x-3 px-4">
                     <x-button color="green">Update</x-button>

                  </span>
            </form>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <span class="flex items-right justify-center my-3 space-x-3 px-4">
                  <x-button color="red">Delete
                  </x-button>
               </span>
            </form>


            <span class="flex items-right justify-center my-3 space-x-3 px-4">
               <x-link-button color="black" href=" {{ route('projects.index') }}">Back
               </x-link-button>
            </span>

         </div>

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
</x-app-layout>