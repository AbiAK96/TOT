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
use App\Http\Controllers\BookController;
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

    Route::middleware(['super_admin'])->group(function(){
        Route::resource('schools', App\Http\Controllers\SchoolController::class);
        Route::resource('questionTypes', App\Http\Controllers\QuestionTypesController::class);
        Route::resource('questions', App\Http\Controllers\QuestionController::class);
        Route::get('selected-questions', [QuestionController::class,'selectedQuestions'])->name('selected_Questions.index');
    });
    Route::middleware(['admin'])->group(function(){
        Route::get('admin/exams', [ExamController::class,'getExams'])->name('admin_exams.index'); 
        Route::get('admin/exams/create', [ExamController::class,'createExams'])->name('admin_exams.create');
        Route::post('admin/exams/create', [ExamController::class,'storeExams'])->name('admin_exams.store');
        Route::get('admin/request', [RequestController::class,'indexadmin'])->name('admin_requests.index');
        Route::post('admin/request/approve', [RequestController::class,'approve'])->name('admin_requests.approve');
        Route::post('admin/teacher/request/show', [RequestController::class,'show'])->name('admin_requests.show');
        Route::get('admin/teacher/request/show', [RequestController::class,'view'])->name('admin_requests.view');
        Route::get('teacher_groups', [TeacherGroupController::class,'getTeacherGroups'])->name('teacher_groups.index');
        Route::get('teacher_groups/create', [TeacherGroupController::class,'create'])->name('teacher_groups.create');
        Route::post('teacher_groups/store', [TeacherGroupController::class,'storeTeacherGroups']);
    });
    Route::middleware(['teacher'])->group(function(){

        Route::get('teacher/request', [RequestController::class,'index'])->name('teacher_requests.index');
        Route::get('teacher/request/create', [RequestController::class,'create'])->name('teacher_requests.create');
        Route::post('teacher/request/make', [RequestController::class,'make'])->name('teacher_requests.make');
        Route::get('teacher/exams', [TeacherController::class,'getExams'])->name('teacher_exams.index');
        Route::get('teacher/exams/start', [TeacherController::class,'getExamsQuestions'])->name('teacher_exams.start');
        Route::post('teacher/exams/store', [TeacherController::class,'storeResults'])->name('teacher_exams.store');
        Route::get('teacher/books', [BookController::class,'booksIndex'])->name('teacher_books.index');
        Route::get('teacher/books/show/{id}', [BookController::class,'booksShow'])->name('teacher_books.show');
        Route::post('teacher/books/download/{id}', [BookController::class,'booksDownload'])->name('teacher_books.download');
    });
    Route::middleware(['admin_super_admin'])->group(function(){
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('books', BookController::class); 
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('teachers', App\Http\Controllers\TeacherController::class);

    Route::resource('teacherTypes', App\Http\Controllers\TeacherTypesController::class);
    Route::get('search/users', [App\Http\Controllers\TeacherController::class,'searchTeacher'])->name('users.search');
    Route::get('search/schools', [App\Http\Controllers\SchoolController::class,'searchSchool'])->name('schools.search');
    Route::get('search/questions', [App\Http\Controllers\QuestionController::class,'searchQuestion'])->name('questions.search');
    Route::get('users/results/{id}', [App\Http\Controllers\TeacherController::class,'getTeacherResult'])->name('results.index');
    Route::get('users/results/question-details/{id}', [App\Http\Controllers\TeacherController::class,'getResultQuestionsDeatils'])->name('results.question_details');
    Route::post('send/forgot-password', [ForgotPasswordAPIController::class,'forgotPassword']);
    Route::get('auth/email-verification', [EmailVerificationController::class,'emailVerifyProcess']);
    Route::delete('selectQuestions', [QuestionController::class,'selectQuestions']);
    Route::get('selected-questions/remove/{id}', [QuestionController::class,'remove'])->name('selected_Questions.remove');

   // Route::post('selectedquestionsdeleteAll', [QuestionController::class,'deleteSelectedQuestions']);
   // Route::delete('selectedquestionsdelete/{id}', [QuestionController::class,'deleteSelectedQuestionsSingle'])->name('selected_question.destroy');

    Route::post('import', [App\Http\Controllers\UserController::class,'import']);
    Route::get('downloadfile',[App\Http\Controllers\UserController::class,'downloadfile'])->name('sample_csv_download');
    Route::get("data", [App\Http\Controllers\UserController::class, "read"]);



    Route::get('profile', [TeacherController::class,'profileIndex'])->name('profile.index');
    Route::post('profile', [TeacherController::class,'profileUpdate'])->name('profile.update');
    Route::get('profile/edit', [TeacherController::class,'profileEdit'])->name('profile.edit');
    Route::get('profile/password', [TeacherController::class,'changePasswordView'])->name('profile.password-show');
    Route::post('profile/password', [TeacherController::class,'changePassword'])->name('profile.password-update');

    Route::get('tearcher_group/search', [TeacherGroupController::class,'searchTeachers'])->name('tearcher_group.search');
    Route::delete('teacher_groups/delete', [TeacherGroupController::class,'destroy'])->name('teacher_groups.delete');
    Route::get('teacher_groups/target/{id}', [TeacherGroupController::class,'getTargets'])->name('teacher_groups.target');

    // Route::get('teacher/books', [BookController::class,'index'])->name('teacher_books.index');
    // Route::get('teacher/books', [BookController::class,'index'])->name('teacher_books.index');
});


