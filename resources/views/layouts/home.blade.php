<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DWB -
        @if (request()->segment(1) == '')
        Desa Wisata Bali
        @else
        {{ ucwords(request()->segment(1)) }}
        @endif
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing') }}/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('landing') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{ asset('landing') }}/css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{ asset('landing') }}/css/plugin.css" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('landing') }}/fonts/line-icons.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/lightbox.css') }}">
    <script src="{{ asset('landing') }}/js/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('dashboard/js/lightbox.js') }} "></script>
</head>
<body>

    <!-- header starts -->
    <header class="main_header_area">
        <div class="header-content py-1 bg-theme">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="links">
                    <ul>
                        <li><a href="#" class="white"><i class="icon-calendar white"></i> {{ date("d M Y",strtotime(now())) }}</a></li>
                        <li><a href="#" class="white"><i class="icon-location-pin white"></i>  Bali, Indonesia</a></li>
                    </ul>
                </div>
                <div class="links float-right">
                    <ul>
                        <li><a href="#" class="white"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="white"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="white"><i class="fab fa-linkedin " aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand theme" style="font-weight: 800;" href="{{ url('/') }}">
                                DWB
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="{{ (request()->segment(1) == 'home' || request()->segment(1) == '') ? 'active' : '' }}">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="{{ (request()->segment(1) == 'about') ? 'active' : '' }}">
                                    <a href="{{ url('/about') }}">About Us</a>
                                </li>
                                <li class="submenu dropdown {{ (request()->segment(1) == 'desawisata' || request()->segment(1) == 'kategoridesawisata' || request()->segment(1) == 'detail') ? 'active' : '' }}">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Desa Wisata <i class="icon-arrow-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="submenu dropdown">
                                            <a href="{{ url('/desawisata') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All ({{ $allDesaWisata }})</a>
                                            @foreach ($kabupatens as $kabupaten)
                                                <a href="{{ route('desawisatakabupaten',$kabupaten->id) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ ucwords($kabupaten->nama_kabupaten) }} ({{ $kabupaten->objekWisata()->count() }})</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                                    <a href="{{ url('/contact') }}">Contact Us</a>
                                </li>
                                @if (Auth::check() == false)
                                    <li>
                                        <a href="{{ url('/login') }}"><button class="nir-btn"><i class="icon-user"></i> Login</button></a>
                                    </li>
                                @endif

                                @if (Auth::check() == true)
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endif

                            </ul>
                        </div><!-- /.navbar-collapse -->


                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->

    @yield('content')

    <!-- footer starts -->
    <footer class="pt-20 pb-4"  style="background-image: url({{ asset('landing') }}/images/background_pattern.png);">
        <div class="section-shape top-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>

        <div class="footer-upper pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4 pe-4">
                        <div class="footer-about">
                            <a class="navbar-brand theme" style="font-weight: 800; font-size: 27px; letter-spacing: 2px;" href="{{ url('/') }}">
                                DWB
                            </a>
                            <p class="mt-3 mb-3 white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque iaculis molestie sagittis maecenas aenean eget molestie sagittis.
                            </p>
                            <ul>
                                <li class="white"><strong>Location:</strong> Bali, Indonesia</li><br>
                                <li class="white"><strong>Email:</strong> desawisatabali@gmail.com</li><br>
                                <li class="white"><strong>Website:</strong> www.desawisatabali.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Menu</h3>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/desawisata') }}">Desa Wisata</a></li>
                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Kabupaten</h3>
                            <ul>
                                @foreach ($kabupatens as $kabupaten)
                                    <li><a href="{{ route('desawisatakabupaten',$kabupaten->id) }}">{{ ucwords($kabupaten->nama_kabupaten) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white">2024 DWB. All rights reserved.</p>
                    </div>
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </footer>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->

    <script src="{{ asset('landing') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('landing') }}/js/particles.js"></script>
    <script src="{{ asset('landing') }}/js/particlerun.js"></script>

    <script src="{{ asset('landing') }}/js/main.js"></script>
    <script src="{{ asset('landing') }}/js/custom-swiper.js"></script>
    <script src="{{ asset('landing') }}/js/custom-nav.js"></script>

</body>
</html>
