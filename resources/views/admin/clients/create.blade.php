<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('clients.create') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Add new Client ') }}
      </h2>
   </x-slot>



   <head>
      <title>Create Client</title>
      <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
         rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
   </head>

   <body>
      <div class="py-6 relative">
         <div class="max-w-7xl mx-auto sm:px-9 lg:px-8  bg-blue ">
            <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl  ">
               <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 bg-gray-400 ">
                  <div class="overflow-hidden shadow-sm sm:rounded-lg">
                     <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl ">
                        <div
                           class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify ">
                           <div class="p-2 bg-white-500">
                              <h3 class="text-2xl">Create New Client</h3>
                           </div>
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

                              <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="grid grid-cols-2 gap-2 ">
                                    <div class="backdrop-filter backdrop-blur-lg px-1 py-1 rounded-md shadow my-1 ">

                                       <div class="my-6">
                                          <x-input type="text" label="Client Name" name="clinet_name"
                                             value="{{ old('clinet_name') }}" />
                                       </div>
                                       <div class="my-6">
                                          <x-input type="text" label="Client ID" name="clinet_id"
                                             value="{{ old('clinet_id') }}" />
                                       </div>
                                       <div class="my-6">
                                          <x-input type="text" label="Owner Name" name="clinet_owner_name"
                                             value="{{ old('clinet_owner_name') }}" />
                                       </div>
                                       <div class="my-6">
                                          <x-input type="text" label="Owner's email" name="client_owner_email"
                                             value="{{ old('client_owner_email') }}" />
                                       </div>



                                       <div class="my-6">
                                          <x-input type="text" label="Contact Number" name="contact_owner_number"
                                             value="{{ old('contact_owner_number') }}" />
                                       </div>


                                       <div class="my-6">
                                          <x-textarea type="text" label="Client Full Address" name="address">
                                             {{ old('address') }}</x-textarea>
                                       </div>
                                    </div>
                                    <div class="backdrop-filter backdrop-blur-lg px-1 py-1 rounded-md shadow my-1 ">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dynamic_field">
                                             <tr>

                                                <td>
                                                   <x-button type="button" name="add" id="add" class="btn btn-success">
                                                      Add Contact </x-button>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>

                                    </div>

                                 </div>








                                 <span class="flex items-right justify-center my-3 space-x-3 px-4">
                                    <x-button>Submit</x-button>
                                 </span>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>




      </form>
      </div>
   </body>
</x-app-layout>
<script type="text/javascript">
   $('.date').datepicker({
      format: 'yyyy-mm-dd'
   });
</script>

</html>
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


<script type="text/javascript">
   $(document).ready(function() {

      var postURL = "<?php echo url('addmore'); ?>";

      var i = 1;


      $('#add').click(function() {

         i++;

         $('#dynamic_field').append('<tr id="row' + i +
            '" class="dynamic-added"><td><input type="text" name="client_contact_person[]" placeholder="Contact Name" class="form-control name_list" /><input type="text" name="client_contact_number[]" placeholder="Contact Number" class="form-control name_list" /><input type="text" name="client_contact_email[]" placeholder=" Contact Number" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

      });


      $(document).on('click', '.btn_remove', function() {

         var button_id = $(this).attr("id");

         $('#row' + button_id + '').remove();

      });


      $.ajaxSetup({

         headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         }

      });


      $('#submit').click(function() {

         $.ajax({

            url: postURL,

            method: "POST",

            data: $('#add_name').serialize(),

            type: 'json',

            success: function(data)

            {

               if (data.error) {

                  printErrorMsg(data.error);

               } else {

                  i = 1;

                  $('.dynamic-added').remove();

                  $('#add_name')[0].reset();

                  $(".print-success-msg").find("ul").html('');

                  $(".print-success-msg").css('display', 'block');

                  $(".print-error-msg").css('display', 'none');

                  $(".print-success-msg").find("ul").append(
                     '<li>Record Inserted Successfully.</li>');

               }

            }

         });

      });


      function printErrorMsg(msg) {

         $(".print-error-msg").find("ul").html('');

         $(".print-error-msg").css('display', 'block');

         $(".print-success-msg").css('display', 'none');

         $.each(msg, function(key, value) {

            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

         });

      }

   });
</script>
