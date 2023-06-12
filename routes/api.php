<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\StudentController;
use App\Http\Controllers\frontend\SubjectController;
use App\Http\Controllers\frontend\ExamController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add-student',[StudentController::class,'register_student']);
Route::post('signin-student',[StudentController::class,'signin_student']);
Route::post('create-profile',[StudentController::class,'create_profile']);
Route::post('get-account',[StudentController::class,'get_account']);
Route::post('change-password',[StudentController::class,'change_password']);

Route::post('change-password',[StudentController::class,'change_password']);
Route::post('get-subject',[SubjectController::class,'get_subject']);

Route::get('get-mcqs',[SubjectController::class,'get_mcqs']);

Route::get('get-exam',[ExamController::class,'get_exams']);

Route::post('store-student-exam',[StudentController::class,'store_student_exam']);

Route::post('store-student-result',[StudentController::class,'store_student_result']);

Route::post('show-result',[StudentController::class,'show_result']);