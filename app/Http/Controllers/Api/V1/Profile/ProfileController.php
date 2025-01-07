<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Profile\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $pageName = "Profile";

    /**
     * Display the authed profile resource.
     */
    public function show(Request $request)
    {
        try {
            $user = User::with([
                'profilePictures' => fn($query) => $query->latest(),
                'roles.permissions',
            ])->find(Auth::id());

            return ResponseHelper::make(
                UserResource::make($user)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        try {
            $profilePicts = $request->file('profilePictures');
            $user = User::find(Auth::id());

            if(! $user)
                throw new ResponseException('User not found', 404);

            if($profilePicts) foreach ($profilePicts as $profilePict) {
                if(! $profilePict->isReadable()) return;

                $user->profilePictures()->create([
                    'uri' => StorageHelper::putPublic('users/profilePictures', $profilePict),
                ]);
            }

            $user->update(CollectionHelper::getOrOld($request->all(), $user, [
                'email',
                'username',
                'firstname',
                'lastname',
                'birthDate',
                'birthPlace',
                'phoneNumber',
            ])->toArray());

            return ResponseHelper::make(
                UserResource::make($user)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
