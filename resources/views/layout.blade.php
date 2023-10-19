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
    @yield('content')

    <footer>
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
</body>
</html>
