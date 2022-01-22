<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Asset;
use App\Models\SalaryStructure;
use DB;

use Illuminate\Http\Request;

class SalaryStructureController extends Controller
{
    //

public function testrelation()
	{
		// dd('test');
		$data=SalaryStructure::all();
		return view('testrelation', compact('data'));
	}

	public function index(Request $request)
    {
		// 
		// ddd($request->full_name);
		if($request->has('query')) 
		{
			$salary_data = SalaryStructure::filter(request(['query','ctc','employee_id']))->get();
		}
		else
		{
			$salary_data=SalaryStructure::paginate(10); 
		// $salary_data=DB::select('select  t1.*, t2.first_name, last_name, date_of_joining  from salary_structures t1, employees t2  where t1.emp_id=t2.emp_id ') ;
		}
		return view('admin.salary.index', compact('salary_data'));

		
	}

	public function create(SalaryStructure $salary)
    {
		$employees = Employee::paginate(12);
		$assets=Asset::paginate(10);
		return view('admin.salary.create', ['employee' => $employees, 'assets' => $assets]);
    }



	
	public function store(Request $req)
	{
		
		// $emp_id=$req->input('emp_id');
		// $full_name=$req->input('full_name');
		$employee_id=$req->input('employee_id');
		$notes=$req->input('notes');
// dd($employee_id);

		$ctc=$req->input('ctc');
		$medical=$req->input('medical');
		$broadband=$req->input('broadband');
		// $other_allowances=$req->input('other_allowances');

		// $pf=$req->input('pf');
		// $esi=$req->input('esi');
		$pt=$req->input('pt');
		// $other_deductions=$req->input('other_deductions');
		
		$month_ctc=($ctc/12)-$medical-$broadband;
		
		$hra=$month_ctc*(0.40);
		$basic=$month_ctc*(0.60);
		
		//  $total_earnings=$basic+$hra+$medical+$broadband+$other_allowances;

		//  $total_deductions=$pf+$esi+$pt+$other_deductions;
		 $gross_pay=$basic+$hra+$medical+$broadband;
		 
		//  $net_pay=$total_earnings-$total_deductions;
		$net_pay=$gross_pay-$pt;


		$salary_data=new SalaryStructure();
		$salary_data->employee_id=$employee_id;
		$salary_data->ctc= $ctc;
		$salary_data->basic=$basic;
		$salary_data->hra=$hra;
		$salary_data->medical=$medical;
		$salary_data->broadband=$broadband;
		// $salary_data->other_allowances=$other_allowances;
		// $salary_data->total_earnings=$total_earnings;

		// $salary_data->pf=$pf;
		// $salary_data->esi=$esi;
		$salary_data->pt=$pt;
		// $salary_data->others=$other_deductions;
		// $salary_data->total_deductions=$total_deductions;
		$salary_data->gross_pay=$gross_pay;

		$salary_data->net_pay=$net_pay;
		$salary_data->notes=$notes;

		
		$salary_data->save(); 
			toast('You have created new Salary structure, Successfully ','success', 'top-right');
			
			return redirect()->route('admin.salary.index');

	}

	public function show(SalaryStructure $salary)
    {
		// dd('show');
		return view('admin.salary.show', ['salary' => $salary]);
    }

	 public function edit(SalaryStructure  $salary)
    {
		// dd($salary);
		$id=$salary->id;
		// dd($id);
		$salary_data=SalaryStructure::find($id); //->$salary->id; 
		return view('admin.salary.edit', ['salary'=>$salary_data ]);
    }


 public function update(Request $request, SalaryStructure $salary)
    {
		
		$salary->fill($request->all());
		// dd($salary);
		DB::transaction(function() use($request, $salary) {
			
			$salary->update();
		});
		toast('You have updated salary details, Sucessfully','success', 'top-right');
		return redirect()->route('admin.salary.show', ['salary' => $salary]);
    }

    
	public function destroy(Request $employee)
    {

		//  Employee::find($employee->id)->delete();
		//  User::find($employee->user_id)->delete();
		 toast('To delete  record, Please contact Admin  ','error', 'top-right');
		 return redirect('admin/assets');
		
    }
	public function calculate()
	{
		dd('Calculate');
	}
}
