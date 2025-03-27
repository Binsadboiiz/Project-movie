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

        <footer class="footer">
            <div class="footer-content">
                <div class="ft-col ft-col-logo">
                    <div class="ft-col-header">
                        <div class="ft-col-img">
                            <a href="{{ route('home')}}"><img src="{{ asset('img/logo/netchill.jpg') }}" alt="NETCHILL Logo"></a>
                        </div>
                        <h1>NETCHILL</h1>
                    </div>
                    <p>NETCHILL – Phim hay cả rổ - Trang xem phim online chất lượng cao miễn phí Vietsub, thuyết minh, lồng tiếng full HD. Kho phim mới khổng lồ, phim chiếu rạp, phim bộ, phim lẻ từ nhiều quốc gia như Việt Nam, Hàn Quốc, Trung Quốc, Thái Lan, Nhật Bản, Âu Mỹ… đa dạng thể loại. Khám phá nền tảng phim trực tuyến hay nhất 2025 chất lượng 4K!</p>
                </div>
                <div class="ft-col ft-col-contact">
                    <h1>Contact Me</h1>
                    <div class="social-links">
                        <a href="https://www.facebook.com/phu.cuong.8526" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/ngphcng?igsh=MXdoaTgycjF4N2dibQ==" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.threads.net/@ngphcng" target="_blank"><i class="bi bi-threads"></i></a>
                    </div>
                </div>
                <div class="ft-col ft-col-donate"><a href="{{ route('donate')}}">Donate❤️</a></div>
            </div>
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
