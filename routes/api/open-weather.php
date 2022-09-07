<?php

use App\Http\Controllers\OpenWeatherController;
use Illuminate\Support\Facades\Route;

Route::post('/open-weather', [OpenWeatherController::class, 'search']);

