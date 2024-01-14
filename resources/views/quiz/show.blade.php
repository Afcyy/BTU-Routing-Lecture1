@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@section('content')

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="flex flex-col mr-3 text-sm text-gray-900 dark:text-white">
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $quiz->name }}
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-400">Created by {{ $quiz->user->name }}</p>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time datetime="2022-02-08" title="February 8th, 2022">{{ \Carbon\Carbon::parse($quiz->created_at)->format('d M. Y') }}</time>
                            </p>
                        </div>
                    </address>
                </header>
                <p class="lead">{{ $quiz->description }}</p>
                <figure><img class="w-full" src="{{ $quiz->image }}" alt=""></figure>

                <button class="bg-blue-500 text-white font-medium p-2 rounded-md w-full mt-6">Start Quiz</button>
                @if(in_array(auth()->id(), [$quiz->user->id, 1]))
                    <form action="{{ route('quiz.destroy', $quiz) }}", method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 text-white font-medium p-2 rounded-md w-full mt-2">DELETE</button>
                    </form>
                @endif
            </article>
        </div>
    </main>
@endsection

