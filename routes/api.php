<?php

declare(strict_types=1);

use App\Http\Middleware\JsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::prefix('counter')->group(
    function () {
        Route::get('/', 'Counter\\CounterController@indexWithoutMiddleware');
        Route::get('/mid', 'Counter\\CounterController@indexWithMiddleware')->middleware(JsonMiddleware::class);
        Route::get('increment', 'Counter\\CounterController@increment');
        Route::get('decrement', 'Counter\\CounterController@decrement');
    }
);

