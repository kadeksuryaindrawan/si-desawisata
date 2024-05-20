@extends('layouts.home')

@section('content')

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('landing') }}/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">About Us</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- about-us starts -->
    <section class="about-us pt-6" style="background-image:url({{ asset('landing') }}/images/background_pattern.png); background-position:bottom right;">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-6 ps-4">
                        <div class="about-content text-center text-lg-start">
                            <h4 class="theme d-inline-block mb-0">Mari Ketahui Tentang Desa Wisata</h4>
                            <h2 class="border-b mb-2 pb-1">Jelajahi Desa Wisata Di Bali</h2>
                            <p class="border-b mb-2 pb-2">Desa wisata adalah desa yang dijadikan
                                tempat wisata karena daya tarik yang dimilikinya.
                                 Desa wisata merupakan suatu bentuk integrasi
                                 antara atraksi, akomodasi dan fasilitas pendukung.
                                 <br><br> Desa wisata disajikan dalam suatu struktur kehidupan
                                 masyarakat yang menyatu dengan tata cara dan tradisi yang berlaku.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 pe-4">
                        <div class="about-image" style="animation:none; background:transparent;">
                            <img src="{{ asset('/landing') }}/images/travel.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->

    <script src="{{ asset('landing') }}/js/plugin.js"></script>
@endsection
