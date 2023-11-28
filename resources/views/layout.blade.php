<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @stack("styles")
</head>
<body class="antialiased">
    <div class="container">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://btu.edu.ge/wp-content/uploads/2021/06/BTU_Logo_new-1.svg" class="h-16" alt="BTU Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">BTU</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <p class="text-sm  text-gray-500 dark:text-white hover:underline">Vazha Aptsiauri</p>
                    <p href="#" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Quizzes</p>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="min-w-fit">
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
