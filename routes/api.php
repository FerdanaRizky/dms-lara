<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenieAcsProxyController;
// API authentication is intentionally postponed until Sanctum is installed and configured.
// Web operations are protected by the session auth middleware.
Route::middleware('auth')->prefix('acs')->group(function () {
 Route::get('/devices', [GenieAcsProxyController::class,'devices']);
 Route::get('/devices/{deviceId}', [GenieAcsProxyController::class,'device']);
 Route::post('/devices/{deviceId}/tasks', [GenieAcsProxyController::class,'task']);
});
