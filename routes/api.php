<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Здесь можно зарегистрировать API-маршруты для вашего приложения.
| Эти маршруты загружаются в RouteServiceProvider и используют
| middleware "api".
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
