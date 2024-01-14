@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')

    <div class="h-fit flex flex-col justify-center items-center">
        <form action="{{ route('quiz.store', $quiz) }}" method="POST" style="width: 75%;">
            @csrf
            @method('PUT')

            <div class="my-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input name="name" value="{{ isset($quiz) ? $quiz->name : '' }}" type="text" id="name"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                       required>
            </div>

            <div class="my-3">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input name="description" value="{{ isset($quiz) ? $quiz->description : '' }}" type="text"
                       id="description"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="my-3">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input name="image" value="{{ isset($quiz) ? $quiz->image : '' }}" type="text" id="deadline"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <p class="block text-md font-medium text-gray-900 dark:text-white">Questions</p>
            <div id="questions-container">
                <!-- Default question field -->
                <div class="question-container my-3 space-y-4 border rounded-md p-4">
                    <div>
                        <label for="question_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question 1</label>
                        <input name="questions[1][text]" type="text"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">

                        <label for="question_1_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input name="questions[1][image]" type="text"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    </div>
                    <div>
                        <label for="answers_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answers:</label>
                        <div class="flex space-x-2">
                            <input name="questions[1][answers][]" type="text" placeholder="Answer 1"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <input name="questions[1][answers][]" type="text" placeholder="Answer 2"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <input name="questions[1][answers][]" type="text" placeholder="Answer 3"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <input name="questions[1][answers][]" type="text" placeholder="Answer 4s"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">

                        </div>
                    </div>
                    <label for="correct_answer_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correct Answer:</label>
                    <select name="questions[1][correct_answer]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">Answer 1</option>
                        <option value="2">Answer 2</option>
                        <option value="3">Answer 3</option>
                        <option value="4">Answer 4</option>
                    </select>
                </div>
            </div>

            <button type="button" onclick="addQuestion()" class="my-3 btn btn-primary">
                Add Question
            </button>


            <button type="submit"
                    class="my-12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none w-full">
                Submit
            </button>
        </form>
    </div>

    <script>
        let questionCount = 1;

        function addQuestion() {
            questionCount++;
            const container = document.getElementById('questions-container');

            const questionContainer = document.createElement('div');
            questionContainer.className = 'question-container my-3 space-y-4 border rounded-md p-4';

            // Question text input
            const questionTextContainer = document.createElement('div');
            questionTextContainer.innerHTML = `
            <label for="question_${questionCount}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question ${questionCount}</label>
            <input name="questions[${questionCount}][text]" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">

            <label for="question_${questionCount}_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input name="questions[${questionCount}][image]" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        `;
            questionContainer.appendChild(questionTextContainer);

            // Answers input
            const answersContainer = document.createElement('div');
            answersContainer.className = 'flex space-x-2';

            for (let i = 1; i <= 4; i++) {
                const answerInput = document.createElement('input');
                answerInput.name = `questions[${questionCount}][answers][]`;
                answerInput.type = 'text';
                answerInput.placeholder = `Answer ${i}`;
                answerInput.className = 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light';
                answersContainer.appendChild(answerInput);
            }
            questionContainer.appendChild(answersContainer);

            // Correct Answer dropdown
            const correctAnswerSelect = document.createElement('select');
            correctAnswerSelect.name = `questions[${questionCount}][correct_answer]`;
            correctAnswerSelect.className = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
            for (let i = 1; i <= 4; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.text = `Answer ${i}`;
                correctAnswerSelect.appendChild(option);
            }
            questionContainer.appendChild(correctAnswerSelect);

            container.appendChild(questionContainer);
        }
    </script>


@endsection

