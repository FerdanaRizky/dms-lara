<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\GenieAcsConnectionController;
Route::get('/', fn () => redirect()->route('login'));
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class,'create'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'store'])->name('login.store');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'destroy'])->middleware('auth')->name('logout');
Route::middleware(['auth'])->group(function () {
 Route::get('/dashboard', DashboardController::class)->name('dashboard');
 Route::get('/devices', [DeviceController::class,'index'])->name('devices.index');
 Route::get('/devices/{deviceId}', [DeviceController::class,'show'])->name('devices.show');
 Route::post('/devices/{deviceId}/tasks', [DeviceController::class,'task'])->name('devices.task');
 Route::get('/settings/genieacs', [GenieAcsConnectionController::class,'edit'])->name('settings.genieacs');
 Route::put('/settings/genieacs', [GenieAcsConnectionController::class,'update'])->name('settings.genieacs.update');
 Route::post('/settings/genieacs/test', [GenieAcsConnectionController::class,'test'])->name('settings.genieacs.test');
});
