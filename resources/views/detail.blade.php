@extends('layouts.home')

@section('content')
    @php
        $page = 'destination';
    @endphp

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Destination Detail <i
                                class="fa fa-chevron-right"></i></span></p>

                    <h1 class="mb-0 bread">Destination Detail</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class="owl-slider owl-carousel owl-theme owl-btn-center-lr dots-none">
                        @foreach ($images as $image)
                        <div class="item slide-item">
                            <div class="slide-item-img">
                                <a class="example-image-link"href="{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}" data-lightbox="example-1">
                                    <img style="width: 100%; height:500px; object-fit:cover;" src="{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach

		            </div>
                </div>
                <!-- col end -->
                <div class="col-lg-6 mt-5">
                    <h2 class="h2">{{ ucwords($data->nama) }}</h2>
                    <p>Kategori : <span class="text-primary">{{ ucwords($data->kategori->nama_kategori) }}</span></p>
                    <p>Alamat : <span>{{ ucfirst($data->alamat) }}</span></p>
                    <p>Fasilitas : <span>{{ ucfirst($data->fasilitas) }}</span></p>
                </div>

                <div class="col-lg-12"  style="margin-top: 50px;">
                    <h5 class="h5">Deskripsi</h5>
                    <p>{{ ucfirst($data->deskripsi) }}</p>
                </div>

                <div class="col-lg-12" style="margin-top: 70px;">
                    <div id="map" style="width: 100%;height: 500px;border-radius: 10px;z-index:1;"></div>
                </div>
            </div>
        </div>
    </section>

    <script>

        let mapOptions = {
            center:[{{ $data->latitude }}, {{ $data->longitude }}],
            zoom:13
        }

        let map = new L.map('map' , mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        var latlong = L.marker([{{ $data->latitude }}, {{ $data->longitude }}]);

        latlong.addTo(map).bindPopup("<b>{{ ucwords($data->nama) }}</b><br><p>{{ ucfirst($data->deskripsi) }}</p><a target='_BLANK' href='https://www.google.com/maps?q={{ $data->latitude }}, {{ $data->longitude }}'><button class='btn btn-primary btn-sm'>Lihat Pada Maps</button></a>");


    </script>

    <script>
    $(document).ready(function(){
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 1,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true
        });
    });
    </script>
@endsection
