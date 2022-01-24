<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;

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
    return redirect('login', 302);
});

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('autologin')->middleware('guest');

Route::get('/registered', function() {
    return view('registered');
});

Route::get('/verified', function() {
    return view('verified');
});

Route::get('/forgot-password', function() {
    return view('forgot-password');
})->middleware('guest');

Route::get('/forgot-password-confirm', function() {
    return view('forgot-password-confirm');
})->middleware('guest');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/reset-password-confirm', function() {
    return view('reset-password-confirm');
})->middleware('guest');

Route::get('/lanregister', function() {
    return view('lanregister');
})->middleware('auth');

Route::get('/lanregister-done', function() {
    return view('lanregister-done');
})->middleware('auth');

Route::get('/lanedit', function() {
    return view('lanedit');
})->middleware('auth');

Route::get('/profile', function() {
    return view('profile');
})->middleware('auth');

Route::get('/registrations', function() {
    return view('registrations');
})->middleware('auth');

Route::get('/info', function() {
    return view('info');
});

Route::get('/users', function() {
    return view('users');
})->middleware('adminsonly');

Route::get('/account/verify/{token}',
    [VerificationController::class, 'verifyAccount']
)->name('user.verify');

Route::get('/logout',
    [LogoutController::class, 'logout']
);
