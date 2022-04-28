<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'applicants', 'middleware' => ['auth:sanctum']], function(){
    Route::get('/', [ApplicantController::class, 'index']);
    Route::post('/', [ApplicantController::class, 'store']);
    Route::get('/{id}', [ApplicantController::class, 'show']);
    Route::put('/{id}', [ApplicantController::class, 'update']);
    Route::delete('/{id}', [ApplicantController::class, 'destroy']);
});

Route::group(['prefix' => 'employees', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
});

Route::group(['prefix' => 'departments', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    Route::put('/{id}', [DepartmentController::class, 'update']);
    Route::delete('/{id}', [DepartmentController::class, 'destroy']);
});

Route::group(['prefix' => 'branch-offices', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [BranchOfficeController::class, 'index']);
    Route::post('/', [BranchOfficeController::class, 'store']);
    Route::get('/{id}', [BranchOfficeController::class, 'show']);
    Route::put('/{id}', [BranchOfficeController::class, 'update']);
    Route::delete('/{id}', [BranchOfficeController::class, 'destroy']);
});

Route::group(['prefix' => 'jobs', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [JobController::class, 'index']);
    Route::post('/', [JobController::class, 'store']);
    Route::get('/{id}', [JobController::class, 'show']);
    Route::put('/{id}', [JobController::class, 'update']);
    Route::delete('/{id}', [JobController::class, 'destroy']);
});

Route::group(['prefix' => 'genders', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [GenderController::class, 'index']);
});
