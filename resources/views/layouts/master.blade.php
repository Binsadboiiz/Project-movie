<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/modals.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <title>NETCHILL - @yield('title', 'NETCHILL')</title>
    </head>
    <body data-logged-in="{{ Auth::check() ? 'true' : 'false' }}">
        {{-- Đây là Header --}}
        <header>
            <div class="head-logo">
                <div class="logo">
                    NetChill
                </div>
                <div class="head-right">
                    <div class="search-tool">
                        <form method="GET" action="{{ route('movie')}}">
                            <div class="search-icon">
                            <input type="text" name="search" placeholder="Search here..." value="{{ request('search') }}">
                            <i class="bi bi-search"></i>
                            </div>
                        </form>
                    </div>
                    @if (Auth::check())
                        <div class="account">
                            <span>Welcome, {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">LOG OUT</button>
                            </form>
                        </div>
                    @else
                        <div class="login">
                            <button type="button" onclick="openModal('loginModal')">LOG IN</button>
                        </div>
                        <div class="login">
                            <button type="button" onclick="openModal('registerModal')">SIGN UP</button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="head-menu">
                <div class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></div>
                <div class="{{ Route::is('movie') ? 'active' : '' }}"><a href="{{ route('movie')}}">Movies</a></div>
                {{-- <div class="{{ Route::is('tvshows.index') ? 'active' : '' }}"><a href="#">TV Shows</a></div>
                <div class="{{ Route::is('popular.index') ? 'active' : '' }}"><a href="#">New & Popular</a></div> --}}
                <div class="{{ Route::is('mylist.index') ? 'active' : '' }}"><a href="{{ route('mylist.index') }}">My List</a></div>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <div class="{{ Route::is('admin.movies.create') ? 'active' : '' }}"><a href="{{ route('admin.movies.create') }}">Add New Movie</a></div>
                    <div class="{{ Route::is('admin.movies.index') ? 'active' : '' }}"><a href="{{ route('admin.movies.index') }}">Manage Movies</a></div>
                @endif
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        @include('partials.formlogin')
        @include('partials.formsignup')

        <footer>

        </footer>

        <script src="{{ asset('js/modals.js') }}"></script>
        <script>
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif

            @if (session('error'))
                alert('{{ session('error') }}');
            @endif
        </script>
    </body>
</html>
