<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;
use App\Models\Client;
use App\Models\Employee;
use LivewireUI\Modal\ModalComponent; 

class CreateTask extends ModalComponent
{
    public function render()
    {
        $employees = Employee::all();
        $clients = Client::all(); 
        $projects = Project::all();
        $tasks = Task::all();
        return view('livewire.create-task',['employees' => $employees, 'clients' => $clients, 'projects' => $projects, 'tasks' => $tasks]);
    }
}
