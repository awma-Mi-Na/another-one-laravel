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

Route::middleware('auth')->group(function () {
    Route::get('user', function () {
        return auth()->user();
    });
});

Route::post('/login', function () {
    $attributes = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if (!Auth::attempt($attributes))
        // return request()->user()->createToken('authToken')->plainTextToken;
        return response('log in failed');
    Session::regenerate();
    return redirect('/user');
});
