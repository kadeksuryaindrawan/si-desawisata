
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hidems - Hidden Gems Of Kuta Selatan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

	<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/lightbox.css') }}">
<script type="text/javascript" src="{{ asset('dashboard/js/jquery-3.6.0.min.js') }}"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Hidems<span>KUTA SELATAN</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> <i class="fas fa-bars"></i>
            </button>
    
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li <?php echo $page == "home" ? "class='nav-item active'" : "class='nav-item'"; ?>><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li <?php echo $page == "about" ? "class='nav-item active'" : "class='nav-item'"; ?>><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                    <li <?php echo $page == "destination" ? "class='nav-item active'" : "class='nav-item'"; ?>><a href="{{ url('/destination') }}" class="nav-link">Destination</a></li>
                    <li <?php echo $page == "contact" ? "class='nav-item active'" : "class='nav-item'"; ?>><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
                    @if (Auth::check() == false)
						<li class="nav-item"><a href="{{ url('/login') }}" class="nav-link"><button class="btn btn-primary px-5 py-2 mt-n2">Login</button></a></li>
					@endif
					@if (Auth::check() == true)
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <button class="btn btn-primary px-5 py-2 mt-n2">Logout
							</button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
						</li>
					@endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    
    @yield('content')		
			

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


			<script src="{{ asset('js/jquery.min.js') }}"></script>
			<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
			<script src="{{ asset('js/popper.min.js') }}"></script>
			<script src="{{ asset('js/bootstrap.min.js') }}"></script>
			<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
			<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
			<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
			<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
			<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
			<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
			<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
			<script src="{{ asset('js/scrollax.min.js') }}"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="{{ asset('js/google-map.js') }}"></script>
			<script src="{{ asset('js/main.js') }}"></script>
			<script type="text/javascript" src="{{ asset('dashboard/js/lightbox.js') }} "></script>
			
		</body>
		</html>