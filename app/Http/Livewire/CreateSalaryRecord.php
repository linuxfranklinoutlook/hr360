<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateSalaryRecord extends ModalComponent
{
	public $deductions = 0;

	public function addDeduction()
	{
		# code...
		return $this->deductions++;
	}

	public function removeDeduction()
	{
		# code...
		if($this->deductions > 0) {
			return $this->deductions--;
		}
	}

    public function render()
    {
        return view('livewire.create-salary-record');
    }
}
