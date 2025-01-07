<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Passport\Client;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public $pageName = "Sign In";

    public function face(Request $request)
    {
        $email = $request->email;
        $user = User::where("email", $email)
            ->first();

        $token = $user->createToken('Face Sign-In', ["*"]);

        return response()->json([
            'token_type' => "Bearer",
            'expires_in' => round(now()->diffInSeconds($token->token->expires_at)),
            'access_token' => $token->accessToken,
        ]);
    }
}
