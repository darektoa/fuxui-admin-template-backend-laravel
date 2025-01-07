<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function show($path)
    {
        if (Storage::disk('public')->exists($path)) {
            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            return response($file)->header('Content-Type', $type);
        } else {
            abort(404);
        }
    }
}
