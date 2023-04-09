<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wather\WeatherGetRequest;
use App\Http\Resources\Weather\WeatherHistoryCollection;
use App\Http\Resources\Weather\WeatherResource;
use App\Repositories\UserRepository;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    protected WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param  WeatherGetRequest  $request
     * @return WeatherResource|JsonResponse
     */
    public function show(WeatherGetRequest $request): WeatherResource|JsonResponse
    {
        $response = Http::asForm()->get(
            config('app.openweathermap.url').$request->validated()['city'].'&APPID='.config('app.openweathermap.key')
        );

        if ($response->successful()) {
            return new WeatherResource($this->weatherService->store($response));
        }

        return response()->json(['message' => 'Wrong city name'], 400);
    }

    /**
     * @return WeatherHistoryCollection
     */
    public function history(): WeatherHistoryCollection
    {
        return new WeatherHistoryCollection(UserRepository::getUserWeatherHistory());
    }
}
