<?php

namespace App\Http\Controllers\Api\V1\Menu\Permission;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Menu\Permission\Type\{StoreRequest, UpdateRequest};
use App\Models\Menu\Permission\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $permissions = Type::get();

            return ResponseHelper::make($permissions);
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
            $permission = Type::create([
                'menu_id'   => $request->menuId,
                'name'      => $request->name,
            ]);

            return ResponseHelper::created($permission);
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
            $permission = Type::find($id);

            return ResponseHelper::make($permission);
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
            $permission = Type::find($id);

            if(! $permission)
                throw new ResponseException('Menu Type not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $permission);

            $permission->update($data->toArray());

            return ResponseHelper::make($permission);
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
            $permission = Type::find($id);

            if(! $permission)
                throw new ResponseException('Menu Type not found', 404);

            $permission->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
