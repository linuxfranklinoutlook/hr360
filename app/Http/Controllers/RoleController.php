<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;

class RoleController extends Controller
{
    //
	public function index()
	{
		// dd('index');
		$roles=Role::paginate(5);
		return view('admin.roles.index', compact('roles'));
	}

	public function create()
	{
		return view('admin.roles.create');
	}

	public function store(Request $request)
	{
		// dd($request);
		$user = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
		]);
		toast('You have Created new Role, Sucessfully','success', 'top-right');

			return redirect()->route('admin.roles.index');
	}
	public function edit(Role $role)
	{
		// dd($role);
		// $role=Role::findOrFail($role);
		
		return view('admin.roles.edit', ['role'=>$role]);
	}

	public function update(Request $request, Role $role)
	{
		DB::transaction(function() use($request, $role)
		 {
			$role->update($request->all());
		});
			
			toast('You have updated Roles, Sucessfully','success', 'top-right');

			return redirect()->route('admin.roles.index');
	}

	public function destroy(Role $role)
	{
		$role->delete();
		toast('You have Deleted Role, Sucessfully','success', 'top-right');

			return redirect()->route('admin.roles.index');


	}
}
