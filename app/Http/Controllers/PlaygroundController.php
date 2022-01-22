<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaygroundController extends Controller
{
    //
	public function getFileUpload()
	{
		# code...
		// return Storage::download('lessons/videos/1-Get-PHP-Installed.mp4');
		// dd($file);
		return view('playground.get-file-upload');
	}

	public function postFileUpload(Request $request)
	{
		# code...
		// $path = Storage::putFileAs('lessons/videos', new File($request->file('file')), $request->file('file')->getClientOriginalName());

		// dd($request->file('file')->getClientOriginalExtension());
		// dd($path);
		$emp = Employee::first();

		if($request->hasFile('attachments')) {
			foreach ($request->attachments as $att) {
				# code...
				$emp->addMedia($att)->toMediaCollection('signed_docs','s3');
			}
		}
	}
}
