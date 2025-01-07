<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Exceptions\ResponseException;
use App\Helpers\CollectionHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Profile\Face\StoreRequest;
use App\Http\Requests\V1\Profile\Face\UpdateRequest;
use App\Http\Resources\Profile\FaceResource;
use App\Models\User\Face;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaceController extends Controller
{
    public $pageName = "User Face";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $email = $request->email;
            $faces = Face::whereRelation('user', 'email', $email)
                ->take(10)
                ->get();

            return ResponseHelper::make(
                FaceResource::collection($faces)
            );
        } catch (ResponseException $exception) {
            return ResponseHelper::error($exception);
        }
    }
}
