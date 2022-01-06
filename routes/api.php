<?php

use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function () {
        return auth()->user();
    });
    Route::middleware('role:admin')->prefix('admin')->apiResource('student', StudentController::class)->except(['show'])->parameters(['student' => 'roll_no']);
});

// Route::resource('student', StudentController::class);

Route::post('/login', function (Request $request) {
    $attributes = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if (!Auth::attempt($attributes))
        return response('log in failed');
    return request()->user()->createToken('authToken')->plainTextToken;
});

Route::resource('student', StudentController::class)->only('show')->scoped(['student' => 'roll_no']);
