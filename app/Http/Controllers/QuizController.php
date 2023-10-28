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

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        Quiz::create($request->all());

        return redirect('/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);

        if(!$quiz) {
            return redirect('/quiz/create');
        }

        return view('form', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        Quiz::find($id)->update($request->all());

        return redirect('/');
    }

    public function destroy($id)
    {
        //
    }
}
