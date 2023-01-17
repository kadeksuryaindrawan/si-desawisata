<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidems - {{ $title }}</title>
    
    <link rel="stylesheet" href="{{ asset('dashboard/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('dashboard/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dashboard/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
<link rel="stylesheet" href="{{ asset('dashboard/css/shared/iconly.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/pages/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/pages/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/lightbox.css') }}">
<script type="text/javascript" src="{{ asset('dashboard/js/jquery-3.6.0.min.js') }}"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="m-3">
                <a href="{{ url('/') }}"> <h5 class="text-primary">Hidems</h5></a>
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
            
            <li <?php if($page == "dashboard") echo "class='sidebar-item active'";?>>
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->hasRole('Admin'))
            <li <?php if($page == "pengelola") echo "class='sidebar-item active'";?>>
                <a href="{{ route('pengelola.index') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Pengelola</span>
                </a>
            </li>
            <li <?php if($page == "kategori") echo "class='sidebar-item active'";?>>
                <a href="{{ route('kategori.index') }}" class='sidebar-link'>
                    <i class="bi bi-book"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li <?php if($page == "objekwisata") echo "class='sidebar-item active'";?>>
                <a href="{{ route('objekwisata.index') }}" class='sidebar-link'>
                    <i class="bi bi-flower1"></i>
                    <span>Objek Wisata</span>
                </a>
            </li>
            @endif
            
            @if (Auth::user()->hasRole('Pengelola'))
            <li <?php if($page == "objekwisata") echo "class='sidebar-item active'";?>>
                <a href="{{ route('objekwisata.index') }}" class='sidebar-link'>
                    <i class="bi bi-flower1"></i>
                    <span>Objek Wisata</span>
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
                            Logout
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
