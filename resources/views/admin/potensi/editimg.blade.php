@extends('layouts.dashboard')

@section('content')

@php
    $page = 'potensi';
    $title = 'Potensi';
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
                <h3>Edit Foto Objek Wisata</h3>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Foto Potensi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('editfotopotensiproses',$potensi->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="image">Foto</label>
                                                <input type="file" id="image" class="filepond"
                                                    name="image" multiple credits="false" required>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="{{ route('potensi.index') }}" class="d-flex justify-content-center w-full">
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

<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);

        const inputElement = document.querySelector('input[type="file"]');

        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            acceptedFileTypes: ['image/*'],
            server: {
                process: '{{ route('uploadtemporarypotensi') }}',
                revert: '{{ route('deletetemporarypotensi') }}',
                headers:{
                    'X_CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
</script>

@endsection
