<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Image;

class UploadimageController extends Controller {

    public function index() {
        return view('admin/uploadimage');
    }
    
    public function store(Request $request) {
        
        $image = new Image;
        
        $file = $request->file('image');
        $fileName = md5($file->getClientOriginalName());
        $fileType = $file->getMimeType();
        $type = explode('/',$fileType);
        $fileName = $fileName.".".$type[1];
        $request->file('image')->move('images/',$fileName);
        $image->url = $fileName;
        $image->save();
        
        return redirect('admin/gallery');
    }
    
    public function showgallery(){
        $images = Image::all();
        return view('admin/gallery', [
            'images' => $images,
        ]);
    }

}
