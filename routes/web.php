<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/blade', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//auth()->logout()
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

//retorna todos os registros junto com user
Route::get('/people', [PersonController::class, 'index'])->middleware(['auth', 'verified'])->name('people');
Route::get('/peopleDataTable', [PersonController::class, 'getDataForDataTable'])->name('people');


require __DIR__.'/auth.php';
