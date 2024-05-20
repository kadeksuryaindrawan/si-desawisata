@extends('layouts.home')

@section('content')

    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('landing') }}/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ asset('landing') }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Desa Wisata</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Desa Wisata</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Last Minute Deal Starts -->
    <section class="trending pb-9">
        <div class="container">

            <div class="section-title mb-6 w-75 mx-auto text-center">
                <h4 class="mb-1 theme1">Desa Wisata</h4>
                @if (isset($key))
                    <h2 class="mb-1">Daftar Desa Wisata</h2>
                    <p>Hasil Pencarian Untuk : <span class="theme">{{ $key }}</span></p>
                @else
                    <h2 class="mb-1">Daftar Desa Wisata <span class="theme">Bali</span></h2>
                    <p>Jumlah Desa Wisata Di Bali : {{ $allDesaWisata }}</p>
                @endif

                {{-- @if ($kategori_id == 'all' || $kategori_id == null)
                    <p>Jumlah Desa Wisata Di Bali : {{ $allDesaWisata }}</p>
                @else
                @php
                    $kategori = $allDesaKategori->where('kategori_id', $kategori_id)->first();
                @endphp
                    @if ($kategori)
                        <p>Jumlah Desa Wisata Di Bali dengan kategori {{ ucwords($kategori->kategori->nama_kategori) }} : {{ $allDesaKategori->where('kategori_id', $kategori_id)->count() }}</p>
                    @else
                        <p>Belum ada data!</p>
                    @endif

                @endif --}}
            </div>
                {{-- <form class="mb-5" action="{{ route('kategorifilter') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kabupaten_id" id="" value="{{ NULL }}">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="kategori">Pilih Kategori :</label>
                            <select name="kategori_id" class="form-control" id="">
                                <option value="all">All ({{ $allDesaKategori->count() }})</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ ( $kategori->id == $kategori_id) ? 'selected' : '' }}>{{ ucwords($kategori->nama_kategori) }} ({{ $kategori->objekWisata()->count() }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for=""></label><br>
                            <input class="nir-btn" type="submit" name="" id="" value="Cari">
                        </div>
                    </div>

                </form> --}}
            <div class="trend-box">
                <div class="row">
                    @if ($datas->count()>0)
                        @foreach ($datas as $item)
                            <div class="col-lg-4 mb-4">
                                <a href="{{ route('detail',$item->id) }}">
                                    <div class="trend-item1 rounded box-shadow bg-white">
                                        <div class="trend-image position-relative">
                                            @foreach ($item->images as $image)
                                            @endforeach
                                            <img src="{{ asset('images/objekwisata/'.$image->folder.'/'.$image->name) }}" style="width: 100%;height:400px;object-fit:cover;" alt="image" class="">
                                            <div class="trend-content1 p-4">
                                                <h3 class="mb-1 white">{{ ucwords($item->nama) }}</h3>
                                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                                    <div class="entry-author">
                                                        <i class="fas fa-map-marker-alt theme1"></i>
                                                        <span class="fw-bold theme1"> {{ ucwords($item->kabupaten->nama_kabupaten) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-danger">Belum ada data!</p>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Last Minute Deal Ends -->

    <script src="{{ asset('landing') }}/js/plugin.js"></script>
@endsection
