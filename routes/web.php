<?php

use App\Http\Controllers\MachineController;
use App\Http\Controllers\OiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\UserController;
use App\Models\ProductionReport;
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
    Route::get('schedule/recap', [ScheduleController::class, 'recap'])->name('schedules.recap');
    Route::get('schedule/recap/exportToExcel', [ScheduleController::class, 'exportToExcel'])->name('schedules.recap.exportToExcel');
    Route::resource('schedules', ScheduleController::class);
    Route::resource('spks', SpkController::class);
    Route::get('production_reports/recap/{type}', [ProductionReportController::class, 'recap'])->name('production_reports.recap');
    Route::get('production_reports/recap/{type}/exportToExcel', [ProductionReportController::class, 'exportToExcel'])->name('production_reports.recap.exportToExcel');
    Route::resource('production_reports', ProductionReportController::class);

    Route::resource('products', ProductController::class);
    Route::resource('machines', MachineController::class);

    Route::resource('settings', SettingController::class);

    Route::post('/send-message', 'App\Http\Controllers\WhatsAppController@sendMessage');
});
