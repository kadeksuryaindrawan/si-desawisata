@extends('layouts.home')
@section('content')

@php
    $page = 'home';
@endphp

<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/bg_5.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">Welcome to Hidden Gems of Kuta Selatans</span>
                <h1 class="mb-4">Temukan Tempat Favorit Anda Bersama Kami</h1>
                <p class="caps">Bepergian ke sudut manapun di Kuta Selatan, tanpa ribet</p>
            </div>
            <a href="https://youtu.be/v7o6smEU8AM" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>
</div>



    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">
                        <span class="subheading">Welcome to Pacific</span>
                        <h2 class="mb-4">It's time to start your adventure</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                        A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img" style="background-image: url('{{ asset('images/services-1.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Activities</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img" style="background-image: url('{{ asset('images/services-2.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Travel Arrangements</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img" style="background-image: url('{{ asset('images/services-3.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Private Guide</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img" style="background-image: url('{{ asset('images/services-4.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Location Manager</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" style="margin-bottom: -150px; margin-top: -150px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Peta Destinasi</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div id="map" style="width: 100%;height: 500px;border-radius: 10px; z-index:1;"></div>
                    <div id="data" style="display: none;">
                        @foreach($datas as $item)
                            <div class="item" data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}" data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}"></div>
                        @endforeach
                    </div>
                </div>

          </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Destinasi</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($datas3 as $item)

                <div class="col-md-4 ftco-animate">
                    <a href="{{ route('detail',$item->id) }}">
                    <div class="project-wrap">
                        @foreach ($item->images as $image)
                        @endforeach
                        <div class="img" style="background-image: url('{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}');">
                    </div>
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

    <section class="ftco-section ftco-about img"style="background-image: url('{{ asset('images/bg_4.jpg') }}');">
        <div class="overlay"></div>
        <div class="container py-md-5">
            <div class="row py-md-5">
                <div class="col-md d-flex align-items-center justify-content-center">
                    <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about ftco-no-pt img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(images/about-1.jpg);">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">About Us</span>
                                    <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        let mapOptions = {
            center:[-8.795349, 115.168552],
            zoom:12
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
