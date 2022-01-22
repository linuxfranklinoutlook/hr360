<div class="p-6 card">
	<h3 class="text-4xl">Update Password</h3>
</div>
<form method="POST" action="">
	@csrf
	@method('PATCH')
    <x-input type="password"  name="password" id="password" label="New Password" />
    <x-input type="password_confirmation" name="password_confirmation" id="password_confirmation"
        label="Conform Password" />
    <x-button>Submit</x-button>
</form>
