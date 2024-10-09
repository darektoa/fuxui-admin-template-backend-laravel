<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Exceptions\ResponseException;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\StoreRequest;
use App\Http\Requests\V1\User\UpdateRequest;
use App\Models\Log\ActivityLog;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $users = User::get();

            return ResponseHelper::make($users);
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
            $user = User::create([
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => Hash::make($request->password),
                'firstname'     => $request->firstname,
                'lastname'      => $request->lastname,
                'birthDate'    => $request->birthDate,
                'birthPlace'   => $request->birthPlace,
                'phoneNumber'  => $request->phoneNumber,
            ]);

            $user->roles()->attach($request->roleId);

            return ResponseHelper::created($user);
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
            $user = User::find($id);

            return ResponseHelper::make($user);
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
            $user = User::find($id);

            if(! $user)
                throw new ResponseException('User not found', 404);

            $data = collect([
                'email'         => $request->email,
                'username'      => $request->username,
                'firstname'     => $request->firstname,
                'lastname'      => $request->lastname,
                'birth_date'    => $request->birthDate,
                'birth_place'   => $request->birthPlace,
                'phone_number'  => $request->phoneNumber,
            ])->when(! Hash::check($request->password, $user->password), fn($collection) => (
                $collection->put('password', Hash::make($request->password))
            ));

            $user->update($data->toArray());
            $user->roles()->sync($request->roleId);

            return ResponseHelper::make($user);
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
            $user = User::find($id);

            if(! $user)
                throw new ResponseException('User not found', 404);

            $user->delete();

            return ResponseHelper::make();
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
