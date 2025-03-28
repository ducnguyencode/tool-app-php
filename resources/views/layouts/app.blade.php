<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @yield('style')
        .alert-success {
            color:green;
        }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @if(session()->has('success'))
        <div class="aler alert-success">{{ session()->get('success') }}</div>
    @endif
    @yield('content')
</body>
</html>