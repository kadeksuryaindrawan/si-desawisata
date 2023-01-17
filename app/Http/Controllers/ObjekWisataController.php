<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\ObjekWisata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')){
            $datas = ObjekWisata::orderBy('created_at','DESC')->get();
        }
        elseif(Auth::user()->hasRole('Pengelola')){
            $id_user = Auth::user()->id;
            $datas = ObjekWisata::where('pengelola_id','=',$id_user)->orderBy('created_at','DESC')->get();
        }
        
        return view('admin.objekwisata.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('created_at','DESC')->get();
        return view('admin.objekwisata.add',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama'=>['required', 'string', 'max:255','unique:objek_wisatas'],
            'harga'=>['required'],
            'alamat'=>['required', 'string'],
            'longitude'=>['required', 'string'],
            'latitude'=>['required', 'string'],
            'deskripsi'=>['required', 'string'],
            'fasilitas'=>['required', 'string'],
            'foto'=>['required']
        ]);

        $foto = $request->file('foto');

        $nama_foto = strtolower($request->nama)."-" ."foto.".$foto->getClientOriginalExtension();

        try{
            ObjekWisata::create([
                'pengelola_id' => NULL,
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'alamat' => $request->alamat,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'foto' => 'images/objekwisata/'.$nama_foto
            ]);
            $foto->move('images/objekwisata/',$nama_foto);
            return redirect()->route('objekwisata.index')->with('success', 'Objek wisata berhasil ditambah!');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObjekWisata  $objekWisata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ObjekWisata::find($id);
        return view('admin.objekwisata.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObjekWisata  $objekWisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ObjekWisata::find($id);
        $kategoris = Kategori::orderBy('created_at','DESC')->get();
        return view('admin.objekwisata.edit',compact('data','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObjekWisata  $objekWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ObjekWisata::find($id);
        if($data->nama == $request->nama){
            $request->validate([
                'kategori_id' => 'required',
                'nama'=>['required', 'string', 'max:255'],
                'harga'=>['required'],
                'alamat'=>['required', 'string'],
                'longitude'=>['required', 'string'],
                'latitude'=>['required', 'string'],
                'deskripsi'=>['required', 'string'],
                'fasilitas'=>['required', 'string']
            ]);
        }
        else{
            $request->validate([
                'kategori_id' => 'required',
                'nama'=>['required', 'string', 'max:255','unique:objek_wisatas'],
                'harga'=>['required'],
                'alamat'=>['required', 'string'],
                'longitude'=>['required', 'string'],
                'latitude'=>['required', 'string'],
                'deskripsi'=>['required', 'string'],
                'fasilitas'=>['required', 'string']
            ]);
        }

        try{
            if($request->file('foto')!==NULL){
                unlink($data->foto);
                $foto = $request->file('foto');

                $nama_foto = strtolower($request->nama)."-" ."foto.".$foto->getClientOriginalExtension();
                ObjekWisata::where('id',$id)->update([
                    'kategori_id' => $request->kategori_id,
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'alamat' => $request->alamat,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude,
                    'deskripsi' => $request->deskripsi,
                    'fasilitas' => $request->deskripsi,
                    'foto' => 'images/objekwisata/'.$nama_foto
                    ]);
                    $foto->move('images/objekwisata/',$nama_foto);
            }
            else{
                ObjekWisata::where('id',$id)->update([
                    'kategori_id' => $request->kategori_id,
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'alamat' => $request->alamat,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude,
                    'deskripsi' => $request->deskripsi,
                    'fasilitas' => $request->deskripsi,
                    ]);
            }
            return redirect()->route('objekwisata.index')->with('success', 'Objek wisata berhasil diedit!');
        }catch(\Throwable $th){
            throw $th;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObjekWisata  $objekWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ObjekWisata::destroy($id);

        return redirect()->back()->with('success', 'Objek wisata berhasil dihapus!');
    }

    public function pilihPengelola($id)
    {
        $data = ObjekWisata::find($id);
        $pengelolas = User::select(
            '*'
        )->role('Pengelola')
        ->leftJoin("objek_wisatas", "users.id", "=", "objek_wisatas.pengelola_id")
        ->whereNull('objek_wisatas.pengelola_id')
        ->orderBy('users.created_at','DESC')
        ->get();
        return view('admin.objekwisata.pilihpengelola',compact('data','pengelolas'));
    }

    public function tambahPengelola(Request $request, $id)
    {
        if($request->pengelola_id == NULL){
            return redirect()->route('objekwisata.index')->with('success', 'Pengelola objek wisata berhasil dipilih!');
        }

        if($request->pengelola_id == '0'){
            $request->validate([
                'pengelola_id' => 'required'
            ]);
            ObjekWisata::where('id',$id)->update([
                'pengelola_id' => NULL,
            ]);
            return redirect()->route('objekwisata.index')->with('success', 'Pengelola objek wisata berhasil dihapus!');
        }
        else{
            $request->validate([
                'pengelola_id' => 'required'
            ]);
            $pengelola = User::where('email','=',$request->pengelola_id)->first();
            $pengelola_id = $pengelola->id;
            ObjekWisata::where('id',$id)->update([
                'pengelola_id' => $pengelola_id,
            ]);
            return redirect()->route('objekwisata.index')->with('success', 'Pengelola objek wisata berhasil dipilih!');
        }
        
        
    }
}
