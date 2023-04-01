<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    /**
     * @param  array  $request
     * @return Model
     */
    public function store(array $request): Model
    {
        return User::query()->create($request);
    }
}
