<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Menu\Permission\Permission;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public $pageName = "Profile Permission";

    /**
     * Display the resource.
     */
    public function show(Request $request)
    {
        try {
            $idOnly = $request->idOnly;
            $asObject = $request->asObject;
            $roleIds = Auth::guard('api')->user()->roles->pluck('id');
            $permissions = Permission::whereHas('roles', fn($query) => (
                    $query->whereIn('user_roles.id', $roleIds)
                ))
                ->when($idOnly, fn($query) => (
                    $query->select('id')
                ))
                ->get()
                ->when($idOnly && !$asObject, fn($collect) => (
                    $collect->pluck('id')
                ))
                ->when($idOnly && $asObject, fn($collect) => (
                    $collect->mapWithKeys(fn($item) => (
                        [$item->id => 1]
                    ))
                ));

            return ResponseHelper::make($permissions);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
