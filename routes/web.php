<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordAPIController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherGroupController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RequestController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

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

Auth::routes();
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('teachers', App\Http\Controllers\TeacherController::class);
    Route::resource('questionTypes', App\Http\Controllers\QuestionTypesController::class);
    Route::resource('questions', App\Http\Controllers\QuestionController::class);
    Route::resource('schools', App\Http\Controllers\SchoolController::class);
    Route::resource('teacherTypes', App\Http\Controllers\TeacherTypesController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::post('send/forgot-password', [ForgotPasswordAPIController::class,'forgotPassword']);
    Route::get('auth/email-verification', [EmailVerificationController::class,'emailVerifyProcess']);

    Route::delete('selectQuestions', [QuestionController::class,'selectQuestions']);
    Route::get('selected-questions', [QuestionController::class,'selectedQuestions'])->name('selected_Questions.index');

    Route::post('selectedquestionsdeleteAll', [QuestionController::class,'deleteSelectedQuestions']);
    Route::delete('selectedquestionsdelete/{id}', [QuestionController::class,'deleteSelectedQuestionsSingle'])->name('selected_question.destroy');

    Route::get('teacher_groups', [TeacherGroupController::class,'getTeacherGroups'])->name('teacher_groups.index');
    Route::get('teacher_groups/create', [TeacherGroupController::class,'create'])->name('teacher_groups.create');
    Route::post('teacher_groups/store', [TeacherGroupController::class,'storeTeacherGroups']);

    Route::get('admin/exams', [ExamController::class,'getExams'])->name('admin_exams.index');
    Route::get('admin/exams/create', [ExamController::class,'createExams'])->name('admin_exams.create');
    Route::post('admin/exams/create', [ExamController::class,'storeExams'])->name('admin_exams.store');

    Route::get('teacher/request', [RequestController::class,'index'])->name('teacher_requests.index');
    Route::get('teacher/request/create', [RequestController::class,'create'])->name('teacher_requests.create');
    Route::post('teacher/request/make', [RequestController::class,'make'])->name('teacher_requests.make');

    Route::get('admin/request', [RequestController::class,'indexadmin'])->name('admin_requests.index');
    Route::post('admin/request/approve', [RequestController::class,'approve'])->name('admin_requests.approve');
    Route::post('teacher/request/show', [RequestController::class,'show'])->name('admin_requests.show');
    Route::get('teacher/request/show', [RequestController::class,'view'])->name('admin_requests.view');

    Route::post('import', [App\Http\Controllers\UserController::class,'import']);
    Route::get('downloadfile',[App\Http\Controllers\UserController::class,'downloadfile'])->name('sample_csv_download');
    Route::get("data", [App\Http\Controllers\UserController::class, "read"]);

    Route::get('teacher/exams', [TeacherController::class,'getExams'])->name('teacher_exams.index');
    Route::get('teacher/exams/start', [TeacherController::class,'getExamsQuestions'])->name('teacher_exams.start');
    Route::post('teacher/exams/store', [TeacherController::class,'storeResults'])->name('teacher_exams.store');
});