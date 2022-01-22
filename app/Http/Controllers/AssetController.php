<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Asset; 
use Illuminate\Support\Facades\DB;
 
class AssetController extends Controller 
{
    //
	public function index(Request $request)
    {
		$assets = Asset::paginate(12);
		if($request->has('query')) {
			$assets = Asset::filter(request(['query','model','host_name','asset_type','os_name', 'asset_tag', 'serial_number']))->paginate(12);
		}
		return view('admin.asset.index', ['assets' => $assets]);
    }

    
    public function create()
    {
	
		$employees=Employee::all();
		return view('admin.asset.create',  ['employees'=> $employees]);
    }

    
    public function store(Request $request)
    {
        //
		// dd('store');
		$this->validate($request, ['asset_tag' => 'required',]);
		DB::transaction(function() use($request) {
			$asset = new Asset();
			$asset->fill($request->all());
			$asset->save();
			return $asset;
		});
		toast('New Asset is created Successfully ','success', 'top-right');
		return redirect()->route('admin.assets.index');
    }

   
    public function show(Asset $asset)
    {
		return view('admin.asset.show', ['asset' => $asset]);
    }

	
    public function edit(Asset $asset)
    {
		// dd($asset);
		$id=$asset->id;
		// dd($id);
		$assets=Asset::find($id);//->$asset->id; 
		
        
		return view('admin.asset.edit', ['asset'=>$asset ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
		$this->validate($request, [
			'asset_tag' => 'required'
		]);
		$asset->fill($request->all());
		DB::transaction(function() use($request, $asset) {
			
			$asset->update();
		});
		toast('Asset data updated for Tag '. $asset->asset_tag,'success', 'top-right');
		return redirect()->route('admin.assets.show', ['asset' => $asset]);
    }

    
	public function destroy(Request $employee)
    {

		//  Employee::find($employee->id)->delete();
		//  User::find($employee->user_id)->delete();
		 toast('To delete  record, Please contact Admin  ','error', 'top-right');
		 return redirect('admin/assets');
		
    }
}
