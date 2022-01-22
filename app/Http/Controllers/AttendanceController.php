<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('index');
        //
        // $attendances = Attendance::whereDate('created_at', today())->get();
		$attendances = Attendance::where('status'=== 'Present');
        $employees=Employee::all();

        return view('admin.attendance.index', ['attendances' => $attendances, 'employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
		$employees=Employee::all();
		foreach($employees as $employee)
		{
		$emp=$employee->id;
		$emp1=new Attendance();
		$emp1->employee_id=$emp;
		$emp1->save();

		}
		
	
        $employees=Attendance::whereDate('created_at', today())->get();
        // $employees=Employee::all();
        // $employees=$users->concat($dates);

        // $employees=DB::table('employees')->union($dates)->get();
        // $employees=Employee::paginate(12);
        // $employees = Attendance::all()->where('created_at' , '!=', today()) ;

        // $employees=DB::table('attendances')->letfJoin('employees', 'employees.id', '=', 'attendances.employee_id', 'attendances.status'  !='NULL','attendances.created_at'='2021-12-28 22:07:17');
        // $employees=DB::table('employees')->leftJoin('attendances', 'employees.id', '=', 'attendances.employee_id' ,'and', 'attendances.status', '!=', '')->distinct()->get();
        // ddd($employees);
        // dd($employees);
        return view('admin.attendance.create', ['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request); 
        // 
        DB::transaction(function () use ($request) {
            $attendance = new Attendance();
            $attendance->fill($request->all());
            $attendance->save();
            return $attendance;
        });
        toast('Asset is created Successfully ', 'success', 'top-right');
        return redirect()->route('admin.attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $attendance)
    {
        //
        // dd($attendance->id);
        $from_date=$attendance->from_date;
        $to_date=$attendance->to_date;
        // dd($to_date);
        $dates=Attendance::find($attendance->id);
        // ->where('created_at', '>=', $from_date)

        // ->where('created_at', '<=', $to_date);
        // dd($dates);


        return view('admin.attendance.show', ['dates'=>$dates]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
