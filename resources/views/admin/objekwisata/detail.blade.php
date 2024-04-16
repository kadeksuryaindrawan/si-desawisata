@extends('layouts.dashboard')

@section('content')

@php
    $page = 'objekwisata';
    $title = 'Objek Wisata';
@endphp

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last mb-3">
                @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                        @endforeach
                <h3>Detail Objek Wisata</h3>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Objek Wisata {{ $data->nama }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mb-10">
                                <div class="col-6">
                                    <a class="example-image-link"
                                                     href="{{ asset($data->foto) }}" data-lightbox="example-1">
                                                     <img src="{{ asset($data->foto) }}" alt="" width="100%"></a>
                                </div>
                                <div class="col-6">
                                    <p>Nama Objek Wisata : <strong>{{ $data->nama }}</strong></p>
                                    <p>Kategori : <strong>{{ $data->kategori->nama_kategori }}</strong></p>
                                    @if ($data->pengelola_id == NULL)
                                        <p>Pengelola : <span class="text-danger">Belum Ada</span></p>
                                    @endif
                                    @if ($data->pengelola_id != NULL)
                                        <p>Pengelola : <strong>{{ $data->pengelola->name }}</strong></p>
                                    @endif

                                    <p>Alamat : <strong>{{ $data->alamat }}</strong></p>
                                    <div class="col-lg-12 mb-5">
                                        <div id="map" style="width: 100%;height: 200px;border-radius: 10px;"></div>
                                    </div>
                                    <p>Deskripsi : <strong>{{ $data->deskripsi }}</strong></p>
                                    <p>Fasilitas : <strong>{{ $data->fasilitas }}</strong></p>

                                </div>

                            </div>
                            <div class="row">
                                <a href="{{ route('objekwisata.index') }}" class="d-flex justify-content-center w-full">
                                    <button class="btn btn-secondary w-100 my-1">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
</div>

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
