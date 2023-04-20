<?php

namespace App\Services;

use App\Models\Weather;
use App\Repositories\UserRepository;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    /**
     * @param  array  $request
     * @return PromiseInterface|Response
     */
    public function getWeather(array $request): PromiseInterface|Response
    {
        return Http::asForm()->get(
            config('app.openweathermap.url').$request['city'].'&APPID='.config(
                'app.openweathermap.key'
            ).'&units='.$request['units'] ?? 'metric'
        );
    }

    public function store(object $response)
    {
        $data = [
            'city_id' => $response['sys']['id'] ?? null,
            'country' => $response['sys']['country'] ?? null,
            'city' => $response['name'] ?? null,
            'description' => $response['weather'][0]['main'] ?? null,
            'temp' => $response['main']['temp'] ?? null,
            'temp_max' => $response['main']['temp_max'] ?? null,
            'temp_min' => $response['main']['temp_min'] ?? null,
            'pressure' => $response['main']['pressure'] ?? null,
            'humidity' => $response['main']['humidity'] ?? null,
            'wind' => $response['wind']['speed'] ?? null,
            'clouds' => $response['clouds']['all'] ?? null,
        ];

        if (auth('sanctum')->check()) {
            $data = Weather::query()->create($data);
            UserRepository::addUserWeatherHistory()->create(['weather_id' => $data->id]);
        }

        return $data;
    }
}
