<div class="w-1/2">
    <div class="flex flex-col items-center justify-center w-full">
        @if (!$showScore)
            <h1>{{ $quiz->name }}</h1>

            <form wire:submit.prevent="submitAnswer" wire:loading.attr="disabled">
                <img class="w-full" src="{{ $currentQuestion->image }}" alt="">
                <p class="mt-4 text-gray-500">Question {{ $currentQuestionIndex + 1 }}/{{ count($questions) }}</p>
                <p class="font-bold">{{ $currentQuestion->text }}</p>
                <ul>
                    @foreach (range(1, 4) as $option)
                        <li class="mt-2">
                            <label>
                                <input type="radio" wire:model="selectedAnswer" value="{{ $option }}" wire:loading.attr="disabled" {{ $answerSubmitted ? 'disabled' : '' }}>
                                {{ $currentQuestion->{"answer_".$option} }}
                            </label>
                        </li>
                    @endforeach
                </ul>

                @if (!$answerSubmitted)
                    <button class="bg-blue-500 text-white font-medium p-2 rounded-md w-full mt-6" type="submit" wire:loading.attr="disabled" wire:target="submitAnswer">Submit Answer</button>
                @endif
            </form>

            @if ($answerSubmitted)
                <p>
                    <span class="font-bold {{ $selectedAnswer == $currentQuestion->correct_answer ? 'text-green-500' : 'text-red-500' }}">
                    {{ $selectedAnswer == $currentQuestion->correct_answer ? 'Correct' : 'Incorrect' }}
                </span>
                </p>

                @if ($selectedAnswer != $currentQuestion->correct_answer)
                    <p class="text-green">Correct answer: {{ $currentQuestion->{'answer_'.$currentQuestion->correct_answer} }}</p>
                @endif

                <button class="bg-blue-500 text-white font-medium p-2 rounded-md w-full mt-2"
                        wire:click="nextQuestion" wire:loading.attr="disabled" wire:target="nextQuestion">Next Question</button>
            @endif
        @else
            <p class="font-bold text-3xl @if(($score/count($questions)) * 100 > 51) text-green-500 @else text-red-500 @endif">Quiz finished</p>

            <div class="mb-1 text-lg font-medium dark:text-white">Your final score: {{ $score }}/{{ count($questions) }}</div>
            <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700 mt-4">
                <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="{{'width: ' . ($score/count($questions)) * 100 . '%'}}"></div>
            </div>
        @endif
    </div>
</div>

