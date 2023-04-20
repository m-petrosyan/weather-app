<?php

namespace App\Http\Resources\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? null,
            'city' => $this['city'],
            'country' => $this['country'],
            'description' => $this['description'],
            'temp' => $this['temp'],
            'temp_max' => $this['temp_max'],
            'temp_min' => $this['temp_min'],
            'humidity' => $this['humidity'],
            'wind' => $this['wind'],
            'pressure' => $this['pressure'],
            'clouds' => $this['clouds'],
            'date' => isset($this['created_at']) ? $this->created_at->format('D, d M') : now()->format('D, d M'),
        ];
    }
}
