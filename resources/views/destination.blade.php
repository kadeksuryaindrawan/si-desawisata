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
                                    class="fa fa-chevron-right"></i></a></span> <span>Destination <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Destination</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 70px;">
                    <h4 class="h4">Peta Destinasi</h4>
                    <div id="map" style="width: 100%;height: 800px;border-radius: 10px;z-index:1;"></div>
                    <div id="data" style="display: none;">
                        @foreach($datas as $item)
                            <div class="item" data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}" data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}"></div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="h4">Daftar Destinasi</h4>
                </div>
                @foreach ($datas as $item)
                    <div class="col-md-4 ftco-animate">
                        <a href="{{ route('detail',$item->id) }}">
                        <div class="project-wrap">
                            @foreach ($item->images as $image)
                            @endforeach
                            <div class="img" style="background-image: url('{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}');"></div>
                            <div class="text p-4">
                                <span class="days">{{ $item->kategori->nama_kategori }}</span>
                                <h3>{{ ucwords($item->nama) }}</h3>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

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
