<?php

namespace App\Http\Controllers\Api\V1\Content;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Content\Type\StoreRequest;
use App\Http\Requests\V1\Content\Type\UpdateRequest;
use App\Models\Content\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $contentTypes = Type::get();

            return ResponseHelper::make($contentTypes);
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
            $contentType = Type::create([
                'name'          => $request->name,
                'codename'      => $request->codename,
                'description'   => $request->description,
            ]);

            return ResponseHelper::created($contentType);
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
            $contentType = Type::find($id);

            return ResponseHelper::make($contentType);
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
            $contentType = Type::find($id);

            if(! $contentType)
                throw new ResponseException('Content type not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $contentType, [
                'name',
                'codename',
                'description',
            ]);

            $contentType->update($data->toArray());

            return ResponseHelper::make($contentType);
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
            $contentType = Type::find($id);

            if(! $contentType)
                throw new ResponseException('Content type not found', 404);

            $contentType->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
