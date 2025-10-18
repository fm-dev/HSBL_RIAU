<!DOCTYPE html>
<!-- Meta -->
<html lang="en">
<head>
	<!-- Title -->
	<title>SportsZone: Sports Club, New & Game Magazine Mobile Responsive Bootstrap HTML Template</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="">

	<meta name="keywords" content="baseball, basketball, boxed layout, football, football sporty theme, football theme, games, handball, kickoff soccer theme, Netball, racquetball, Rugby football, sports club, volleyball">
	<meta name="description" content="SportsZone: is a clean and mobile responsive HTML Sports template, very easy to customize according to different Sports institutes/schools, any other business also can use it.">

	<meta property="og:title" content="SportsZone: Sports Club, New & Game Magazine Mobile Responsive Bootstrap HTML Template">
	<meta property="og:description" content="SportsZone: is a clean and mobile responsive HTML Sports template, very easy to customize according to different Sports institutes/schools, any other business also can use it.">
	<meta property="og:image" content="https://sportszone.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('clientSide/images/favicon.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('clientSide/images/favicon.png') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/css/plugins.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/css/hover.css') }}">
	<link rel="stylesheet" type="text/css" class="skin" href="{{ asset('clientSide/css/skin/skin-1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/css/templete.min.css') }}">

	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/') }}plugins/revolution/revolution/css/settings.css">
	<!-- Revolution Navigation Style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('clientSide/') }}plugins/revolution/revolution/css/navigation.css">
</head>
<body id="bg">
<div class="page-wraper">
@include('layouts.header')
@include('layouts.navbar')
@yield('content')
@include('layouts.footer')

<button class="scroltop fa fa-caret-up" ></button>
</div>
<!-- <div id="loading-area"></div> -->
<!-- JavaScript  files ========================================= -->
<script src="{{ asset('clientSide/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ asset('clientSide/plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset('clientSide/plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('clientSide/plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('clientSide/plugins/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN JS -->
<script src="{{ asset('clientSide/plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->
<script src="{{ asset('clientSide/plugins/masonry/isotope.pkgd.min.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('clientSide/plugins/masonry/masonry-4.2.2.js') }}"></script><!-- MASONRY -->
<script src="{{ asset('clientSide/plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->
<script src="{{ asset('clientSide/plugins/lightgallery/js/lightgallery-all.js') }}"></script><!-- LIGHT GALLERY -->
<script src="{{ asset('clientSide/js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->

<script src="{{ asset('clientSide/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset('clientSide/js/dz.carousel.min.js') }}"></script><!-- SORTCODE FUCTIONS  -->
<!-- revolution JS FILES -->
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('clientSide/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('clientSide/js/rev.slider.js') }}"></script>
<script>
jQuery(document).ready(function() {
	'use strict';
	dz_rev_slider_1();
});	/*ready*/
</script>
</body>
</html>
