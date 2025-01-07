<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\UsernameHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\StoreRequest;
use App\Http\Requests\V1\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Log\ActivityLog;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $pageName = "User";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->search;
            $users = User::with(['roles'])
                ->when((bool) $search, fn($query) => (
                    $query->where('firstname', 'like', "%$search%")
                        ->orWhere('lastname', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                ))
                ->get();

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
            $email = $request->email;
            $user = User::create([
                'email'         => $email,
                'username'      => $request->username ?? UsernameHelper::fromEmail($email),
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
            $user = User::with([
                    'profilePictures' => fn($query) => $query->latest(),
                    'roles'
                ])
                ->find($id);

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
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $password = $request->password;
            $user = User::find($id);

            if(! $user)
                throw new ResponseException('User not found', 404);

            $data = CollectionHelper::getOrOld($request->all(), $user, [
                    'email',
                    'username',
                    'firstname',
                    'lastname',
                    'birthDate',
                    'birthPlace',
                    'phoneNumber',
                ])
                ->when($password, fn($collection) => (
                    $collection->put('password', Hash::make($password))
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
