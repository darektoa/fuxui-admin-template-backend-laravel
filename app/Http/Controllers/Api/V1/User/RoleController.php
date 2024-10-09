<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Role\StoreRequest;
use App\Http\Requests\V1\User\Role\UpdateRequest;
use App\Models\User\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $roles = Role::get();

            return ResponseHelper::make($roles);
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
            $role = Role::create($request->only([
                'codename',
                'name',
            ]));

            return ResponseHelper::created($role);
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
            $role = Role::find($id);

            return ResponseHelper::make($role);
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
            $role = Role::find($id);

            if(! $role)
                throw new ResponseException('Role not found', 404);

            $data = collect($request->only([
                'codename',
                'name',
            ]));

            $role->update($data->toArray());

            return ResponseHelper::make($role);
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
            $role = Role::find($id);

            if(! $role)
                throw new ResponseException('Role not found', 404);

            $role->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
