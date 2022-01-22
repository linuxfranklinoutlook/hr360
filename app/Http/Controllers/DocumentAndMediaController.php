<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DocumentAndMediaController extends Controller
{
    //
	public function deleteFile(Media $media)
	{
		# code...
		$media->delete();

		return redirect()->back();
	}

}
