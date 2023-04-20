<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository
{
    /**
     * @return Authenticatable
     */
    public static function getLoggedInUser(): Authenticatable
    {
        return auth()->user();
    }

    public static function getUserWeatherHistory()
    {
        return auth()->user()->weatherHistory()->orderBy('id', 'desc')->paginate(5)->pluck('weather');
    }

    public static function addUserWeatherHistory()
    {
        return auth('sanctum')->user()->weatherHistory();
    }
}
