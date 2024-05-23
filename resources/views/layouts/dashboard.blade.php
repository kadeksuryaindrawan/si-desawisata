<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDETA - {{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('dashboard/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('landing/images/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" href="{{ asset('dashboard/css/shared/iconly.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/pages/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/pages/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/lightbox.css') }}">
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
<script type="text/javascript" src="{{ asset('dashboard/js/jquery-3.6.0.min.js') }}"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="m-3">
                <a style="font-size:25px;" href="{{ url('/') }}"> SIDETA</a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                <div class="form-check">
                    <input class="form-check-input  me-0" type="hidden" id="toggle-dark" >
                    <label class="form-check-label" ></label>
                </div>

            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu list-unstyled">
            <li class="sidebar-title">Menu</li>

            @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Pengelola'))
            <li <?php if($page == "dashboard") echo "class='sidebar-item active'";?>>
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->hasRole('Admin'))
            <li <?php if($page == "pengelola") echo "class='sidebar-item active'";?>>
                <a href="{{ route('pengelola.index') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Pengelola</span>
                </a>
            </li>
            <li <?php if($page == "kabupaten") echo "class='sidebar-item active'";?>>
                <a href="{{ route('kabupaten.index') }}" class='sidebar-link'>
                    <i class="bi bi-building"></i>
                    <span>Kabupaten</span>
                </a>
            </li>
            <li <?php if($page == "desawisata") echo "class='sidebar-item active'";?>>
                <a href="{{ route('objekwisata.index') }}" class='sidebar-link'>
                    <i class="bi bi-flower1"></i>
                    <span>Desa Wisata</span>
                </a>
            </li>
            <li <?php if($page == "jenispotensi") echo "class='sidebar-item active'";?>>
                <a href="{{ route('jenispotensi.index') }}" class='sidebar-link'>
                    <i class="bi bi-list-columns"></i>
                    <span>Jenis Potensi</span>
                </a>
            </li>
            <li <?php if($page == "potensi") echo "class='sidebar-item active'";?>>
                <a href="{{ route('potensi.index') }}" class='sidebar-link'>
                    <i class="bi bi-chevron-double-up"></i>
                    <span>Potensi</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->hasRole('Pengelola'))
            <li <?php if($page == "desawisata") echo "class='sidebar-item active'";?>>
                <a href="{{ route('objekwisata.index') }}" class='sidebar-link'>
                    <i class="bi bi-flower1"></i>
                    <span>Desa Wisata</span>
                </a>
            </li>
            <li <?php if($page == "potensi") echo "class='sidebar-item active'";?>>
                <a href="{{ route('potensi.index') }}" class='sidebar-link'>
                    <i class="bi bi-chevron-double-up"></i>
                    <span>Potensi</span>
                </a>
            </li>
            @endif


        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-5">
                <div class="row">
                    <div class="col-6">
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                    <div class="col-4 mt-2">

                    </div>
                    <div class="col-2 mt-2">
                        <a class="float-end" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <button class="btn btn-primary">Logout</button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>


                </div>
            </header>

        @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('dashboard/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dashboard/js/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('dashboard/js/lightbox.js') }} "></script>
<script src="{{ asset('dashboard/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('dashboard/js/pages/datatables.js') }}"></script>
<!-- <script src="../../assets/extensions/toastify-js/src/toastify.js"></script>
<script src="../../assets/js/pages/toastify.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>

</html>
