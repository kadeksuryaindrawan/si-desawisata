@extends('layouts.dashboard')

@section('content')

@php
    $page = 'objekwisata';
    $title = 'Objek Wisata';
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
                <h3>Edit Objek Wisata</h3>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Objek Wisata</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('objekwisata.update',$data->id)}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Pilih Kategori</label>
                                                <select name="kategori_id" id="" class="form-control">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($kategoris as $items)
                                                        <option value="{{ $items->id }}" {{ ( $items->id == $data->kategori_id) ? 'selected' : '' }}>{{ $items->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Nama Objek Wisata</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="nama" placeholder="Nama Objek Wisata" value="{{ $data->nama }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Harga Tiket (Rp)</label>
                                                <input type="number" id="email-id-vertical" class="form-control"
                                                    name="harga" placeholder="Harga" value="{{ $data->harga }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $data->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Longitude</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="longitude" placeholder="Longitude" value="{{ $data->longitude }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Latitude</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="latitude" placeholder="Latitude" value="{{ $data->latitude }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $data->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                                <textarea class="form-control" id="fasilitas" rows="3" name="fasilitas">{{ $data->fasilitas }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Foto Objek Wisata</label><br>
                                                <a class="example-image-link"
                                                     href="{{ asset($data->foto) }}" data-lightbox="example-1">
                                                     <img style="width: 70px; height:70px; padding:5px;" src="{{ asset($data->foto) }}" alt=""></a>
                                                <input type="file" id="email-id-vertical" class="form-control"
                                                    name="foto" placeholder="Foto Objek Wisata">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="{{ route('objekwisata.index') }}" class="d-flex justify-content-center w-full">
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