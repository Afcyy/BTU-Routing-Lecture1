<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::all();

        return view('welcome', compact('quizzes'));
    }

    public function createOrUpdate(Quiz $quiz, Request $request) {
        $quiz->fill($request->all())->save();
        return redirect()->route('index');
    }

    public function edit(Quiz $quiz)
    {
        return view('form', compact('quiz'));
    }
}
