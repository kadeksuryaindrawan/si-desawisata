@extends('layouts.home')

@section('content')

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('landing') }}/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">{{ ucwords($data->nama) }}</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Potensi Wisata</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <div id="highlight" class="mb-4">
                            <div class="single-full-title border-b mb-2 pb-2">
                                <div class="single-title">
                                    <h2 class="mb-1">{{ ucwords($data->nama) }}</h2>
                                    <div class="rating-main d-flex align-items-center">
                                        <p class="mb-0 me-2"><i class="icon-location-pin"></i> {{ ucwords($data->objek_wisata->nama) }} | {{ ucwords($data->jenis_potensi->nama_jenis_potensi) }}</p>

                                    </div>

                                </div>
                            </div>

                            <div class="description-images mb-4">
                                @foreach ($data->potensi_images as $image)
                                @endforeach
                                <a class="example-image-link"href="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" data-lightbox="example-1">
                                    <img src="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" style="width: 100%;height:500px;object-fit:cover;" alt="image" class="rounded">
                                </a>

                            </div>

                            <div class="description mb-2">
                                <h4>Deskripsi</h4>
                                <p>{{ ucfirst($data->deskripsi) }}</p>
                            </div>

                            <div class="description">
                                <div class="bg-grey p-4 rounded mb-2">
                                    <h5 class="mb-2">Alamat</h5>
                                    <p>{{ ucfirst($data->alamat) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="description mb-2">
                            <h4 class="mb-2">Foto Potensi Wisata</h4>
                            <div class="services-image d-md-flex">
                                @foreach ($images as $image)
                                    <div class="me-md-2 rounded overflow-hidden mb-2">
                                        <a class="example-image-link"href="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" data-lightbox="example-1">
                                            <img style="width: 100%; height:200px; object-fit:cover;" src="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div  id="single-map" class="single-map mb-4">
                            <h4>Map</h4>
                            <div class="map rounded overflow-hidden">
                                <div id="map" style="width: 100%;height: 500px;border-radius: 10px;z-index:1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->

    <script src="{{ asset('landing') }}/js/plugin.js"></script>

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
@endsection
