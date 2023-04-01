<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Weather\WeatherHistoryCollection;
use App\Repositories\UserRepository;

class WeatherHistoryController extends Controller
{
    /**
     * @return WeatherHistoryCollection
     */
    public function __invoke(): WeatherHistoryCollection
    {
        return new WeatherHistoryCollection(UserRepository::getUserWeatherHistory());
    }
}
