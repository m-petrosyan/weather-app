<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wather\WeatherGetRequest;
use App\Http\Resources\Weather\WeatherHistoryCollection;
use App\Http\Resources\Weather\WeatherHistoryResource;
use App\Http\Resources\Weather\WeatherResource;
use App\Repositories\UserRepository;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

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
    public function show(WeatherGetRequest $request): WeatherHistoryResource|JsonResponse
    {
        $response = $this->weatherService->getWeather($request->validated());

        if ($response->successful()) {
            return new WeatherHistoryResource($this->weatherService->store($response));
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
