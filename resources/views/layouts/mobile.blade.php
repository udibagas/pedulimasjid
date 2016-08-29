<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salwa Peduli Masjid | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/fa/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/highcharts/js/highcharts.js"></script>
    <script src="/highcharts/js/modules/exporting.js"></script>
    <script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</head>
<body id="app-layout">
    <div class="top">
        <div class="container-fluid">
            <a href="#" id="menu"><i class="fa fa-bars"></i></a>
            <a class="" href="{{ url('/') }}">
                <span style="border:3px solid #fff;padding:15px 20px;">
                    SALWA PEDULI MASJID
                </span>
            </a>
        </div>
    </div>

    <div class="slider">
        @yield('slider')
    </div>

    <div class="container-fluid" style="min-height:400px;padding-top:40px;padding-bottom:40px;">
        @yield('content')
    </div>

    <div class="footer">
        <div class="container">
            <div class="row" style="margin-bottom:80px;">
                <div class="col-md-4 col-sm-4 footer-1">
                    @foreach ($menuFooter1 as $m)
                    <a href="{{ $m->link }}">{{ $m->label }}</a><br>
                    @endforeach
                </div>
                <div class="col-md-4 col-sm-4 footer-2">
                    @foreach ($menuFooter2 as $m)
                    <a href="{{ $m->link }}">{{ $m->label }}</a><br>
                    @endforeach
                </div>
                <div class="col-md-4 col-sm-4 footer-3">
                    @foreach ($menuFooter3 as $m)
                    <a href="{{ $m->link }}">{{ $m->label }}</a><br>
                    @endforeach
                </div>
            </div>
            <div class="copyright">
                @foreach ($menuCopyright as $m)
                <a href="{{ $m->link }}">{{ $m->label }}</a> |
                @endforeach
                <br>
                Copyright &copy; {{ date('Y') }} <a href="http://www.salamdakwah.com">Www.SalamDakwah.Com</a>
            </div>
        </div>
    </div>

    <div class="sidr" id="sidr">
        <div class="list-group">
            @foreach ($menuLeft as $m)
            <a href="{{ $m->link }}" class="list-group-item">{{ $m->label }}</a>
            @endforeach
            @foreach ($menuRight as $m)
            <a href="{{ $m->link }}" class="list-group-item">{{ $m->label }}</a>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">

		$('#menu').sidr({ name:'sidr',timing:'ease-in-out',speed:200,side:'right',
			onOpen: function() { $('.top').css('left', '-275px'); $('.top').css('right', '275px'); },
			onClose: function() { $('.top').css('right', '0'); $('.top').css('left', '0'); }
		});

	</script>

    @stack('script')

</body>
</html>
