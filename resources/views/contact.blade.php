@extends('layouts.home')

@section('content')

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('landing') }}/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Contact Us</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- contact starts -->
    <section class="contact-main pt-6 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">INFORMASI TENTANG KAMI</h3>
                                <p class="mb-0">Berikut merupakan informasi tentang kami.</p>
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker-alt theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Location</h3>
                                            <p class="m-0">Bali, Indonesia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope theme"></i>
                                        </div>
                                        <div class="info-content ps-4">
                                            <h3>Email</h3>
                                            <p class="m-0">sideta@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->

    <script src="{{ asset('landing') }}/js/plugin.js"></script>
@endsection
