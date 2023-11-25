<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/students', [StudentController::class,'index']); //+
Route::get('/students/{id}', [StudentController::class,'show']);
Route::post('/students', [StudentController::class,'store']);
Route::put('/students/{id}', [StudentController::class,'update']);
Route::delete('/students/{id}', [StudentController::class,'destroy']);

Route::get('/classes', [ClassesController::class, 'index']);
Route::get('/classes/{id}', [ClassesController::class,'show']);
Route::get('/classes/{id}/lecture-plan', [ClassesController::class,'getLecturePlan']);
Route::post('/classes/{id}/lecture-plan', [ClassesController::class,'createOrUpdateLecturePlan']);
Route::post('/classes', [ClassesController::class,'store']);
Route::put('/classes/{id}', [ClassesController::class,'update']);
Route::delete('/classes/{id}', [ClassesController::class,'destroy']);

Route::get('/lectures', [LectureController::class,'index']);
Route::get('/lectures/{id}', [LectureController::class,'show']);
Route::post('/lectures', [LectureController::class,'store']);
Route::put('/lectures/{id}', [LectureController::class,'update']);
Route::delete('/lectures/{id}', [LectureController::class,'destroy']);
