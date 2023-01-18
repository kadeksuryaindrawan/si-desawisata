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
        <div class="container pb-5">
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
                            <p class="h3 py-2">Rp. {{ number_format($data->harga, 0, ',', '.') }} / Orang</p>

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

                            <form action="{{ route('datadiri', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Jumlah :
                                                <input type="number" name="jumlah" id="product-quanity" value="1">
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg w-100" name="submit">Beli
                                            Tiket</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="{{ url('/destination') }}"><button class="btn btn-secondary btn-lg w-100"
                                            name="submit">Kembali</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <div id="mapid" style="width:100%; height:300px;"></div>
        <div>
            <a href="http://maps.google.com/maps?z=15&t=m&q={{ $data->latitude }},{{ $data->longitude }}" target="_blank">Klik Disini</a>
        </div>
    </div>

    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Infromation</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                            <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                            <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                            <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                            <li><a href="#" class="py-2 d-block">Call Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Experience</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Adventure</a></li>
                            <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                            <li><a href="#" class="py-2 d-block">Beach</a></li>
                            <li><a href="#" class="py-2 d-block">Nature</a></li>
                            <li><a href="#" class="py-2 d-block">Camping</a></li>
                            <li><a href="#" class="py-2 d-block">Party</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392
                                            3929 210</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endsection
