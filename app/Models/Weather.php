<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'country',
        'city',
        'description',
        'temp',
        'temp_max',
        'temp_min',
        'humidity',
        'wind',
        'pressure',
        'clouds',
    ];
}
