<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesiginationRequest;
use App\Http\Requests\UpdateDesiginationRequest;
use App\Models\Desigination;
use Illuminate\Http\Request;
use DB;

class DesiginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// dd('index');
		$desiginations=Desigination::orderBy('name')->paginate(5);
		return view('admin.desigination.index', compact('desiginations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.desiginations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesiginationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        Desigination::create([
            'name' => $request->name,
		]);
		toast('You have Created new Desigination, Sucessfully','success', 'top-right');

			return redirect()->route('admin.desiginations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function show(Desigination $desigination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function edit(Desigination $desigination)
    {
		return view('admin.desigination.edit', ['desigination'=>$desigination]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesiginationRequest  $request
     * @param  \App\Models\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desigination $desigination)
    {
        DB::transaction(function() use($request, $desigination)
		 {
			$desigination->update($request->all());
		});
			
			toast('You have updated Desiginations, Sucessfully','success', 'top-right');

			return redirect()->route('admin.desiginations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desigination $desigination)
    {
        $desigination->delete();
		toast('You have Deleted Desigination, Sucessfully','success', 'top-right');

			return redirect()->route('admin.desiginations.index');

    }
}
