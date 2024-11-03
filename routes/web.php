<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\admin\ConferenceController;
use App\Http\Controllers\admin\UserController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register/{id}', function (int $conferenceId) {
    return view('register', ['conference' => $conferenceId]);
})->name('regiter.form');

Route::post('register/{conference}', [ClientController::class, 'submit'])->name('register.submit');

Route::resource('clients', ClientController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('users', UserController::class);
Route::resource('conferences', ConferenceController::class);
