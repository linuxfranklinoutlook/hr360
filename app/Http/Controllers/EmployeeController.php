<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\HelperState;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Asset;
use App\Models\Desigination;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	
	 public function createPDF() {
      // retreive all records from db
	//   dd($employee->id);
      $data = Employee::all();

      // share data to view
      view()->share('employee',$data);
	  $pdf = PDF::loadView('employee.showid', ['Data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
    //   $pdf = PDF::loadView('employee.showid', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
	
    public function index(Request $request)
    {
		//
		$employees = Employee::paginate(12);
		$assets=Asset::all();

		if($request->has('query')) {
			$employees = Employee::filter(request(['query','emp_type','location']))->paginate(12);
			// dd($employees);
		}

		return view('admin.employee.index', ['employees' => $employees, 'assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$desigination=Desigination::all();
		// dd($desigination);
		$states = HelperState::all();
		return view('admin.employee.create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		
		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'personal_email' => 'required|email|unique:employees',
			'phone_number' => 'required|unique:employees',
			'emp_id' => 'required|unique:employees',
			'user_email' => 'required|unique:users,email',
			'user_password' => 'required|confirmed'
			
		]);

		DB::transaction(function() use($request) {
			$emp = new Employee();
			$emp->fill($request->except(['permanent_address','current_address']));
			$emp->permanent_address = json_encode($request->permanent_address);
			$emp->current_address = json_encode($request->current_address);
	
			$user = User::create(['email' => $request->user_email, 'password' => bcrypt($request->user_password), 'name' => $request->first_name . ' ' . $request->last_name, 'role_id'=>'4' ]);
			$emp->user_id = $user->id;
			
			// dd($user);
			
			$emp->save();


	
			if($request->hasFile('profile_pic')) {
				$emp->addMedia($request->profile_pic)->toMediaCollection('profile_pic');
				// ('profile_pic','s3')
				// foreach ($request->signed_docs as $sd) {
					# code...
				// }
			}
			// $home=Home::create();
			// $home
			// ->addMediaFromRequest('image')
			// ->preservingOriginal()
			// ->toMediaCollection();
			// return back();

			if($request->hasFile('signed_docs')) {
				foreach ($request->signed_docs as $sd) {
					# code...
					$emp->addMedia($sd)->toMediaCollection('signed_docs');
				}
			}
			
			if($request->hasFile('other_docs')) {
				foreach ($request->other_docs as $od) {
					# code...
					$emp->addMedia($od)->toMediaCollection('other_docs');
				}
			}

			return $emp;
		});

		// Employee::create($request->all());
		toast('You have created new Employee, Sucessfully','success', 'top-right');

		return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
		$assets=Asset::all();
		
		return view('admin.employee.show', ['employee' => $employee, 
									'assets'=> $assets ]);
    }

	public function showid(Employee $employee)
    {
        //
		$employee=Employee::find($employee->id);

		return view('employee.showid', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
		$states = HelperState::all();
		return view('admin.employee.edit', ['employee' => $employee, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
		// dd($request->all());

		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'personal_email' => [ 'required', 'email', Rule::unique('employees')->ignore($employee->id, 'id')],
			'phone_number' => [ 'required', Rule::unique('employees')->ignore($employee->id, 'id')],
			'personal_email' => [ 'required', Rule::unique('employees')->ignore($employee->id, 'id')],
			// 'phone_number' => 'required|unique:employees,' . $employee->id,
			// 'emp_id' => 'required|unique:employees,' . $employee->id,
		]);

		DB::transaction(function() use($request, $employee) {
			$employee->update($request->except(['permanent_address', 'current_address']));
			$employee->permanent_address = json_encode($request->permanent_address);
			$employee->current_address = json_encode($request->current_address);
			$employee->update();

			if($request->hasFile('profile_pic')) {
				$employee->addMedia($request->profile_pic)->toMediaCollection('profile_pic','s3');
				// foreach ($request->signed_docs as $sd) {
					# code...
				// } 
			}

			if($request->hasFile('signed_docs')) {
				foreach ($request->signed_docs as $sd) {
					# code...
					$employee->addMedia($sd)->toMediaCollection('signed_docs','s3');
				}
			}
			
			if($request->hasFile('other_docs')) {
				foreach ($request->other_docs as $od) {
					# code...
					$employee->addMedia($od)->toMediaCollection('other_docs','s3');
				}
			}
		});

		toast('You have updated Employee details, Sucessfully','success', 'top-right');

		return redirect()->route('admin.employees.show', ['employee' => $employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Employee $employee)
    // {
    //     //
	// 	dd($employee);
    // }

	public function destroy(Request $employee)
    {

		//  Employee::find($employee->id)->delete();
		//  User::find($employee->user_id)->delete();
		 toast('To delete Employee record, Please contact Admin or mark it as Inactive ','error', 'top-right');
		 return redirect('admin/employees');
		
    }

	public function downloadPdf(Request $id)
    {
        $employee = Employee::find($id->id);
		// ddd($employee);

        // share data to view
        view()->share('admin.employee.showid',$employee);
        $pdf = PDF::loadView('admin.employee.showid', ['employee' => $employee])->setOptions(['defaultFont' => 'Times New Roman']); ;
        return $pdf->download('ID Card');
    }
}
