@extends('layouts.home')

@section('content')

@php
    $page = 'datadiri';
@endphp

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
           <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Destination Detail <i class="fa fa-chevron-right"></i></span></p>
           <h1 class="mb-0 bread">Data Pembayaran</h1>
       </div>
   </div>
  </div>
  </section>
  
  <section class="ftco-section">
    <div class="container pb-5">
        <div class="row">
            <!-- col end -->
            <div class="col-lg-12 mt-5">
                @if(session('error'))
                  <div class="alert alert-danger" role="alert">
                      {{session('error')}}
                  </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Data Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <h4>Silahkan Melakukan Transfer ke Rekening BCA : <strong>279238192 an cicidimsum</strong> dan upload bukti pembayaran pada form dibawah</h4>
                        
                        <h6>KODE TRANSAKSI : </h6>
                        <p><strong>HIDEMS{{ $data->id.$data->user_id.$data->objek_wisata_id }}</strong></p>
                        
                        <h6>Nama Objek Wisata : </h6>
                        <p><strong>{{ $data->objekwisata->nama }}</strong></p>
                        
                        <h6>Total Bayar :</h6>
                        <p><strong>Rp. {{ number_format($data->total,0,",",".") }}</strong></p>

                        <form action="{{ route('bayar',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
        
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Bukti Pembayaran :
                                            <input type="file" name="bukti_bayar">
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Bayar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  
  
  
  <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">About</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
          </ul>
      </div>
  </div>
  <div class="col-md pt-5 border-left">
      <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
        <h2 class="ftco-heading-2">Infromation</h2>
        <ul class="list-unstyled">
          <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
          <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
          <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
          <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
          <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
          <li><a href="#" class="py-2 d-block">Call Us</a></li>
      </ul>
  </div>
  </div>
  <div class="col-md pt-5 border-left">
     <div class="ftco-footer-widget pt-md-5 mb-4">
        <h2 class="ftco-heading-2">Experience</h2>
        <ul class="list-unstyled">
          <li><a href="#" class="py-2 d-block">Adventure</a></li>
          <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
          <li><a href="#" class="py-2 d-block">Beach</a></li>
          <li><a href="#" class="py-2 d-block">Nature</a></li>
          <li><a href="#" class="py-2 d-block">Camping</a></li>
          <li><a href="#" class="py-2 d-block">Party</a></li>
      </ul>
  </div>
  </div>
  <div class="col-md pt-5 border-left">
      <div class="ftco-footer-widget pt-md-5 mb-4">
         <h2 class="ftco-heading-2">Have a Questions?</h2>
         <div class="block-23 mb-3">
           <ul>
             <li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
             <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
             <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
         </ul>
     </div>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
  
      <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>
  </div>
  </div>
  </footer>
    
@endsection