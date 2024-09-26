<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
Route::put('quiz/edit/{quiz?}', [QuizController::class, 'store'])->name('quiz.store');
Route::get('quiz/show/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
Route::delete('quiz/destroy/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy');
Route::get('quiz/take/{quiz}', [QuizController::class, 'take'])->name('quiz.take');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/publish/{quiz}', [AdminController::class, 'publish'])->name('admin.quiz.publish');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'checkAuth'])->name('login.check');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('store');

Route::put('/subscribe', function (Request $request) {
    dd($request->email . " Subscribed!");
});
