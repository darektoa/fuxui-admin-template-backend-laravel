<?php

namespace App\Http\Controllers\Api\V1\Content;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Content\Directory\StoreRequest;
use App\Http\Requests\V1\Content\Directory\UpdateRequest;
use App\Http\Resources\Content\DirectoryResource;
use App\Models\Content\Directory;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $directories = Directory::where('depth', 0)
                ->orderBy('order')
                ->get();

            return ResponseHelper::make(
                DirectoryResource::collection($directories)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $directory = Directory::create([
                'directoryId'       => $request->directoryId,
                'menuId'            => $request->menuId,
                'name'              => $request->name,
                'codename'          => $request->codename,
                'value'             => $request->value,
                'depth'             => $request->depth ?? 0,
                'order'             => $request->order ?? 0,
            ]);

            return ResponseHelper::created($directory);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $directory = Directory::find($id);

            return ResponseHelper::make($directory);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $directory = Directory::find($id);

            if(! $directory)
                throw new ResponseException('Content directory not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $directory, [
                'directoryId',
                'menuId',
                'name',
                'codename',
                'depth',
                'order',
            ]);

            $directory->update($data->toArray());

            return ResponseHelper::make($directory);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $directory = Directory::find($id);

            if(! $directory)
                throw new ResponseException('Content directory not found', 404);

            $directory->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
