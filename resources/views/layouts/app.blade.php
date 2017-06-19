<!-- FlatFy Theme - Andrea Galanti /-->
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
@include('layouts.head')
</head>
<body id="home">
    <div id="preloader">
        <div id="status"></div>
    </div>
@include('layouts.header')
	
	@yield('content')

@include('layouts.footer')
@include('layouts.javascripts')
  
</body>
</html>