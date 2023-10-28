@extends('layout')

@push('styles')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')

    <div class="container">
        <form action="{{ '/quiz/edit/' . $id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="name" placeholder="name" value="{{ isset($quiz) ? $quiz->name : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="description" type="text" class="form-control" id="description" placeholder="Description" value="{{ isset($quiz) ? $quiz->description : '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select name="score" class="form-control" id="exampleFormControlSelect1">
                    @for($i = 1; $i <= 10; $i++)
                        <option @if(isset($quiz) && $quiz->score == $i) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                <div class="col-sm-10">
                    <input name="deadline" type="text" class="form-control" id="deadline" placeholder="Deadline" value="{{ isset($quiz) ? $quiz->deadline : '' }}">
                </div>
            </div>

            <div class="form-group mt-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection

