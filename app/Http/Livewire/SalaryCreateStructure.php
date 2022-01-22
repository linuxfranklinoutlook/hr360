<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent; 

use App\Models\Employee;
use App\Models\Asset;

class SalaryCreateStructure extends ModalComponent
{
    public function render()
    {
		$employees = Employee::paginate(12);
		$assets=Asset::paginate(10);

        return view('livewire.salary-create-structure', ['employee' => $employees, 'assets' => $assets]);
        // return view('livewire.salary-create-structure');
    }
}
