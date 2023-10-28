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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);

        return view('form', compact('quiz', 'id'));
    }

    public function update(Request $request, $id)
    {
        Quiz::updateOrCreate([
            'id' => $id
        ], $request->all());

        return redirect('/');
    }

    public function destroy($id)
    {
        //
    }
}
