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
            'id' => $this->id,
            'city' => $this->weather->location,
            'description' => $this->weather->description,
            'temp' => $this->weather->temp,
            'temp_max' => $this->weather->temp_max,
            'temp_min' => $this->weather->temp_min,
            'date' => $this->created_at->format('Y-m-d'),
        ];
    }
}
