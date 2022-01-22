<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class UserController extends Controller
{
	public function index(Request $request)
    {
    //    dd($request);
        $users = User::with(['role', 'permissions'])->orderBy('role_id')->paginate(12); 
		if($request->has('query'))
		{
			$users=User::filter(request([
				'name',
				'email',
				]))->with('permissions')->paginate(5);
		}
        return view('admin.user.index', ['users' => $users]); 
    }

	public function create()
	{
		// $this->authorize('create', User::class);

		$roles=Role::get();
		return view('admin.user.create', compact('roles'));
	}

	public function store(Request $request)
	{
		// $this->authorize('create', User::class);
		// $data=$request->validated();

		// dd($data);

		$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
			
        ]);

		$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
			'role_id'=>$request->role_id,
            'password' => Hash::make($request->password),
        ]);
		toast('You have created New User, Successfully ', 'success', 'top-right');
        return redirect(route('admin.users.index'));
	}

	public function show(User $user)
	{
		// dd($user);
		$user=User::findOrFail($user->id);
		
		return view('admin.user.show',compact('user'));
	}

	public function edit(User $user)
	{
		
		// $this->authorize('edit', User::class);
	
		$user=User::findOrFail($user->id);
		$roles=Role::get();
		// dd($user);
		return view('admin.user.edit', compact('user','roles'));
	}

	public function update(Request $request, User $user)
	{
		DB::transaction(function () use ($request, $user) {
            
            $user->fill($request->all());
            // dd($user);
            $user->save();
            // return $task;
        });



		// $this->authorize('update', User::class);
		// $user=User::findOrFail($user->id);
		// $user->name=$user->name;
		// $user->role_id=$user->role_id;
		// dd($user);
		// $user->save();
		toast('You have updated  User details, Successfully ', 'success', 'top-right');
        return redirect(route('admin.users.index'));		
	}
	public function updateUserPassword(User $user)
	{
		// $user=User::findOrFail($user);
		dd($user);
	}

	public function destroy($user)
	{
		$user=User::findOrFail($user);
		// dd($user);
		$user->delete();
		toast('You have deleted User, Successfully ', 'success', 'top-right');
        return redirect(route('admin.users.index'));	

	}
}
