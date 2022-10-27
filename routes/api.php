<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
], function () {
    // Auth Routes
    Route::post('auth', 'App\Http\Controllers\api\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\api\AuthController@logout');
    Route::post('testLogin', 'App\Http\Controllers\api\AuthController@testLogin');

    // Candidate Routes
    Route::post('lead', 'App\Http\Controllers\api\CandidateController@store');
    Route::get('lead/{id}', 'App\Http\Controllers\api\CandidateController@show');
    Route::get('leads', 'App\Http\Controllers\api\CandidateController@index');
}); 
