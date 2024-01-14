<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BTU</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

{{--    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}

    @stack("styles")
</head>
<body class="antialiased">
    <div class="container">

        <nav class="bg-white border-gray-200">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://btu.edu.ge/wp-content/uploads/2021/06/BTU_Logo_new-1.svg" class="h-16" alt="BTU Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">BTU</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    @if(auth()->check())
                        <p class="text-sm  text-gray-500">{{ auth()->user()->name }}</p>
                        <a href="{{ route('quiz.store') }}" class="text-sm bg-blue-600 text-white p-2 rounded-md">Create New Quiz</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-blue-600">Sing in</a>
                        <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white p-2 rounded-md">Sing up</a>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="min-w-fit my-12">
            <form class="mb-3" action="/subscribe" method="POST">
                @csrf
                @method("PUT")
                <label for="exampleFormControlInput1" class="form-label">Subscribe to our news letter</label>
                <div style="display:flex; width: 100%; justify-content: space-around">
                    <input name="email" type="email" class="form-control col-9" id="exampleFormControlInput1" placeholder="name@example.com" style="width: 75%">
                    <button type="submit" class="btn btn-primary" style="width: 23%">Subscribe</button>
                </div>
            </form>
        </footer>
    </div>
</body>
</html>
