<?php

namespace App\Http\Controllers\Api\V1\Menu;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Menu\{StoreRequest, UpdateRequest};
use App\Models\Menu\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $menus = Menu::get();

            return ResponseHelper::make($menus);
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
            $menu = Menu::create([
                'menu_id'           => $request->menuId,
                'codename'          => Str::upper($request->codename),
                'name'              => $request->name,
                'icon_uri'          => $request->iconUri,
                'uri'               => Str::trim($request->uri),
                'is_external_uri'   => $request->isExternalUri ?? 0,
                'description'       => $request->description,
                'tooltip'           => $request->tooltip,
                'depth'             => $request->depth ?? 0,
                'order'             => $request->order ?? 0,
            ]);

            return ResponseHelper::created($menu);
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
            $menu = Menu::find($id);

            return ResponseHelper::make($menu);
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
            $menu = Menu::find($id);

            if(! $menu)
                throw new ResponseException('Menu not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $menu);

            $menu->update($data->toArray());

            return ResponseHelper::make($menu);
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
            $menu = Menu::find($id);

            if(! $menu)
                throw new ResponseException('Menu not found', 404);

            $menu->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
