<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    // Role routes
    Route::get('/get-roles', [\App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/get-roles/{id}', [\App\Http\Controllers\RoleController::class, 'show']);
    Route::post('/add-role', [\App\Http\Controllers\RoleController::class, 'store']);
    Route::put('/edit-role/{id}', [\App\Http\Controllers\RoleController::class, 'update']);
    Route::delete('/delete-role/{id}', [\App\Http\Controllers\RoleController::class, 'destroy']);

    // User Status routes
    Route::get('/get-statuses', [\App\Http\Controllers\UserStatusController::class, 'index']);
    Route::get('/get-statuses/{id}', [\App\Http\Controllers\UserStatusController::class, 'show']);
    Route::post('/add-status', [\App\Http\Controllers\UserStatusController::class, 'store']);
    Route::put('/edit-status/{id}', [\App\Http\Controllers\UserStatusController::class, 'update']);
    Route::delete('/delete-status/{id}', [\App\Http\Controllers\UserStatusController::class, 'destroy']);

    // Adopter routes
    Route::get('/get-adopters', [\App\Http\Controllers\AdopterController::class, 'index']);
    Route::get('/get-adopters/{id}', [\App\Http\Controllers\AdopterController::class, 'show']);
    Route::post('/add-adopters', [\App\Http\Controllers\AdopterController::class, 'store']);
    Route::put('/edit-adopters/{id}', [\App\Http\Controllers\AdopterController::class, 'update']);
    Route::delete('/delete-adopters/{id}', [\App\Http\Controllers\AdopterController::class, 'destroy']);

    // Adoption routes
    Route::get('/get-adoptions', [\App\Http\Controllers\AdoptionController::class, 'index']);
    Route::get('/get-adoptions/{id}', [\App\Http\Controllers\AdoptionController::class, 'show']);
    Route::post('/add-adoptions', [\App\Http\Controllers\AdoptionController::class, 'store']);
    Route::put('/edit-adoptions/{id}', [\App\Http\Controllers\AdoptionController::class, 'update']);
    Route::delete('/delete-adoptions/{id}', [\App\Http\Controllers\AdoptionController::class, 'destroy']);

    // Pet routes
    Route::get('/get-pets', [\App\Http\Controllers\PetController::class, 'index']);
    Route::get('/get-pets/{id}', [\App\Http\Controllers\PetController::class, 'show']);
    Route::post('/add-pets', [\App\Http\Controllers\PetController::class, 'store']);
    Route::put('/edit-pets/{id}', [\App\Http\Controllers\PetController::class, 'update']);
    Route::delete('/delete-pets/{id}', [\App\Http\Controllers\PetController::class, 'destroy']);
    
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
