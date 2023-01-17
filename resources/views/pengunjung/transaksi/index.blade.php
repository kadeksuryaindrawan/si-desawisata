@extends('layouts.dashboard')

@section('content')

@php
    $page = 'transaksi';
    $title = 'Transaksi';
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

                <h3>Transaksi</h3>
                <div class="my-3">
                    @if (Auth::user()->hasRole('Pengunjung'))
                        <a href="{{ url('/destination') }}">
                            <button class="btn btn-primary my-2">Tambah Transaksi</button>
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
                        <h4 class="card-title">Daftar Transaksi</h4>
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
                                                
                                                    <div class="dropdown">
                                                        <button id="toa" class="btn btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <span class="bi bi-three-dots-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            @if (Auth::user()->hasRole('Pengunjung'))
                                                                @if ($item->status == 'belum_bayar')
                                                                <form action="{{route('databayar',$item->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="dropdown-item"><i class="bi bi-bank"></i> Bayar</button>
                                                                </form>
                                                                @endif
                                                            @endif

                                                            @if ($item->status == 'dikonfirmasi')
                                                                <form action="{{route('unduhinvoice',$item->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="dropdown-item"><i class="bi bi-filetype-pdf"></i> Unduh Invoice</button>
                                                                </form>
                                                                @endif
                                                            
                                                            @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Pengelola'))
                                                                @if ($item->status == 'sudah_bayar')
                                                                <form action="{{route('konfirmasibayar',$item->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="dropdown-item"><i class="bi bi-check2"></i> Konfirmasi Pembayaran</button>
                                                                </form>
                                                                @endif
                                                            @endif
                                                            
                                                            <form action="{{route('transaksi.destroy',$item->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="dropdown-item"><i class="bi bi-trash"></i> Hapus</button>
                                                              </form>
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