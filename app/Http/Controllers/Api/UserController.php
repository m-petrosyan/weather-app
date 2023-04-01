<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request): UserResource
    {
        return new UserResource($this->service->store($request->validated()));
    }


    /**
     * @param  UserLoginRequest  $request
     * @return Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
     */
    public function login(UserLoginRequest $request
    ): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory {
        if (Auth::attempt($request->validated())) {
            $success = UserRepository::getLoggedInUser()->createToken('MyApp')->plainTextToken;

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
