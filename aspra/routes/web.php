<?php

use App\Http\Controllers\MachineController;
use App\Http\Controllers\OiController;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('ois', OiController::class);

    Route::resource('products', ProductController::class);
    Route::resource('machines', MachineController::class);

    Route::resource('pois', PoiController::class);
    Route::resource('productionReports', ProductionReportController::class);
});
