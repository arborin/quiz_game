<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StatisticController;
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



Route::get('/new-question', function(){
    return view('new_question');
})->name('new-question');


Route::get('/questions', [QuestionController::class, 'index'])->name('questions');

Route::post('/create-question', [QuestionController::class, 'create'])->name('create.question');

Route::post('/delete-question', [QuestionController::class, 'destroy'])->name('delete.question');

Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic');

Route::get('/random/{type?}', [QuestionController::class, 'getRandomQeustion'])->name('random.question');

Route::post('/check-answer', [QuizController::class, 'checkAnswer'])->name('check.answer');

Route::get('/{type?}', [QuizController::class, 'index'])->name('home');
