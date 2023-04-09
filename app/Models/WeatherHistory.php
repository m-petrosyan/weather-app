<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'weather_id',
    ];

    public function weather(): BelongsTo
    {
        return $this->belongsTo(Weather::class);
    }
}
