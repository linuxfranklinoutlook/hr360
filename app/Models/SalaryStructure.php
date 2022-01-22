<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\Concerns;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class SalaryStructure extends Model
{ 
	use HasApiTokens, HasFactory, Notifiable, HasRoles;

	protected $fillable = [
        'employee_id',
    ];
	protected $guarded=['id'];

	public function employee()
	{
		return $this->hasOne(Employee::class, 'id', 'employee_id');
	}

	public function getFullName()
	{
		$first_name=$this->first_name;
		$middle_name=$this->middle_name;
		$last_name=$this->last_name;
		$fullname= ($middle_name) ? ($first_name . ' ' . $middle_name . ' '  . $last_name ) : ($first_name . ' ' . $last_name );
		return $fullname;
	}
	public function scopeFilter($query, array $filters)
		{
			$query->when($filters['query'] ?? false, fn($query, $search) => 
			$query->where('ctc', 'like', '%' . $search . '%')
				->orWhere('employee_id', 'like','%' . $search . '%')
				
			);
		
	}
	public function path()
	{
		return route('salary.show',['salary'=>$this->id]);
	}
	
	// public function getEmpID()
	// {
	// 	return $this->hasOne(related:'App\Models\Employee',  foreignKey:'emp_id', localKey:'emp_id');
	// }
}
