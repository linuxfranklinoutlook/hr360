<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployees extends Component
{
	use WithPagination;

	public $query;
	public $submitSearch = false;

	public function searchSubmit()
	{
		# code...
		return $this->submitSearch = true;
	}

    public function render()
    {
		$employees = Employee::paginate(12);

		if($this->submitSearch && !is_null($this->query)) {
			$employees = Employee::where("first_name", "like", "%" . $this->query . "%")->paginate(21);
		}

        return view('livewire.show-employees')->with(['employees' => $employees]);
    }
}
