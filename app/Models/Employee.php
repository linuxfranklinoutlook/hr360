<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employee extends Model implements HasMedia
{
    use HasFactory;
	use InteractsWithMedia;
	
	protected $guarded = ['id'];

	protected $dates = ['date_of_birth','date_of_joining'];

	public function path()
	{
		# code...
		return route('admin.employees.show', ['employee' => $this->id]);
	}

	public function getFullName()
	{
		# code...
		// return $this->first_name . ' ' . $this->last_name;

		$first_name=$this->first_name;
		$middle_name=$this->middle_name;
		$last_name=$this->last_name;
		// dd($middle_name);
		$fullname= ($middle_name) ? ($first_name . ' ' . $middle_name . ' '  . $last_name ) : ($first_name . ' ' . $last_name );
		return $fullname;
	}

	public function user()
	{
		# code...
		return $this->belongsTo(User::class);
	}

	public function setDateOfJoiningAttribute($value)
	{
		return $this->attributes['date_of_joining'] = Carbon::parse($value);
		# code...
	}
	
	public function setDateOfBirthAttribute($value)
	{
		// dd($value);
		return $this->attributes['date_of_birth'] = Carbon::createFromDate($value);
		# code...
	}

	public function scopeFilter($query, array $filters)
	{
		# code...
		// dd($filters);

		$query->when($filters['query'] ?? false, fn($query, $search) => 
			$query->where('first_name', 'like', '%' . $search . '%')
				->orWhere('last_name', 'like','%' . $search . '%')
				->orWhere('personal_email', 'like', '%' . $search . '%')
			);
		
		$query->when($filters['emp_type'] ?? false, fn($query, $emp_type) =>
			$query->where('emp_type', $emp_type)
		);

		$query->when($filters['location'] ?? false, fn($query, $location) => 
			$query->where("location", $location)
		);
		
		

		// $query->where($filters['location'] ?? false, fn($query, $location) => 
		// 	$query->where('location', $location)
		// );
	}
	public function assets()
	{
		return $this->hasMany(Asset::class);
	}

	public function salarystructure()
	{
		return $this->belongsTo(SalaryStructure::class);
	}
}
