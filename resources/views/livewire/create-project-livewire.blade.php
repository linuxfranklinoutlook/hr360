


    <!DOCTYPE html>
    <html>

    <head>
        <title>Create Project </title>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
            rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        @livewireStyles()
    </head>

    <body>

        <div class="py-0 px-0  m-6 relative opacity-100  p-7  sm:rounded-lg">
            <div class="px-2 p-4  sm:rounded-lg">
                    
                        <div class="p-1 bg-white rounded-md px-15 py-15">
                            <h3 class="text-sm">Create  Project</h3>
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

                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="p-1 my-6 ">
                            <x-select  type="text" label="Client Name" name="client_id" id="client_id"
                                value="{{ old('clinet_name') }}">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->client_name }}</option>
                                @endforeach
                            </x-select>
                            {{-- <td><input type="text" name="client_id" id="client_id"
                                value="{{ $client->id }}"></td> --}}
                        </div>
                        <div class="my-6 p-1 ">
                            <x-input type="text" label="Project Name" name="project_name" id="project_name"
                                value="{{ old('project_name') }}" />
                        </div>
                        
                  
                        <div class="my-6  p-1 ">
                            <x-select type="text" label="Assign Managers/Leaders" name="project_manager" id="project_manager"
                               value="{{ old('project_manager') }}" multiple>
                               @foreach ($employees as $employee)
                                  <option value="{{ $employee->getFullName() }}">
                                     {{ $employee->getFullName() }}</option>
                               @endforeach
                            </x-select>
                         </div>
                        <div class="my-6 p-1">
                            {{-- <x-input type="text" label="Task Type" name="task_type"
                                                                  id="task_type" value="{{ old('task_type') }}" /> --}}
                            <x-select name="task_type" id="task_type" label="Task Type">
                               <option value="Enhancement">Enhancement</option>
                               <option value="Change Request">Change Request</option>
                               <option value="Bug">Bug</option>
                               <option value="User Interface">User Interface</option>
                               <option value="Training">Training</option>
                               <option value="Support">Support</option>
                            </x-select>
                         </div>
                         <div class="my-6 p-1">
                            <x-textarea type="text" label="Description" name="description" id="description"
                               value="{{ old('description') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" label="Requested By" name="requested_by" id="requested_by"
                               value="{{ old('requested_by') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" class="date" label="Requested On" name="requested_on" id="requested_on"
                               value="{{ old('requested_on') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" label="Effort Estimation by" name="effort_estimation_by"
                               id="effort_estimation_by" value="{{ old('effort_estimation_by') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" label="Estimated Hours" name="estimated_hours" id="hours"
                               value="{{ old('estimated_hours') }}" />
                         </div>
                         <div class="my-6 p-1">
          
                            <x-select name="deployed_on_staging" id="deployed_on_staging" label="Deployed On Staging">
                               <option value="{{ old('deployed_on_staging') }}">
                                  {{ old('deployed_on_staging') }}</option>
                               <option value="0">No</option>
                               <option value="1">Yes</option>
                            </x-select>
                         </div>
                         <div class="my-6 p-1">
          
          
                            <x-select name="deployed_on_production" id="deployed_on_production" label="Deployed On Production">
                               <option value="{{ old('deployed_on_production') }}">
                                  {{ old('deployed_on_production') }}</option>
                               <option value="0">No</option>
                               <option value="1">Yes</option>
                            </x-select>
                         </div>
                         <div class="my-6 p-1">
                            <x-input type="text" class="date" label="Delivered On" name="delivered_on" id="deliverd_on"
                               value="{{ old('delivered_on') }}" />
                         </div>
                         <div class="my-6 p-1">
                            <x-select name="current_status" id="current_status" label="Current Status">
                               <option value="In Progress">In Progress</option>
                               <option value="Completed">Completed</option>
                               <option value="Limbo">Limbo</option>
                            </x-select>
                         </div>

                        <div class="my-6 p-1">
                            <x-textarea type="text" label="Notes" name="notes">
                                {{ old('notes') }}</x-textarea>
                        </div>
                        <span class="flex items-right justify-center my-3 space-x-3 px-4">
                            <x-button>Submit</x-button>
                        </span>
                </form>
            
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

