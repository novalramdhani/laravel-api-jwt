<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        if (!$token = JWTAuth::attempt($request->validated())) {
            return response()->json([
                'code' => 404,
                'status' => false,
                'message' => 'Your credentials does not match'
            ], 404);
        }

        return (new UserResource(Auth::user()))->additional([
            'code' => 200,
            'status' => true,
            'token' => $token,
            'type' => 'Bearer',
            'message' => 'User login successfully.'
        ]);
    }
}
