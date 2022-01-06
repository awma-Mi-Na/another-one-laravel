<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', function () {
    // redirect('/sanctum/csrf-cookie', 200);
    $attributes = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if (!Auth::attempt($attributes))
        // return request()->user()->createToken('authToken')->plainTextToken;
        return response('log in failed');
    Session::regenerate();
    dd(auth()->user());
    return redirect('/user');
});
Route::get('login', function () {
    return view('login');
});

Route::get('user', function () {
    // return auth()->user();
    dump(auth()->user());
});
