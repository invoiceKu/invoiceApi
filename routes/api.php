<?php

use App\Http\Controllers\AlamatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\JwtMiddleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([
    EnsureFrontendRequestsAreStateful::class,
    'auth:sanctum'
])->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });
});
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/alamat', [AlamatController::class, 'alamat']);