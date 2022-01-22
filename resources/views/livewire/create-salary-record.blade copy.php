<div class="p-6">
    {{-- The best athlete wants his opponent at his best. --}}
	<h3 class="text-2xl">Create New Payslip</h3>

	<form action="{{ route('payslip.store') }}" method="POST">
		@csrf

		<div class="my-3">
			<x-select label="Select Year" required name="year">
				@foreach($years as $year)
					<option value="{{ $year }}" {{ $year === Carbon::now()->format('Y') ? 'selected' : '' }}>{{ $year }}</option>
				@endforeach
			</x-select>
		</div>
		<div class="my-3">
			<x-select label="Select Month" required name="month">
				@foreach($months as $month)
					<option value="{{ $month }}" {{ $month === Carbon::now()->format('m') ? 'selected' : '' }}>{{ $month }}</option>
				@endforeach
			</x-select>
		</div>
		<div class="my-3">
			<x-select label="Employee" required name="employee_id">
				@foreach(\App\Models\Employee::all() as $emp)
					<option value="{{ $emp->id }}">{{ $emp->getFullName() . "(" . $emp->personal_email . ")"}}</option>
				@endforeach
			</x-select>
		</div>
		<div class="my-3">
			<x-button color="green" type="button" wire:click="addDeduction">Add Deduction</x-button>
			<x-button color="red" type="button" wire:click="removeDeduction">Remove Deduction</x-button>
		</div>
		@for ($i = 0; $i <= $deductions; $i++)
			<div class="my-3 border border-gray-400 px-3 py-3 rounded-xl">
				<x-input type="text" name="deductions[{{ $i }}][reason]" label="Deduction Reason" /> 
				<x-input type="text" name="deductions[{{ $i }}][amount]" label="Deduction Amount" /> 
			</div>
		@endfor

		<div class="my-3">
			<x-input type="text" name="gross_in_hand" label="Gross in hand ( without deductions )" />
		</div>

		<div class="my-3">
			<h3 class="text-sm font-semibold">Net-in-hand will be calculated in the next step, after all the deductions.</h3>
		</div>

		<div class="my-3">
			<x-button>Submit</x-button>
		</div>
	</form>
</div>
