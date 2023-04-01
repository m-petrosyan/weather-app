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
        return auth()->user()->weatherHistory()->orderBy('id', 'desc')->get();
    }

    public static function addUserWeatherHistory()
    {
        return auth()->user()->weatherHistory();
    }
}
