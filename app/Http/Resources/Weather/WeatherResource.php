<?php

namespace App\Http\Resources\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'location' => $this->location,
            'description' => $this->description,
            'temp' => $this->temp,
            'temp_max' => $this->temp_max,
            'temp_min' => $this->temp_min,
        ];
    }
}
