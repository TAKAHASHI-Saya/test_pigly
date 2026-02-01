<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/register/step1-2', [UserController::class, 'showWeightForm']);

Route::middleware('auth')->group(function()
{
    Route::post('/register/step2', [FirstRegisterController::class, 'store']);

    Route::get('/weight_logs', [AdminController::class, 'index'])->name('admin');
    Route::post('/weight_logs/create', [AdminController::class, 'store']);
    Route::get('/weight_logs/search', [AdminController::class, 'search']);
    Route::get('/weight_logs/goal', [AdminController::class, 'goalShow'])->name('weight-goal');
    Route::patch('/weight_logs/goal_setting', [AdminController::class, 'goalUpdate'])->name('goal-update');

    Route::get('/weight_logs/{weightLogId}', [AdminController::class, 'show'])->name('detail');
    Route::patch('/weight_logs/{weightLogId}', [AdminController::class, 'update'])->name('update');
    Route::delete('/weight_logs/{weightLogId}', [AdminController::class, 'destroy'])->name('destroy');
});