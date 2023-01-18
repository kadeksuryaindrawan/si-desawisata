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
                    @if (Auth::user()->hasRole('Admin'))
                        <a href="{{ route('cetaklaporan') }}">
                            <button class="btn btn-primary my-2">Cetak Laporan</button>
                        </a>
                    @endif
                    @if (Auth::user()->hasRole('Pengelola'))
                        <a href="{{ route('cetaklaporanpengelola',Auth::user()->id) }}">
                            <button class="btn btn-primary my-2">Cetak Laporan</button>
                        </a>
                    @endif
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
                    <div class="card-body">
                        <!-- table bordered -->
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KODE TRANSAKSI</th>
                                        <th>Nama Pengunjung</th>
                                        <th>Nama Objek Wisata</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Bukti bayar</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                    @endphp
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><strong>HIDEMS{{ $item->id.$item->user_id.$item->objek_wisata_id }}</strong></td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->objekwisata->nama }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>Rp. {{ number_format($item->total,0,",",".") }}</td>
                                                @if ($item->status == 'belum_bayar')
                                                    <td class="text-danger">Belum Bayar</td>
                                                @endif

                                                @if ($item->status == 'sudah_bayar')
                                                    <td class="text-success">Sudah Bayar</td>
                                                @endif

                                                @if ($item->status == 'dikonfirmasi')
                                                    <td class="text-secondary">Dikonfirmasi</td>
                                                @endif
                                                
                                                @if ($item->bukti_bayar == NULL)
                                                <td class="text-danger">
                                                    Tidak ada
                                                <td>
                                                @endif

                                                @if ($item->bukti_bayar != NULL)
                                                <td><a class="example-image-link"
                                                    href="{{ asset($item->bukti_bayar) }}" data-lightbox="example-1">
                                                    <img style="width: 50px; height:50px;" src="{{ asset($item->bukti_bayar) }}" alt=""></a>
                                                <td>
                                                @endif
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