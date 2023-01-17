@extends('layouts.dashboard')

@section('content')
@php
    $page = 'dashboard';
    $title = 'Dashboard';
@endphp


    
<div class="page-heading">
<h3>Dashboard</h3>
</div>
<div class="page-content">
<section class="row">
<div class="col-12 col-lg-12">
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-5">
                    <h5>Selamat datang di dashboard HIDDEMS, <span class="text-primary">{{ Auth::user()->name }}</span></h5>
                    <a href="{{ route('ubahpassword',Auth::user()->id) }}"><button class="btn btn-primary mt-2">Ubah Password</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>

@endsection