<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Route:apiResource('companies', CompanyController::class)
    Route::apiResource('/users', UserController::class);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/users/{userId}/roles', [UserRoleController::class, 'getUserRoles']);
});

