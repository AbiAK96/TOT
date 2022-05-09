<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordAPIController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherGroupController;

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
Route::middleware(['auth:sanctum'])->group(function(){
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('teachers', App\Http\Controllers\TeacherController::class);
Route::resource('questionTypes', App\Http\Controllers\QuestionTypesController::class);
Route::resource('questions', App\Http\Controllers\QuestionController::class);
Route::resource('schools', App\Http\Controllers\SchoolController::class);
Route::resource('teacherTypes', App\Http\Controllers\TeacherTypesController::class);
Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('login', [LoginController::class, 'loginview'])->name('auth.login');
Route::post('auth/login', [LoginController::class, 'login'])->name('auth/login');
Route::post('send/forgot-password', [ForgotPasswordAPIController::class,'forgotPassword']);
Route::get('auth/email-verification', [EmailVerificationController::class,'emailVerifyProcess']);

Route::delete('selectQuestions', [QuestionController::class,'selectQuestions']);
Route::get('selected-questions', [QuestionController::class,'selectedQuestions'])->name('selected_Questions.index');

Route::post('selectedquestionsdeleteAll', [QuestionController::class,'deleteSelectedQuestions']);
Route::delete('selectedquestionsdelete/{id}', [QuestionController::class,'deleteSelectedQuestionsSingle'])->name('selected_question.destroy');

Route::get('teacher_groups', [TeacherGroupController::class,'getTeacherGroups'])->name('teacher_groups.index');
Route::get('teacher_groups/create', [TeacherGroupController::class,'create'])->name('teacher_groups.create');
Route::post('teacher_groups/store', [TeacherGroupController::class,'storeTeacherGroups']);