<?php

namespace App\Http\Controllers\Api\V1\Content;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Content\StoreRequest;
use App\Http\Requests\V1\Content\UpdateRequest;
use App\Http\Resources\Content\ContentResource;
use App\Models\Content\{Content, Directory};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $keyBy = $request->keyBy;
            $cotents = Content::get()
                ->when(in_array($keyBy, ['id', 'codename']), fn($data) => (
                    $data->keyBy($keyBy)
                ));

            return ResponseHelper::make(
                ContentResource::collection($cotents)
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
            $valueFile = $request->file('value');
            $data = collect([
                'directoryId'       => $request->directoryId,
                'typeId'            => $request->typeId,
                'usingContentId'    => $request->usingContentId,
                'name'              => $request->name,
                'codename'          => $request->codename,
                'value'             => $request->value,
                'json'              => json_encode($request->json),
                'order'             => $request->order ?? 0,
            ]);

            if($valueFile && $valueFile->isReadable()) {
                $fileURI = StorageHelper::putPublic('contents/files', $valueFile);
                $data->put('value', $fileURI);
            }

            $content = Content::create($data);

            return ResponseHelper::created(
                ContentResource::make($content)
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
            $content = Content::find($id);

            return ResponseHelper::make(
                ContentResource::make($content)
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
            $valueFile = $request->file('value');
            $content = Content::find($id);

            if(! $content)
                throw new ResponseException('Content not found', 404);

            $mergedRequest = collect($request->all())->merge([
                'json'  => json_encode($request->json),
            ]);

            $data = CollectionHelper::getOrOld($mergedRequest, $content, [
                'directoryId',
                'typeId',
                'usingContentId',
                'name',
                'codename',
                'value',
                'json',
                'order',
            ]);

            if($valueFile && $valueFile->isReadable()) {
                $fileURI = StorageHelper::putPublic('contents/files', $valueFile);
                $data->put('value', $fileURI);
            }

            $content->update($data->toArray());

            return ResponseHelper::make($content);
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
            $content = Content::find($id);

            if(! $content)
                throw new ResponseException('Content not found', 404);

            $content->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
