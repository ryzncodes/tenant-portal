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
            @guest
                <li><a href="{{ route('registerpage') }}">Register</a></li>
                <li><a href="{{ route('loginpage') }}">Login</a></li>
            @endguest
            @auth
                @if (auth()->user()->role === 'tenant')
                    <li><a href="/">Product</a></li>
                @endif

                @if (auth()->user()->role === 'property_manager')
                    <li><a href="/">New Listing</a></li>
                    <li><a href="/">Analytics</a></li>
                @endif
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                </li>
            @endauth
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
