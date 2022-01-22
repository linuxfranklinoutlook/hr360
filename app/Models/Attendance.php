<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	use HasFactory;
	protected $fillable = [
		'employee_id',
		'status',
		'notes',

	];

	protected $guarded = ['id'];

	// protected $dates=['date_from','date_to'];

	// public function setDateFromAttributes($value)
	// {
	// 	return $this->attributes['date_from']=Carbon::parse($value);
	// }
	// public function setDateToAttributes($value)
	// {
	// 	return $this->attributes['date_to']=Carbon::parse($value);
	// }

	// public function employees()
	// {
	// 	return $this->belongsTo(Employee::class, 'employee_id', 'id');
	// }

	public function employees()
	{
			return $this->hasOne(Employee::class, 'id', 'employee_id');
	}
	public function getFullName()
	{
		$first_name = $this->first_name;
		$middle_name = $this->middle_name;
		$last_name = $this->last_name;
		$fullname = ($middle_name) ? ($first_name . ' ' . $middle_name . ' '  . $last_name) : ($first_name . ' ' . $last_name);
		return $fullname;
	}

	public function path()
	{
		return route('attendance.show', ['attendance' => $this->id]);
	}
	
}
