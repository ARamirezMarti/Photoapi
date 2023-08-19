<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class getAllImagesController extends Controller
{
    public function __invoke()
    {
        return new JsonResponse(Storage::disk('public')->allFiles());
    }
}
