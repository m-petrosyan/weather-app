<?php

namespace App\Services;

use App\Models\Weather;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WeatherService
{
    public function store(object $response, string $city): Builder|Model
    {
        $weather = Weather::query()->updateOrCreate(
            ['city_id' => $response['sys']['id']],
            [
                'city_id' => $response['sys']['id'],
                'location' => $response['name'],
                'description' => $response['weather'][0]['description'],
                'temp' => $response['main']['temp'],
                'temp_max' => $response['main']['temp_max'],
                'temp_min' => $response['main']['temp_min'],
            ]
        );

        UserRepository::addUserWeatherHistory()->create(['text' => $city]);

        return $weather;
    }
}
