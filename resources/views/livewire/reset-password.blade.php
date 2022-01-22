<x-guest-layout>
    
      

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="id" value="{{ $user->id }}">

            <!-- Email Address --> 
            <div>
                {{-- <x-label for="email" :value="__('Email')" /> --}}

                <x-input  label="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required  disbled/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                {{-- <x-label for="password" :value="__('Password')" /> --}}

                <x-input label="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autofocus/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                <x-input label="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    
</x-guest-layout>
