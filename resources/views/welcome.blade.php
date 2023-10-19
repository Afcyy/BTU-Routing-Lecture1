@extends('layout')

@push('styles')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')

    <div class="container">
        @foreach($quizzes as $quiz)
            <div class="card" style="width: 18rem;">
                <img src="{{ $quiz['img'] }}" class="card-img-top" alt="{{ 'Cover photo of' . $quiz['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $quiz['name'] }}</h5>
                    <button @class(['btn', 'btn-success' => $quiz['status'] == 'Passed', 'btn-danger' => $quiz['status'] == 'Failed', 'btn-primary' => $quiz['status'] == 'Upcoming'])>{{ $quiz['status'] }}</button>
                </div>
            </div>
        @endforeach
    </div>

@endsection

