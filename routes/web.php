<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    $quizzes = [
        [
            "name" => "Quiz #1",
            "img" => "https://plus.unsplash.com/premium_photo-1675024298717-02d612d9cc82?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8SVR8ZW58MHx8MHx8fDA%3D",
            "status" => "Passed"
        ],
        [
            "name" => "Quiz #2",
            "img" => "https://plus.unsplash.com/premium_photo-1675024367645-68d0d6c30254?auto=format&fit=crop&q=80&w=2022&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            "status" => "Upcoming"
        ],
        [
            "name" => "Quiz #3",
            "img" => "https://plus.unsplash.com/premium_photo-1675024226990-36dcb7252c62?auto=format&fit=crop&q=80&w=1970&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            "status" => "Failed"
        ],
    ];

    return view('welcome', compact('quizzes'));
});

Route::put('/subscribe', function (Request $request) {
   dd($request->email . " Subscribed!");
});
