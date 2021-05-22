<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('teacher/all',[TeacherController::class,'index']);
Route::post('/teacher/store/',[TeacherController::class,'create']);
Route::get('/teacher/edit/{id?}',[TeacherController::class,'edit']);
Route::post('/teacher/update/{id?}',[TeacherController::class,'update']);
Route::post('/teacher/delete/{id?}',[TeacherController::class,'destroy']);
