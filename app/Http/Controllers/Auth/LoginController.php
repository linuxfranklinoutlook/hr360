<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
	// use AuthenticatesUsers;
	protected $redirectTo = RouteServiceProvider::HOME;
	
	protected function redirectTo()
	{
		if(Auth()->user()->role_id==1)
		{
			return route('dashboard_admin');
		}
		elseif(Auth()->user()->role_id=2)
		{
			return route('dashboard_hr');
		}
		else
		{
			return route('dashboard_user');
		}

	}


	public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	public function login(Request $request)
	{
		$input=$request->all();
		$this->validate($request, [
			'email'=>'required|email',
			'password'=>'required'
		]);

		if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])))
		{
			if(Auth()->user()->role_id==1)
			{
				return route('dashboard_admin');
			}
			elseif(Auth()->user()->role_id=2)
			{
				return route('dashboard_hr');
			}
			elseif(Auth()->user()->role_id=3)
			{
				return route('dashboard_user');
			}
		}
			else
			{
				return redirect()->route('login')->with('error', 'Email or Password are wrong, Try again!');
			}
			
		
		
	}

    // public function redirectPath()
    // {
    //     if (auth()->user()->is_admin) {
    //         return route('dashboard_admin');
    //     }

    //     return route('dashboard_user');
    // }

}
