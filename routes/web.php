<?php

use App\Http\Controllers\QuestionController;
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

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/new-question', function(){
    return view('new_question');
})->name('new-question');


Route::get('/questions', [QuestionController::class, 'index'])->name('questions');

Route::post('create-question', [QuestionController::class, 'create'])->name('create.question');

Route::post('delete-question', [QuestionController::class, 'destroy'])->name('delete.question');

