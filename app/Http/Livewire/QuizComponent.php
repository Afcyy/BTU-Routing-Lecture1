<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizComponent extends Component
{
    public $quiz;
    public $questions;
    public $currentQuestionIndex = 0;
    public $currentQuestion;
    public $selectedAnswer;
    public $answerSubmitted = false;
    public $score = 0;
    public $showScore = false;

    public function mount($quizId)
    {
        $this->quiz = Quiz::find($quizId);
        $this->questions = Question::where('quiz_id', $quizId)->get();
        $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
    }

    public function submitAnswer()
    {
        $this->validate([
            'selectedAnswer' => 'required|in:1,2,3,4',
        ]);

        $this->answerSubmitted = true;

        if ($this->selectedAnswer == $this->currentQuestion->correct_answer) {
            $this->score++;
        }
    }

    public function updatedSelectedAnswer()
    {
        $this->answerSubmitted = false;
    }

    public function render()
    {
        return view('livewire.quiz-component');
    }

    public function nextQuestion()
    {
        $this->currentQuestionIndex++;

        if ($this->currentQuestionIndex < count($this->questions)) {
            $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
            $this->selectedAnswer = null;
            $this->answerSubmitted = false;
        } else {
            $this->showScore = true;
        }
    }
}


