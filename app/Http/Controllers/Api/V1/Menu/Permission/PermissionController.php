<?php

namespace App\Http\Controllers\Api\V1\Menu\Permission;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Menu\Permission\StoreRequest;
use App\Http\Requests\V1\Menu\Permission\UpdateRequest;
use App\Models\Menu\Menu;
use App\Models\Menu\Permission\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $pageName = "Menu Permission";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $permissions = Permission::with([
                    'menu' => fn($query) => $query->orderBy('name'),
                    'types'
                ])
                ->get();

            // $permissions = Menu::with(['menus.permissions.types', 'permissions.types'])
            //     ->where('depth', 0)
            //     ->get();

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
            $permission = Permission::create([
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
            $permission = Permission::with(['menu', 'types'])
                ->find($id);

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
            $permission = Permission::find($id);

            if(! $permission)
                throw new ResponseException('Menu Permission not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $permission, [
                'menuId',
                'name',
            ]);

            $permission->update($data->toArray());
            $permission->types()->sync($request->permissionTypeId);

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
            $permission = Permission::find($id);

            if(! $permission)
                throw new ResponseException('Menu Permission not found', 404);

            $permission->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
