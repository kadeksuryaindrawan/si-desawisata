<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Pengunjung')){
            $datas = Transaksi::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        }
        if(Auth::user()->hasRole('Admin')){
            $datas = Transaksi::orderBy('created_at','DESC')->get();
        }

        if(Auth::user()->hasRole('Pengelola')){
            $wisata = ObjekWisata::where('pengelola_id',Auth::user()->id)->first();
            $id_wisata = $wisata->id;
            $datas = Transaksi::where('objek_wisata_id',$id_wisata)->orderBy('created_at','DESC')->get();
        }
        
        return view('pengunjung.transaksi.index',compact('datas'));
    }

    public function datadiri(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $wisata = ObjekWisata::find($id);
        $jumlah = $request->jumlah;
        $total = $jumlah * $wisata->harga;

        Transaksi::create([
            'user_id' => $user_id,
            'objek_wisata_id' => $id,
            'jumlah' => $jumlah,
            'total' => $total,
            'status' => 'belum_bayar',
            'bukti_bayar' => NULL,
        ]);

        $transaksi = Transaksi::orderBy('created_at','DESC')->first();
        $id_transaksi = $transaksi->id;
        return view('pengunjung.transaksi.datadiri',compact('data','wisata','jumlah','total','id_transaksi'));
    }

    public function databayar($id)
    {
        $data = Transaksi::find($id);
        return view('pengunjung.transaksi.databayar',compact('data'));
    }

    public function bayar(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required',
        ]);

        $foto = $request->file('bukti_bayar');

                $nama_foto = strtolower($id)."-" ."bukti.".$foto->getClientOriginalExtension();
                Transaksi::where('id',$id)->update([
                    'status' => 'sudah_bayar',
                    'bukti_bayar' => 'images/buktibayar/'.$nama_foto,
                    ]);
                    $foto->move('images/buktibayar/',$nama_foto);
        return redirect()->route('transaksi.index')->with('success', 'Pembayaran berhasil dilakukan!');
    }

    public function konfirmasibayar($id)
    {
                Transaksi::where('id',$id)->update([
                    'status' => 'dikonfirmasi'
                    ]);
        return redirect()->route('transaksi.index')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function unduhinvoice($id)
    {
        $item = Transaksi::where('id',$id)->first();
    	$pdf = PDF::loadview('invoice_pdf',compact('item'))->setPaper('a4', 'landscape');
    	return $pdf->download('HIDEMS'.$item->id.$item->user_id.$item->objek_wisata_id.'.pdf');
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
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        if($transaksi->bukti_bayar !== NULL){
            unlink($transaksi->bukti_bayar);
        }
        Transaksi::destroy($id);

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
    }
}
