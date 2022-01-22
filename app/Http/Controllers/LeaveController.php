<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Asset;
use App\Models\SalaryStructure;
use App\Models\Leave;
use DB;
use DateTime;

class LeaveController extends Controller
{
    //

    public function index(Request $request)
    {
		// 
		
		$leave_data=Leave::paginate(10); 
		return view('admin.leave.index', compact('leave_data'));

		
	}

	public function create(SalaryStructure $salary)
    {
        dd('create_leaves');
		$employees = Employee::paginate(12);
		$leaves=Leave::paginate(12);
		return view('admin.leave.create', ['employee' => $employees, 'leaves' => $leaves]);
    }



	
	public function store(Request $request)
	{
		$fdate = $request->date_from;
		$tdate = $request->date_to;
		$datetime1 = new DateTime($fdate);
		$datetime2 = new DateTime($tdate);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');

		$leave_type=$request->input('leave_type');
		$date_from=$request->input('date_from');
		$date_to=$request->input('date_to');
		$status='Pending';
		$reason=$request->input('reason');
		$notes=$request->input('notes');
		$employee_id=$request->input('employee_id');
		

		$leave=new Leave();
		$leave->leave_type=$leave_type;
		$leave->date_from=$date_from;
		$leave->date_to=$date_to;
		$leave->status=$status;
		$leave->reason=$reason;
		$leave->notes=$notes;
		$leave->days=$days;
		$leave->employee_id=$employee_id;
		$leave->save();

			toast('You have applied Leave, Successfully ','success', 'top-right');
			return redirect()->route('admin.leave.index');

	}

	public function show(Leave $leave)
    {
		return view('admin.leave.show', ['leave' => $leave]);
    }

	 public function edit(Leave  $leave)
    {
		$id=$leave->id;
		$leave_data=Leave::find($id); //->$salary->id; 
		return view('admin.leave.edit', ['leave'=>$leave_data]); 
    }

 public function update(Request $request, Leave $leave)
    {
		DB::transaction(function() use($request, $leave) {
			$leave->fill($request->all());
			$leave->update(); 
		});
		toast('You have updated Leave, Sucessfully','success', 'top-right');
		return redirect()->route('admin.leave.show', ['leave' => $leave]);
    }

	public function destroy(Request $employee)
    {

		//  Employee::find($employee->id)->delete();
		//  User::find($employee->user_id)->delete();
		 toast('To delete  Leave record, Please contact Admin  ','error', 'top-right');
		 return redirect('admin/leave');
		
    }
}
