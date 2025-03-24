<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'News JJSN' }}</title>
    <link rel="icon" href="{{ asset('templates/news/images/logo.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--Favicon-->
	<link rel="shortcut icon" href="{{ asset('templates/news/images/logo.png') }}" type="image/x-icon">

	<!-- THEME CSS
	================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/bootstrap/css/bootstrap.min.css') }}">
	<!-- Themify -->
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/themify/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/slick-carousel/slick-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/slick-carousel/slick.css') }}">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/owl-carousel/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('templates/news/plugins/magnific-popup/magnific-popup.css') }}">
	<!-- manin stylesheet -->
	<link rel="stylesheet" href="{{ asset('templates/news/css/style.css') }}">
	
	<!-- Custom styles for pagination -->
	<style>
	    .pagination .disabled {
	        color: #adb5bd;
	        padding: 5px 15px;
	        display: inline-block;
	    }
	    .pagination ul.list-inline li a {
	        cursor: pointer;
	    }
	    .pagination ul.list-inline li.disabled {
	        opacity: 0.6;
	        cursor: not-allowed;
	    }
	</style>

	@livewireStyles
</head>

<body>


	<div class="header-logo py-5 d-none d-lg-block">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<a class="navbar-brand" href="index.html"><img src="{{ asset('templates/news/images/logo.png') }}" alt="" class="img-fluid w-100"></a>
				</div>
			</div>
		</div>
	</div>

	<header class="header-top bg-grey justify-content-center">
		<nav class="navbar navbar-expand-lg navigation">
			<div class="container">
				<a class="navbar-brand d-lg-none" href="{{ route('news') }}"><img src="{{ asset('templates/news/images/logo.png') }}" alt="" class="img-fluid"></a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
					aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarContent">
					<ul id="menu" class="menu navbar-nav ">
						<li class="nav-item"><a href="{{ route('news') }}" class="nav-link">News</a></li>
						<li class="nav-item"><a href="{{ route('news.create') }}" class="nav-link">Create News</a></li>
					</ul>
				</div>
			</div>
		</nav>

	</header>
	<!--search overlay start-->
	<div class="search-wrap">
		<div class="overlay">
			<form action="#" class="search-form">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-9">
							<input type="text" class="form-control" placeholder="Search..." />
						</div>
						<div class="col-md-2 col-3 text-right">
							<div class="search_toggle toggle-wrap d-inline-block">
								<i class="ti-close"></i>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<main>
        {{ $slot }}
    </main>

	<!--footer start-->
	<footer class="footer-section bg-grey">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="mb-4">
						<h2 class="footer-logo">News JJSN</h2>
					</div>
				</div>

				<div class="col-md-12 text-center">
					<p class="copyright">© Copyright 2025 - News JJSN</p>
				</div>
			</div>
		</div>
	</footer>
	<!--footer end-->

	<!-- THEME JAVASCRIPT FILES
================================================== -->
	<!-- initialize jQuery Library -->
	<script src="{{ asset('templates/news/plugins/jquery/jquery.js') }}"></script>
	<!-- Bootstrap jQuery -->
	<script src="{{ asset('templates/news/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('templates/news/plugins/bootstrap/js/popper.min.js') }}"></script>
	<!-- Owl caeousel -->
	<script src="{{ asset('templates/news/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('templates/news/plugins/slick-carousel/slick.min.js') }}"></script>
	<script src="{{ asset('templates/news/plugins/magnific-popup/magnific-popup.js') }}"></script>
	<!-- Instagram Feed Js -->
	<script src="{{ asset('templates/news/plugins/instafeed-js/instafeed.min.js') }}"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
	<script src="{{ asset('templates/news/plugins/google-map/gmap.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('templates/news/js/custom.js') }}"></script>

	@livewireScripts
</body>

</html>