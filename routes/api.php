<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employees', \App\Http\Controllers\API\EmployeeController::class)->except(['index']);
Route::get('employees/{orderParam?}',[\App\Http\Controllers\API\EmployeeController::class,'index'])->name('employees.index');

Route::apiResource('company', \App\Http\Controllers\API\CompanyController::class)->only(['index','show','update']);

Route::apiResource('developer',\App\Http\Controllers\API\DeveloperController::class);
Route::apiResource('designer',\App\Http\Controllers\API\DesignerController::class);

