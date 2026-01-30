<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\WorkController;

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

Route::get('/', [UserController::class, 'index']);

Route::get('/attendance', [UserController::class, '']);
Route::get('/attendance/list', [UserController::class, '']);
Route::get('/attendance/detail/{id}', [UserController::class, '']);
Route::get('/admin/attendance/list', [UserController::class, '']);
Route::get('/admin/attendance/{id}', [UserController::class, '']);
Route::get('/admin/staff/list', [UserController::class, '']);
Route::get('/admin/attendance/staff/{id}', [UserController::class, '']);
Route::get('/stamp_correction_request/approve/{attendance_correct_request_id}', [UserController::class, '']);
Route::get('/stamp_correction_request/list', [UserController::class, '']);
