@extends('layout')

@push('styles')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')

    <div class="container">
        <div class="row row-cols-3">
            @foreach($quizzes as $quiz)
                <div class="card mt-5" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{ $quiz->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Due {{ $quiz->deadline }}</h6>
                    <p class="card-text">{{ $quiz->description }}</p>
                    <p class="card-link fw-bold">Max score: <span class="fw-normal">{{ $quiz->score }}<span></p>
                  </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

