@extends('layouts.home')

@section('content')

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('landing') }}/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Login</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- login section starts -->
    <section class="login-register pt-6 pb-6">
        <div class="container">
            <div class="log-main blog-full log-reg w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-12 pe-4">
                        <h3 class="text-center border-b pb-2">Login</h3>
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                        @endforeach
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <input type="submit" class="nir-btn w-100" id="submit" value="Login">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section Ends -->

@endsection
