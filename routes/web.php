<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/verify', 'Auth\RegisterController@verifyUser')
//    ->name('verify.user');


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-post', [PostController::class, 'addPost']);
Route::post('/create-post', [PostController::class, 'createPost'])
    ->name('post.create');
Route::get('/employees', [PostController::class, 'getPost']);
//Route::get('/employee-record',[PostController::class,'EmployeeRecord']);

Route::get('/create-survey', [App\Http\Controllers\SurveyController::class, 'indexSurvey']);
Route::post('/create-survey', [App\Http\Controllers\SurveyController::class, 'create'])->name('survey.create');

Route::get('/list-of-surveys', [App\Http\Controllers\SurveyController::class, 'ShowSurveys']);
Route::get('/display-surveys', [App\Http\Controllers\SurveyController::class, 'displaySurveys']);

Route::get('/question-module/{id}', [App\Http\Controllers\SurveyController::class, 'displayCategories']);

Route::get('/create-questions', [App\Http\Controllers\SurveyController::class, 'indexQuestions']);
Route::post('/create-questions', [App\Http\Controllers\SurveyController::class, 'sendQuestions'])->name('question.create');

Route::get('/category-tab', [App\Http\Controllers\SurveyController::class, 'CategoryTab']);
Route::get('/feedback-categories/{id}', [App\Http\Controllers\SurveyController::class, 'postFeedback']);


Auth::routes();

//Route::get('/verify', 'Auth\RegisterController@verifyUser')
//    ->name('verify.user');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');


