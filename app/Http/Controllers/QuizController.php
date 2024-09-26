<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::withCount('questions')
        ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNotNull('image')
                    ->orWhereNotNull('description');
            })
            ->orderByRaw('IF(image IS NOT NULL, 0, 1)')
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        return view('quiz.index', compact('quizzes'));
    }

    public function store(Request $request) {
        $quiz = auth()->user()->quiz()->create($request->only(['name', 'description', 'image']));

        foreach($request->questions as $question) {
            $quiz->questions()->create([
                'text' => $question['text'],
                'image' => $question['image'],
                'answer_1' => $question['answers'][0],
                'answer_2' => $question['answers'][1],
                'answer_3' => $question['answers'][2],
                'answer_4' => $question['answers'][3],
                'correct_answer' => $question['correct_answer']
            ]);
        };

        return redirect()->route('index');
    }

    public function edit(Quiz $quiz)
    {
        return view('quiz.store', compact('quiz'));
    }

    public function show(Quiz $quiz)
    {
        return view('quiz.show', compact('quiz'));
    }

    public function destroy(Quiz $quiz)
    {
        if(in_array(auth()->id(), [$quiz->user->id, 1])){
            $quiz->delete();
        }

        return redirect(route('index'));
    }

    public function take(Quiz $quiz)
    {
        return view('quiz.take', compact('quiz'));
    }
}
