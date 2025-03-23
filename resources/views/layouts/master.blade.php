<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/modals.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <title>NETCHILL</title>
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
                        <form method="GET" action="">
                            <input type="search" name="search" placeholder="Search here...">
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
                <div><a href="#">Home</a></div>
                <div><a href="#">Movies</a></div>
                <div><a href="#">TV Shows</a></div>
                <div><a href="#">New & Popular</a></div>
                <div><a href="#">My List</a></div>
            </div>
        </header>

        {{-- Đây là content --}}
        <main>
            @yield('content')
        </main>

        {{-- Nhúng form đăng nhập và đăng ký --}}
        @include('partials.formlogin')
        @include('partials.formsignup')

        {{-- Đây là footer --}}
        <footer>

        </footer>

        {{-- Nhúng script --}}
        <script src="{{ asset('js/modals.js') }}"></script>
        <script>
            // Hiển thị alert nếu có session flash messages
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif

            @if (session('error'))
                alert('{{ session('error') }}');
            @endif
        </script>
    </body>
</html>
