<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class createImageController extends Controller
{
    public function __invoke(
        Request $request,
        string $name
    ) {
        if($request->input('auth')== env('MAN')){
            
            $image = $request->file('image');
            $imageName = $name.".".$image->extension();
            Storage::disk('public')->put($imageName, file_get_contents($image));
            if(Storage::disk('public')->exists($imageName)){
                return new JsonResponse(['OK',
                public_path($name),
                Storage::disk('public')->url($imageName)],jsonresponse::HTTP_CREATED);
            }else{
                return new JsonResponse(['FAILED'],jsonresponse::HTTP_BAD_REQUEST);
            }           
            
        }else{
            abort(500,'nah');
        }


    }
}
