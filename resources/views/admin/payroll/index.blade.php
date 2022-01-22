<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Payroll - Salary Records Management') }}
		</h2>
	</x-slot>
	
	<div class="py-6" x-data="{ currentTab: 0 }">
		<div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					
					<div class="pb-3">
						<x-button onclick="Livewire.emit('openModal', 'create-salary-record')">Add New Record</x-button>
					</div>

					<div class="grid grid-cols-3 gap-6">
						<nav class="space-y-1" aria-label="Sidebar">
							<h3 class="mb-3 font-semibold text-gray-500">Year</h3>
							@foreach ($years as $year)
								<a href="{{ route('payslip.index', ['year' => $year]) }}" class="{{ request('year') === $year ? ' bg-gray-100 ' : ' bg-transparent ' }} backdrop-filter backdrop-blur-md shadow text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-50" aria-current="page">
									<span class="truncate">
										{{ $year }}
									</span>
								</a>
							@endforeach
						</nav>

						@if(request('year'))
						<nav class="space-y-1" aria-label="Sidebar">
							<h3 class="mb-3 font-semibold text-gray-500">Month</h3>
							@foreach ($months as $month)
								@php
									$carbonMonth = Carbon::createFromFormat('Y-m-d', request('year') . '-' . $month . '-01');
									@endphp
									<a href="{{ route('payslip.index', ['year' => request('year'), 'month' => $carbonMonth->format('m')]) }}" class="{{ request('month') === $month ? ' bg-blue-400 text-white ' : ' bg-transparent text-gray-900 ' }} backdrop-filter backdrop-blur-lg shadow  group flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-400 hover:text-white" aria-current="page">
									<span class="truncate">
										{{ $carbonMonth->format('M') }}
									</span>
								</a>
							@endforeach
						</nav>
						@endif


						<div class="block">
							<h3 class="mb-3 font-semibold text-gray-500">Records</h3>
							@foreach ($month_records as $item)
								<div class="block px-3 py-3 bg-glass rounded-md shadow">
									<div class="flex flex-col w-full mb-3 space-y-1">
										<p class="flex flex-1 items-center justify-between">
											<span>Net-in-hand: </span>
											<span>₹{{ $item->net_in_hand }}</span>
										</p>
										<p class="flex flex-1 items-center justify-between">
											<span>Gross-in-hand: </span>
											<span>₹{{ $item->gross_in_hand }}</span>
										</p>
										<p class="flex flex-1 items-center justify-between">
											<span>EMP Name: </span>
											<span>{{ $item->employee->getFullName() }}</span>
										</p>
										<p class="flex flex-1 items-center justify-between">
											<span>EMP Email: </span>
											<span>{{ $item->employee->personal_email }}</span>
										</p>
										<p class="flex flex-1 items-center justify-between">
											<span>EMP ID: </span>
											<span>{{ $item->employee->emp_id }}</span>
										</p>
										<h3 class="py-3 font-semibold underline">Deductions</h3>
										@foreach($item->deductions as $ded)
											<p class="flex flex-1 items-center justify-between">
												<span class="font-semibold">{{ $ded->reason }}</span>
												<span>₹{{ $ded->deduction_amount }}</span>
											</p>
										@endforeach
									</div>
									{{-- <p>Net-in-hand: ₹{{ $item->net_in_hand }}</p>
									<p>Gross-in-hand: ₹{{ $item->gross_in_hand }}</p>
									<p>EMP Name: ₹{{ $item->employee->getFullName() }}</p>
									<p>EMP Email: ₹{{ $item->employee->personal_email }}</p>
									<p>EMP ID: ₹{{ $item->employee->emp_id }}</p> --}}

									<x-link-button color="red" href="{{ route('payslip.destroy', ['salary_record' => $item->id]) }}">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
										</svg>
									</x-link-button>
								</div>
							@endforeach
						</div>
					</div>

					{{-- <a href="{{ route('payslip.index', ['year' => '2021']) }}">
						2021
					</a>

					<ul>
						@foreach ($year_records as $item)
							<a href="{{ route('payslip.index', [
								'year' => request('year'),
								'month' => $item
							]) }}">{{ $item }}</a>
						@endforeach
					</ul>

					<p>Month Records</p>
					<ul>
						@foreach ($month_records as $item)
							<li>
								{{ $item }}
							</li>
						@endforeach
					</ul> --}}
					
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
