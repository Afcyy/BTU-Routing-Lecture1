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

Route::get('/', [QuizController::class, 'index']);

Route::get('quiz/create', [QuizController::class, 'create']);
Route::post('quiz/create', [QuizController::class, 'store']);

Route::get('quiz/edit/{id}', [QuizController::class, 'edit']);
Route::put('quiz/edit/{id}', [QuizController::class, 'update']);

Route::put('/subscribe', function (Request $request) {
   dd($request->email . " Subscribed!");
});
