<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param  UserLoginRequest  $request
     * @return Application|Response|ResponseFactory
     */
    public function login(UserLoginRequest $request): Application|Response|ResponseFactory
    {
        if (Auth::attempt($request->validated())) {
            $success = UserRepository::getLoggedInUser()->createToken('api-token')->plainTextToken;

            return Response(['token' => $success], 200);
        }

        return Response(['message' => 'email or password wrong'], 401);
    }

    /**
     * @return UserResource
     */
    public function auth(): UserResource
    {
        return new UserResource(UserRepository::getLoggedInUser());
    }
}
