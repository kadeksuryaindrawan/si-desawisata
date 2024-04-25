@extends('layouts.home')

@section('content')

    <!-- banner starts -->
    <section class="banner overflow-hidden">
        <div class="slider top50">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image:url({{ asset('landing') }}/images/slider/1.jpg)"></div>
                            <div class="swiper-content">
                                <div class="entry-meta mb-2">
                                    <h5 class="entry-category mb-0 white">Amazing Places</h5>
                                </div>
                                <h1 class="mb-2 white">Make Your Trip Fun & Noted</h1>
                                <p class="white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                <a href="{{ url('/contact') }}" class="nir-btn">Contact Us</a>
                            </div>
                            <div class="dot-overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image:url({{ asset('landing') }}/images/slider/2.jpg)"></div>
                            <div class="swiper-content">
                                <div class="entry-meta mb-2">
                                    <h5 class="entry-category mb-0 white">Explore Travel</h5>
                                </div>
                                <h1 class="mb-2 white">Start Planning Your Dream Trip</h1>
                                <p class="white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                <div class="slider-button d-flex justify-content-center">
                                     <a href="{{ url('/desawisata') }}" class="nir-btn me-4">Desa Wisata</a>
                                      <a href="{{ url('/contact') }}" class="nir-btn-black">Contact Us</a>
                                </div>
                            </div>
                            <div class="dot-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
    <!-- banner ends -->

    <!-- about-us starts -->
    <section class="about-us pb-6 pt-10" style="background-image:url({{ asset('landing') }}/images/shape4.png); background-position:center;">
        <div class="container">

            <div class="section-title mb-6 w-50 mx-auto text-center">
                <h4 class="mb-1 theme1">Informasi</h4>
                <h2 class="mb-1">Desa Wisata <span class="theme">Bali</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>

            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="icon-flag theme"></i>
                                    </div>
                                    <h4><a href="about.html">Tell Us What You want To Do</a></h4>
                                    <p class="mb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="icon-location-pin theme"></i>
                                    </div>
                                    <h4><a href="about.html">Share Your Travel Locations</a></h4>
                                    <p class="mb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="icon-directions theme"></i>
                                    </div>
                                    <h4><a href="about.html">Share Your Travel Preference</a></h4>
                                    <p class="mb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="icon-compass theme"></i>
                                    </div>
                                    <h4><a href="about.html">Here 100% Trusted Tour Agency</a></h4>
                                    <p class="mb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->

    <!-- best tour Starts -->
    <section class="trending bg-grey pt-17 pb-6">
        <div class="section-shape top-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between mb-6 ">
                <div class="col-lg-7">
                    <div class="section-title text-center text-lg-start">
                        <h4 class="mb-1 theme1">Peta</h4>
                        <h2 class="mb-1">Lokasi <span class="theme">Desa Wisata</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="map" style="width: 100%;height: 800px;border-radius: 10px; z-index:1;"></div>
                    <div id="data" style="display: none;">
                        @foreach($datas as $item)
                            <div class="item" data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}" data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}"></div>
                        @endforeach
                    </div>
            </div>
            <div class="category-main-inner">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <h3 class="mb-0 white bg-theme p-3 py-5 text-center rounded my-4">Kategori</h3>
                    </div>
                    <div class="col-lg-10">
                        <div class="row side-slider">

                            @foreach ($kategoris as $kategori)
                                <div class="col-lg-3 col-md-6 my-4">
                                    <a href="#">
                                        <div style="width: 100%;" class="category-item box-shadow text-center py-5 px-0 bg-white rounded overflow-hidden">
                                            <div class="trending-topic-content">
                                                <h5 class="mb-0">{{ ucwords($kategori->nama_kategori) }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- best tour Ends -->

    <!-- Last Minute Deal Starts -->
    <section class="trending pb-9">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <h4 class="mb-1 theme1">Desa Wisata</h4>
                <h2 class="mb-1">Daftar <span class="theme">Desa Wisata</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
            <div class="trend-box">
                <div class="row">

                    @foreach ($datas3 as $item)
                        <div class="col-lg-4 mb-4">
                            <a href="#">
                                <div class="trend-item1 rounded box-shadow bg-white">
                                    <div class="trend-image position-relative">
                                        @foreach ($item->images as $image)
                                        @endforeach
                                        <img src="{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}" style="width: 100%;height:400px;object-fit:cover;" alt="image" class="">
                                        <div class="trend-content1 p-4">
                                            <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> {{ ucwords($item->kategori->nama_kategori) }}</h5>
                                            <h3 class="mb-1 white">{{ ucwords($item->nama) }}</h3>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-author">
                                                    <i class="fas fa-map-marker-alt white"></i>
                                                    <span class="fw-bold white"> {{ ucwords($item->kabupaten->nama_kabupaten) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <div class="col-lg-12 text-center">
                        <a href="{{ url('/desawisata') }}" class="nir-btn">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Last Minute Deal Ends -->



    <script src="{{ asset('landing') }}/js/plugin.js"></script>

    <script>

        let mapOptions = {
            center:[-8.374702, 115.174296],
            zoom:10
        }

        let map = new L.map('map' , mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        let dataItems = document.querySelectorAll('.item');
        dataItems.forEach(item => {
            let lat = item.dataset.lat;
            let lng = item.dataset.lng;
            let nama = item.dataset.nama;
            let deskripsi = item.dataset.deskripsi;

            var latlong = L.marker([lat, lng]);
            latlong.addTo(map).bindPopup("<b>" + nama + "</b><br><p>" + deskripsi + "</p><a target='_BLANK' href='https://www.google.com/maps?q=" + lat + "," + lng + "'><button class='btn btn-primary btn-sm'>Lihat Pada Maps</button></a>");
        });



    </script>
@endsection
