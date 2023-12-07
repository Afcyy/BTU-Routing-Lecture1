<?php

use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Quiz;

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

Route::get('/', [QuizController::class, 'index'])->name('index');

Route::get('quiz/edit/{quiz?}', [QuizController::class, 'edit'])->name('quiz.edit');
Route::put('quiz/edit/{quiz?}', [QuizController::class, 'createOrUpdate'])->name('quiz.createOrUpdate');

Route::view('error', 'error')->name('error');

Route::put('/subscribe', function (Request $request) {
   dd($request->email . " Subscribed!");
})->middleware('my-super-middleware');
