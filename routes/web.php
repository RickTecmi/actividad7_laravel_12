<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoboticsKitController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de recursos para cada controlador
Route::resource('groups', GroupController::class);
Route::resource('courses', CourseController::class);
Route::resource('kits', RoboticsKitController::class);
Route::resource('users', UserController::class);
