<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salwa Peduli Masjid | @yield('title')</title>
    <link rel="image_src" href="@yield('image')" />

	<meta property="og:url" content="{{ url()->full() }}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="@yield('title')" />
	<meta property="og:site_name" content="Salwa Peduli Masjid" />
	<meta property="og:description" content="@yield('description')" />
	<meta property="og:image" content="@yield('image')" />

	<!-- for Twitter -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="@yield('title')" />
	<meta name="twitter:description" content="@yield('description')" />
	<meta name="twitter:image" content="@yield('imageSquare')" />

	<meta name="author" content="SalwaPeduliMasjid" />
	<meta name="description" content="@yield('description')" />
	<meta name="keyword" content="peduli, masjid, iqra, tpq, tpa, dkm, sunnah, peduli masjid, musholla, taawun, donasi, sedekah, zakat, qurban" />
	<meta name="copyright" content="Copyright {{ date('Y') }} by SalwaPeduliMasj.Id" />
	<meta name="language" content="id" />
	<meta name="distribution" content="Global" />
	<meta name="rating" content="General" />
	<meta name="robots" content="index,follow" />
	<meta name="googlebot" content="index,follow" />

	<meta name="revisit-after" content="1 days" />
	<meta name="expires" content="never" />
	<meta name="dc.title" content="SalwaPeduliMasj.Id" />
	<meta name="dc.creator.e-mail" content="udibagas@gmail.com" />
	<meta name="dc.creator.name" content="SalwaPeduliMasjid" />
	<meta name="dc.creator.website" content="http://www.salwapedulimasj.id" />
	<meta name="tgn.name" content="Jakarta" />
	<meta name="tgn.nation" content="Indonesia" />

    <!-- Fonts -->
    <link rel="stylesheet" href="/fa/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">
    <link rel="stylesheet" href="/chosen/chosen.min.css">
    <link rel="stylesheet" href="/css/app.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/highcharts/js/highcharts.js"></script>
    <script src="/highcharts/js/modules/exporting.js"></script>
    <script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>
    <script src="/chosen/chosen.jquery.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#8E4E4E;height:80px;border:none;">
        <div class="container-fluid">
            <div class="hidden-sm hidden-md hidden-lg hidden-xl">
                <a href="#" id="menu" style="color:#fff;font-size:25px;position:absolute;top:20px;">
                    <i class="fa fa-bars"></i>
                </a>
                <a class="" href="{{ url('/') }}" style="position:absolute;left:50px;font-size:18px;top:28px;color:#fff;text-align:center;">
                    <span style="border:3px solid #fff;padding:15px 20px;">
                        SALWA PEDULI MASJID
                    </span>
                </a>
            </div>
            <div class="navbar-header hidden-xs">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="border:3px solid #fff;padding:15px 20px;">
                        SALWA PEDULI MASJID
                    </span>
                </a>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav menu-left">
                    @foreach ($menuLeft as $m)
                    <li><a href="{{ $m->link }}">{{ $m->label }}</a></li>
                    @endforeach
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right menu-right">
                    @foreach ($menuRight as $m)
                    <li><a href="{{ $m->link }}">{{ $m->label }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

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

    <div class="sidr hidden-lg hidden-md hidden-xl" id="sidr">
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

		$('#menu').sidr({ name:'sidr',timing:'ease-in-out',speed:200,side:'left',
			onOpen: function() { $('.navbar-fixed-top').css('right', '-275px'); $('.navbar-fixed-top').css('left', '275px'); },
			onClose: function() { $('.navbar-fixed-top').css('left', '0'); $('.navbar-fixed-top').css('right', '0'); }
		});

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
