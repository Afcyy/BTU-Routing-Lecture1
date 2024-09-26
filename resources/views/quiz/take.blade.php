@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')
    <div class="w-full flex flex-col items-center justify-center">
        @livewire('quiz-component', ['quizId' => $quiz->id])
    </div>
@endsection

