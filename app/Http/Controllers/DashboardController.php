<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Asset;
use App\Models\SalaryStructure;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

	public function index()
	{
		$role=Auth::user()->role_id;
		// dd($role);
		if($role=='1')
		{
			$employees=Employee::all();
		$asset=Asset::all();
		$salary=SalaryStructure::all();
		$users=User::all();
		$projects=Project::all();
		$tasks=Task::orderBy('updated_at')->with('employees')->with('projects')->paginate(7);
		// dd($employee);
		return view('/dashboard_admin',[ 
		'employees'=>$employees,
		'assets'=>$asset,
		'salary'=>$salary,
		'users'=>$users,
		'tasks'=>$tasks,
		'projects'=>$projects,
		]);
		
			// return view('/dashboard_admin');

		}
		if($role==2)
		{
			return view('admin.hr.dashboard');
		}
		if($role==3)
		{
			return view('admin.project_manager.dashboard');
		}
		if($role==4)
		{
			return view('admin.user.dashboard');
		}
		else



		return abort(404);
		// return 'dashboardController';
	}
	
}
