<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConferenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{conference}', [ConferenceController::class, 'show'])->name('conferences.show');
    Route::post('/conferences/{conference}/register', [ConferenceController::class, 'register'])->name('conferences.register');

    Route::get('/employee/conferences', [ConferenceController::class, 'employee'])->name('conferences.employee');
    Route::get('/conferences/{conference}/attendees', [ConferenceController::class, 'attendees'])->name('conferences.attendees');

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/conferences', [ConferenceController::class, 'adminIndex'])->name('admin.conferences.index');
    Route::get('/admin/conferences/create', [ConferenceController::class, 'create'])->name('admin.conferences.create');
    Route::post('/admin/conferences', [ConferenceController::class, 'store'])->name('admin.conferences.store');
    Route::get('/admin/conferences/{conference}/edit', [ConferenceController::class, 'edit'])->name('admin.conferences.edit');
    Route::patch('/admin/conferences/{conference}', [ConferenceController::class, 'update'])->name('admin.conferences.update');
    Route::delete('/admin/conferences/{conference}', [ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__.'/auth.php';
