@extends('layouts.dashboard')

@section('content')

@php
    $page = 'laporan';
    $title = 'Laporan';
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

                <h3>Laporan</h3>
                <div class="my-3">
                    <a href="{{ route('export-all') }}">
                        <button class="btn btn-primary my-2"><i class="bi bi-file-pdf"></i> Export PDF</button>
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
                        <h4 class="card-title">Daftar Laporan</h4>
                    </div>
                    <div class="card-body" style="overflow-x: scroll;">
                        <!-- table bordered -->
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kabupaten</th>
                                        <th>Jumlah Desa Wisata</th>
                                        <th>Jumlah Potensi</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><strong>*Semua Kabupaten*</strong></td>
                                        <td>{{ $totalObjekWisata }}</td>
                                        <td>
                                            @foreach($jenisPotensis as $jenisPotensi)
                                                {{ $jenisPotensi->nama_jenis_potensi }} ({{ $totalPotensiCounts[$jenisPotensi->id] ?? 0 }})<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @php
                                        $no =2;
                                    @endphp
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords($item->nama_kabupaten) }}</td>
                                                <td>{{ $item->objekWisata()->count() }}</td>
                                                <td>
                                                    @php
                                                        $jenisPotensiCounts = [];
                                                        foreach ($item->objekWisata as $objekWisata) {
                                                            foreach ($objekWisata->potensi as $potensi) {
                                                                if (!isset($jenisPotensiCounts[$potensi->jenis_potensi->id])) {
                                                                    $jenisPotensiCounts[$potensi->jenis_potensi->id] = 0;
                                                                }
                                                                $jenisPotensiCounts[$potensi->jenis_potensi->id]++;
                                                            }
                                                        }
                                                    @endphp

                                                    @foreach($jenisPotensis as $jenisPotensi)
                                                        {{ $jenisPotensi->nama_jenis_potensi }} ({{ $jenisPotensiCounts[$jenisPotensi->id] ?? 0 }})<br>
                                                    @endforeach
                                                </td>
                                                {{-- <td>
                                                    <div class="dropdown">
                                                        <button id="toa" class="btn btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <span class="bi bi-three-dots-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a href="{{ route('kabupaten.edit',$item->id) }}" class="dropdown-item"><i class="bi bi-file-pdf"></i> Export Pdf</a>
                                                        </div>
                                                    </div>
                                                </td> --}}
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
