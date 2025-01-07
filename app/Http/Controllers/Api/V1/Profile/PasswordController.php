<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Profile\Password\UpdateRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public $pageName = "Profile Password";

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        try {
            $user = User::find(Auth::id());

            if(! $user)
                throw new ResponseException('User not found', 404);

            $user->update([
                'password'  => Hash::make($request->password),
            ]);

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
