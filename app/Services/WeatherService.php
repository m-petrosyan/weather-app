<?php

namespace App\Services;

use App\Models\Weather;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WeatherService
{
    public function store(object $response): Builder|Model
    {
        $weather = Weather::query()->create(
            [
                'city_id' => $response['sys']['id'] ?? null,
                'location' => $response['name'] ?? null,
                'description' => $response['weather'][0]['description'] ?? null,
                'temp' => $response['main']['temp'] ?? null,
                'temp_max' => $response['main']['temp_max'] ?? null,
                'temp_min' => $response['main']['temp_min'] ?? null,
            ]

        );

        UserRepository::addUserWeatherHistory()->create(['weather_id' => $weather->id]);

        return $weather;
    }
}
