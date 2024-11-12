<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Profile\UpdateRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the authed profile resource.
     */
    public function show(Request $request)
    {
        try {
            $user = User::with('roles.permissions')->find(Auth::id());

            return ResponseHelper::make($user);
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
            $user = User::find(Auth::id());

            if(! $user)
                throw new ResponseException('User not found', 404);

            $data = collect([
                'email'         => $request->email,
                'username'      => $request->username,
                'firstname'     => $request->firstname,
                'lastname'      => $request->lastname,
                'birthDate'     => $request->birthDate,
                'birthPlace'    => $request->birthPlace,
                'phoneNumber'   => $request->phoneNumber,
            ]);

            $user->update($data->toArray());

            return ResponseHelper::make($user);
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
