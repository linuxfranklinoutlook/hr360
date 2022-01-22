<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\End_User;
use App\Models\User;
use Illuminate\Http\Request;

class EndUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$employees=Employee::paginate(10);
        return view('end_user.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\End_User  $end_User
     * @return \Illuminate\Http\Response
     */
    public function show(End_User $end_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\End_User  $end_User
     * @return \Illuminate\Http\Response
     */
    public function edit(End_User $end_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\End_User  $end_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, End_User $end_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\End_User  $end_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(End_User $end_User)
    {
        //
    }
}
