<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Weather\WeatherResource;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    /**
     * @param  Request  $request
     * @param  WeatherService  $weatherService
     * @return WeatherResource|JsonResponse
     */
    public function __invoke(Request $request, WeatherService $weatherService): WeatherResource|JsonResponse
    {
        $response = Http::asForm()->get(
            'http://api.openweathermap.org/data/2.5/weather?q='.$request->city.'&APPID='.env('OPEN_WEATHER_KEY')
        );

        if ($response->successful()) {
            return new WeatherResource($weatherService->store($response, $request->city));
        }

        return response()->json(['message' => 'Wrong city name'], 400);
    }
}
