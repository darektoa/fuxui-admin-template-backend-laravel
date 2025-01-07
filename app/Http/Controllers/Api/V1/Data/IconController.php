<?php

namespace App\Http\Controllers\Api\V1\Data;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Data\IconResource;
use App\Models\Data\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IconController extends Controller
{
    public $pageName = "Icon Data";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $withTimestamp = $request->withTimestamp;
            $icons = Icon::when(!$withTimestamp, fn($q) => (
                    $q->except(['created_at', 'updated_at', 'deleted_at'])
                ))
                ->get();

            return ResponseHelper::make(
                IconResource::collection($icons)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }


    /**
     * Sync all files from icon directory to database
     */
    public function syncFromDirectory(Request $request)
    {
        try {
            $iconFolder = "icons";
            $folderPath = public_path("storage/$iconFolder");
            $iconsInDB  = Icon::all();
            $files      = File::allFiles($folderPath);
            $icons      = [];

            foreach ($files as $file) {
                if(! $file->isReadable()) continue;

                $icons[] = [
                    "name"  => Str::headline($file->getFilenameWithoutExtension()),
                    "uri"   => "$iconFolder/{$file->getRelativePathname()}",
                ];
            }

            Icon::upsert($icons, uniqueBy: ["uri"], update: ["name", "uri"]);

            foreach ($iconsInDB as $icon) {
                $path = public_path(Storage::url($icon->uri));
                if (! File::exists($path)) $icon->delete();
            }

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
