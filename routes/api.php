<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenieAcsProxyController;
Route::middleware('auth:sanctum')->prefix('acs')->group(function () {
 Route::get('/devices', [GenieAcsProxyController::class,'devices']);
 Route::get('/devices/{deviceId}', [GenieAcsProxyController::class,'device']);
 Route::post('/devices/{deviceId}/tasks', [GenieAcsProxyController::class,'task']);
});
