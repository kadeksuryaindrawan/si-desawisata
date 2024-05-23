@extends('layouts.dashboard')

@section('content')

@php
    $page = 'potensi';
    $title = 'Potensi';
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
                <h3>Detail Potensi</h3>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Potensi {{ $data->nama }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mb-10">
                                <div class="col-12 mb-5">
                                    <p>Foto :</p>
                                    @foreach ($images as $image)
                                        <a class="example-image-link"
                                        href="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" data-lightbox="example-1">
                                        <img style="width: 120px; height:100px; object-fit:cover;" src="{{ asset('images/potensi/'.$image->folder.'/'.$image->name) }}" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    <p>Nama Desa Wisata : <strong>{{ ucwords($data->objek_wisata->nama) }}</strong></p>
                                    <p>Jenis Potensi : <strong>{{ ucwords($data->jenis_potensi->nama_jenis_potensi) }}</strong></p>
                                    <p>Nama Potensi : <strong>{{ ucwords($data->nama) }}</strong></p>
                                    <p>Harga Tiket : <strong>Rp. {{ number_format($data->harga_tiket,0,",",".") }}</strong></p>
                                    <p>Alamat : <strong>{{ $data->alamat }}</strong></p>
                                    <div class="col-lg-12 mb-5">
                                        <div id="map" style="width: 100%;height: 200px;border-radius: 10px;"></div>
                                    </div>
                                    <p>Deskripsi : <strong>{{ $data->deskripsi }}</strong></p>
                                    <p>Fasilitas : <strong>{{ $data->fasilitas }}</strong></p>
                                    <p>Sosial Media : <strong>{{ $data->sosial_media }}</strong></p>
                                    <p>Kontak : <strong>{{ $data->kontak }}</strong></p>

                                </div>

                            </div>
                            <div class="row">
                                <a href="{{ route('potensi.index') }}" class="d-flex justify-content-center w-full">
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
