<?php

use App\Http\Controllers\ElementoController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });

Route::resource('elementos', ElementoController::class)->names('elementos')->middleware('auth');
Route::resource('reportes', ObservationController::class)->except('store')->names('reportes')->middleware('auth');
Route::resource('roles', RoleController::class)->except('show')->names('roles')->middleware('auth');

Route::get('reportes.users', [ObservationController::class,'users'])->name('reportes.users')->middleware('auth','can:reportes.users');
Route::get('reportes.reset/{user}', [ObservationController::class,'reset'])->name('reportes.reset')->middleware('auth','can:reportes.reset');
Route::get('reportes.actualizar/{user}', [ObservationController::class,'actualizar'])->name('reportes.actualizar')->middleware('auth','can:reportes.actualizar');
Route::post('reportes.modificar/{user}', [ObservationController::class,'modificar'])->name('reportes.modificar')->middleware('auth','can:reportes.modificar');
Route::get('reportes.nuevo', [ObservationController::class,'nuevo'])->name('reportes.nuevo')->middleware('auth','can:reportes.nuevo');
Route::post('reportes.agregar', [ObservationController::class,'agregar'])->name('reportes.agregar')->middleware('auth','can:reportes.agregar');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () { Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard'); });