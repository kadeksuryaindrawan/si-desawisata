<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')){
            $datas = Transaksi::where('status','dikonfirmasi')->orderBy('created_at','DESC')->get();
        }

        if(Auth::user()->hasRole('Pengelola')){
            $wisata = ObjekWisata::where('pengelola_id',Auth::user()->id)->first();
            $id_wisata = $wisata->id;
            $datas = Transaksi::where('objek_wisata_id',$id_wisata)->where('status','dikonfirmasi')->orderBy('created_at','DESC')->get();
        }

        return view('admin.laporan.index',compact('datas'));
    }

    public function cetaklaporan()
    {
        $datas = Transaksi::where('status','dikonfirmasi')->orderBy('created_at','DESC')->get();
    	$pdf = PDF::loadview('admin.laporan.cetak_laporan_pdf',compact('datas'))->setPaper('a4', 'landscape');
    	return $pdf->download('Laporan-HIDEMS.pdf');
    }

    public function cetaklaporanpengelola($id)
    {
        $wisata = ObjekWisata::where('pengelola_id',$id)->first();
        $id_wisata = $wisata->id;
        $datas = Transaksi::where('objek_wisata_id',$id_wisata)->where('status','dikonfirmasi')->orderBy('created_at','DESC')->get();
    	$pdf = PDF::loadview('admin.laporan.cetak_laporan_pdf',compact('datas'))->setPaper('a4', 'landscape');
    	return $pdf->download('Laporan-HIDEMS.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
