<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return UserResource::collection($users)->additional([
            'count' => $users->count()
        ]);
    }

    public function show($id)
    {
        $post = User::orderBy('id', 'desc')->findOrFail($id);

        return new UserResource($post);
    }
}
