<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::withCount('questions')
            ->where('status', 'not_active')
            ->get();

        return view('quiz.index', compact('quizzes'));
    }

    public function publish(Quiz $quiz)
    {
        $quiz->update(['status' => 'active']);

        return redirect(route('quiz.show', $quiz));
    }
}
