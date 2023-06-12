<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\AdminController;
use App\Http\Controllers\UserControllers\UserController;
use App\Http\Controllers\UserControllers\TeacherController;
use App\Http\Controllers\UserControllers\TeacherConsultationController;
use App\Http\Controllers\UserControllers\StudentController;
use App\Http\Controllers\ExamController\ExamController;
use App\Http\Controllers\SubjectController\SubjectController;
use App\Http\Controllers\ResultController\ResultController;
use App\Http\Controllers\FeedbackController\FeedbackController;
use App\Http\Controllers\McqsController\McqsController;
use App\Http\Controllers\RoleController\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/role',[UserController::class,'add_role']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // -----------------------------User Routes-----------------------------

Route::get('/add-user',[UserController::class,'add_user'])->name('add-user');
Route::post('/add-user',[UserController::class,'store_user'])->name('store-user');

// -----------------------------Admin Routes-----------------------------

Route::get('/admin-list',[AdminController::class,'show'])->name('admin-list');
Route::get('/add-admin',[AdminController::class,'add_admin'])->name('add-admin');
Route::post('/add-admin',[AdminController::class,'store_admin'])->name('store-admin');

// -----------------------------Teacher Routes----------------------------

Route::get('/teacher-list',[TeacherController::class,'show'])->name('teacher-list');
Route::get('/add-teacher',[TeacherController::class,'add_teacher'])->name('add-teacher');
Route::post('/add-teacher',[TeacherController::class,'store_teacher'])->name('store-teacher');

Route::get('/teacher-consultant-list',[TeacherConsultationController::class,'show_list'])->name('teacher-consultant-list');
Route::get('/add-teacher-consultant',[TeacherConsultationController::class,'add_teacher_consultant'])->name('add-teacher-consultant');
Route::post('/store-teacher-consultant',[TeacherConsultationController::class,'store_teacher_consultant'])->name('store-teacher-consultant');
// -------------------------------Student Routes----------------------------

Route::get('/student-list',[StudentController::class,'show'])->name('student-list');


// -------------------------------Exam Routes--------------------------------

Route::get('/exam-list',[ExamController::class,'show'])->name('exam-list');
Route::get('/add-exam',[ExamController::class,'add_exam'])->name('add-exam');
Route::post('/store-exam',[ExamController::class,'store_exam'])->name('store-exam');

Route::get('/student-exams/{id}',[ExamController::class,'show_student_exam'])->name('student-exams');
Route::get('/student-exam-results/{id}',[ExamController::class,'show_results'])->name('student-exam-results');

Route::get('/exam-instruction',[ExamController::class,'show_instructions'])->name('exam-instruction');
Route::get('/add-exam-instruction',[ExamController::class,'add_instructions'])->name('add-instruction');
Route::post('/store-exam-instruction',[ExamController::class,'store_instructions'])->name('store-instruction');

// -------------------------------Subject Routs-----------------------------------

Route::get('/subject-list',[SubjectController::class,'show'])->name('subject-list');
Route::get('/add-subject',[SubjectController::class,'add_subject'])->name('add-subject');
Route::post('/store-subject',[SubjectController::class,'store_subject'])->name('store-subject');

Route::get('add-subject-exam/{id}',[SubjectController::class,'add_subject_exam'])->name('add-subject-exam');
Route::post('store-subject-exam/',[SubjectController::class,'store_subject_exam'])->name('store-subject-exam');


// --------------------------------Result and Feedback Routes------------------------

Route::get('/show-result',[ResultController::class,'show_result'])->name('show-result');
Route::get('/show-feedback',[FeedbackController::class,'show_feedback'])->name('show-feedback');

// --------------------------------------MCQS Routs-----------------------------------------

Route::get('/show-mcqs',[McqsController::class,'show_mcqs'])->name('show-mcqs');
Route::get('/add-mcqs',[McqsController::class,'add_mcqs'])->name('add-mcqs');
Route::post('/store-mcqs',[McqsController::class,'store_mcqs'])->name('store-mcqs');


Route::get('/add-role',[RoleController::class,'add_role'])->name('add-role');
Route::post('/store-role',[RoleController::class,'store_role'])->name('store-role');
});

require __DIR__.'/auth.php';
