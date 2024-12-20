<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartiesTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('login_post', [AuthController::class, 'login_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post',[AuthController::class, 'register_post']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);


Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/parties_type', [PartiesTypeController::class, 'parties_type']);
    Route::get('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_add']);
    Route::post('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_insert']);
});

Route::get('logout', [AuthController::class, 'logout']);
