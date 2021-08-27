<?php

use App\Http\Procedures\ActivityProcedure;
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

Route::rpc('/v1/activity', [ActivityProcedure::class])
    ->name('rpc.activity')
    ->middleware('auth_token');
