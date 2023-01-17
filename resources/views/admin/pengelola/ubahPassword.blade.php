@extends('layouts.dashboard')

@section('content')

@php
    $page = 'ubahpassword';
    $title = 'Ubah Password';
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
                <h3>Ubah Password</h3>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Ubah Password</h4>
                        
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('updatepassword',$data->id)}}" method="POST" class="form form-vertical">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Password Baru</label>
                                                <input type="password" id="email-id-vertical" class="form-control"
                                                    name="password" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Re-Password Baru</label>
                                                <input type="password" id="email-id-vertical" class="form-control"
                                                    name="password_confirmation" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="{{ route('pengelola.index') }}" class="d-flex justify-content-center w-full">
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


@endsection