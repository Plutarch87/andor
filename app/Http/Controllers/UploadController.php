<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function postFile(Request $request) {
            if(
            	$request->file->getClientMimeType() == 'image/jpg' ||
            	$request->file->getClientMimeType() == 'image/png' ||
            	$request->file->getClientMimeType() == 'image/jpeg'
              )
           	{
                $desPath = storage_path(). '/andor';
                $name = date("his"). "-". $request->file->getClientOriginalName();
                if($request->file->isValid()) {
                    $request->file->move($desPath, $name);
                }
                return response()->json($name);
            } else {
                return response()->json("File must be in PDF or image format", 405);
            }
    	}
}
