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
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <a class="example-image-link" href="{{ asset($data->foto) }}" data-lightbox="example-1">
                            <img class="card-img img-fluid" src="{{ asset($data->foto) }}" alt="Card image cap"
                                id="product-detail"></a>

                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ ucwords($data->nama) }}</h1>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Kategori :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $data->kategori->nama_kategori }}</strong></p>
                                </li>
                            </ul>

                            <h6>Alamat :</h6>
                            <p><strong>{{ $data->alamat }}</strong></p>

                            <h6>Deskripsi :</h6>
                            <p>{{ $data->deskripsi }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Fasilitas :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $data->fasilitas }}</strong></p>
                                </li>
                            </ul>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="{{ url('/destination') }}"><button class="btn btn-secondary btn-lg w-100"
                                            name="submit">Kembali</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
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


@endsection
