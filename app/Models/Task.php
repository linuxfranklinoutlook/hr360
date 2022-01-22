<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;
use App\Models\Employee;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'starting_date',
        'ending_date',
        'assign_to_developers[]',
        'assign_to_designers[]',
        'assign_to_testers[]',
        'task_status',
        'notes',

        
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }


    public function employees()
    {
        return $this->belongsTo(Employee::class,  'employee_id', 'id' );   
    }

} 
