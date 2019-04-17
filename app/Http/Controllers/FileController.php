<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{
    public function store(Request $request)
    {
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename = $file->getClientOriginalName();
                $file->move(storage_path().'/app/public/images/', $filename);
                $success = 1;
            } else {
                $success = 0;
            }
        } else {
            $success = 0;
        }

        $data = [
            'fileName' => $filename,
            'uploaded' => $success,
            'url' => url("storage/images/$filename"),
        ];
        
        return response()->json($data);
    }
}



/*
    {
        "fileName":"54435578_144268523277396_5099696300136333312_n.jpg",
        "uploaded":1,
        "url":"https:\/\/ckeditor.com\/apps\/ckfinder\/userfiles\/images\/54435578_144268523277396_5099696300136333312_n.jpg"
    }
*/