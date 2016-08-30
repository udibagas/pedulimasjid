<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DATA KOMUNIKA PRIMA</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="/summernote/summernote.css">
    <link rel="stylesheet" href="/chosen/chosen.min.css">
    <link rel="stylesheet" href="/css/backend.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/summernote/summernote.min.js"></script>
    <script src="/chosen/chosen.jquery.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    DATA KOMUNIKA PRIMA
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse" style="margin-top:-40px;">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/category') }}">CATEGORIES</a></li>
                    <li><a href="{{ url('/menu') }}">MENUS</a></li>
                    <li><a href="{{ url('/post/admin') }}">POSTS</a></li>
                    <li><a href="{{ url('/slider') }}">SLIDERS</a></li>
                    <li><a href="{{ url('/masjid/admin') }}">MASJID</a></li>
                    <li><a href="{{ url('/donasi/admin') }}">DONASI</a></li>
                    <li><a href="{{ url('/inbox/admin') }}">INBOX</a></li>
                    <li><a href="{{ url('/user') }}">USERS</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}" target="_blank">Visit Site</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/me') }}" title="Profile">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ url('/logout') }}" title="Logout"><i class="fa fa-sign-out"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    <script type="text/javascript">
        $(document).on('click', '.confirm', function() {
            return confirm('Anda yakin?');
        });

        $('.summernote').summernote({
            height: 250
        });
    </script>

    @stack('script')

</body>
</html>
