<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;  

use App\Models\Employee;
use App\Models\Leave;


class LeaveCreate extends ModalComponent
{
    public function render()
    {
        $employees = Employee::paginate(12);
		$leaves=Leave::paginate(12);
        return view('livewire.leave-create', ['leaves' => $leaves, 'employee'=>$employees]);
        // return view('livewire.leave-create');
    }
}
