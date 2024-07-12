<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Application')</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/">Login</a></li>
            <li><a href="/">Product</a></li>
            <li><a href="/">Test</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div>
            <p>Tenant Portal 2024</p>
            <p>Social Media Placeholder</p>
        </div>
    </footer>
</body>

</html>
