@extends('layouts.dashboard')

@section('content')
@php
    $page = 'login';
    $title = 'Login';
@endphp

<div id="auth">
        
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ url('/') }}"><h4 class="text-primary">Hidems</h4></a>
                </div>
                <h1 class="text-primary fs-1 mb-4">Login</h1>
                <p class="fs-4 mb-5">Silahkan login menggunakan akun anda.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" name="email" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Login</button>
                </form>
                <div class="text-center mt-5 text-md fs-5">
                    <p class="text-gray-600">Belum punya akun? <a href="{{ url('/register') }}" class="font-bold">Register</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>

@endsection
