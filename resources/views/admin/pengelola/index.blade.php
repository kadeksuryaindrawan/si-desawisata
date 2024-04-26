@extends('layouts.dashboard')

@section('content')

@php
    $page = 'pengelola';
    $title = 'Pengelola';
@endphp

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                @if(session('success'))
                  <div class="alert alert-success" role="alert">
                      {{session('success')}}
                  </div>
                @endif

                @if(session('error'))
                  <div class="alert alert-danger" role="alert">
                      {{session('error')}}
                  </div>
                @endif

                <h3>Pengelola</h3>
                <div class="my-3">
                    <a href="{{ route('pengelola.create') }}">
                        <button class="btn btn-primary my-2">Tambah Pengelola</button>
                    </a>
                </div>
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pengelola</h4>
                    </div>
                    <div class="card-body" style="overflow-x: scroll;">
                        <!-- table bordered -->
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Pengelola</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                    @endphp
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button id="toa" class="btn btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <span class="bi bi-three-dots-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a href="{{ route('pengelola.edit',$item->id) }}" class="dropdown-item"><i class="bi bi-pencil-square"></i> Edit</a>
                                                            <form action="{{route('pengelola.destroy',$item->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="dropdown-item"><i class="bi bi-trash"></i> Hapus</button>
                                                              </form>
                                                              <a href="{{ route('ubahpassword',$item->id) }}" class="dropdown-item"><i class="bi bi-pencil-square"></i> Ubah Password</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

    </section>
    <!-- Basic Tables end -->
</div>


@endsection
