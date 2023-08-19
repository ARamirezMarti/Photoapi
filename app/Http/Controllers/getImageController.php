<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class getImageController extends Controller
{
    public function __invoke($name)
    {
        $imagePath = 'public/' . $name;

        if (!Storage::exists($imagePath)) {
            abort(404);
        }
    
        $mimeType = Storage::mimeType($imagePath);
    
        $imageContents = Storage::get($imagePath);
    
        return response($imageContents)->header('Content-Type', $mimeType);

    }
}
