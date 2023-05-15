<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');

        * {
            font-family: 'Poppins', sans-serif;
        }

        a {
            text-decoration: none;
            color: #000
        }
    </style>
    <title>@yield('page')</title>
</head>

<body>
    <header class="nav d-flex justify-content-between px-5 pt-3">
        <div class="flex-fill">
            <a href="{{ route('blog.index') }}">
                <img src="https://icon-library.com/images/blogging-icon/blogging-icon-27.jpg" alt="blog"
                    style="width:60px">
            </a>
        </div>
        <ul class="navbar-nav d-flex flex flex-row justify-content-between flex-fill align-items-center">
            <li><a href="{{ route('blog.index') }}">blogs</a></li>
            @if (auth()->user() == null)
                <li><a href="{{ route('log') }}">login</a></li>
            @else
                @if (auth()->user()->role == 'admin')
                    <li><a href="{{ route('blog.create') }}">create</a></li>
                @endif
                <li><a href="{{ route('logout') }}">logout</a></li>
            @endif
        </ul>
    </header>
    <main class="container-fluid flex d-flex justify-content-center pt-5 mt-4">
        @yield('content')

    </main>
</body>

</html>
