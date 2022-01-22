<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
		'reason',
		'leave_type',
		'notes',
		'date_from',
		'date_to',
		'days', 
		'status',

    ];

	protected $guarded=['id'];

	protected $dates=['date_from','date_to'];

	public function setDateFromAttributes($value)
	{
		return $this->attributes['date_from']=Carbon::parse($value);
	}
	public function setDateToAttributes($value)
	{
		return $this->attributes['date_to']=Carbon::parse($value);
	}

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
	
	public function path()
	{
		return route('leave.show',['leave'=>$this->id]);
	}
}
