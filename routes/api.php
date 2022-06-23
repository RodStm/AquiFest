<?php

use App\Http\Controllers\api\CityController;

Route::apiResource('events', 'api\EventController');

Route::get('/city/{name}', [CityController::class, 'findByName']);
