<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Profile\Face\StoreRequest;
use App\Http\Requests\V1\Profile\Face\UpdateRequest;
use App\Http\Resources\Profile\FaceResource;
use App\Models\User\Face;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaceController extends Controller
{
    public $pageName = "Profile Face";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $page = $request->page ?? 1;
            $perPage = $request->perPage ?? 10;
            $faces = Face::where("user_id", Auth::id())
                ->paginate(
                    page: $page,
                    perPage: $perPage
                );

            return ResponseHelper::paginate(
                FaceResource::collection($faces)
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
            $image = $request->file('image');

            if(! $image->isReadable())
                throw new ResponseException('Face image not readable', 422);

            $face = Face::create([
                'userId'    => Auth::id(),
                'name'      => $request->name,
                'imageUri'  => StorageHelper::putPublic('users/faces', $image),
                'isActive'  => $request->isActive ?? 1,
            ]);

            return ResponseHelper::created(
                FaceResource::make($face)
            );
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
            $face = Face::find($id);

            return ResponseHelper::make(
                FaceResource::make($face)
            );
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
            $face = Face::find($id);
            $image = $request->file('image');

            if(! $face)
                throw new ResponseException('Face not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $face, [
                    'name',
                    'isActive',
                ]);

            if($image && !$image->isReadable())
                throw new ResponseException('Face image not readable', 422);
            else {
                $imageUri = StorageHelper::putPublic('users/faces', $image);
                $data->put('imageUri', $imageUri);
            }

            $face->update($data->toArray());

            return ResponseHelper::make(
                FaceResource::make($face)
            );
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
            $face = Face::find($id);

            if(! $face)
                throw new ResponseException('Face not found', 404);

            $face->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
