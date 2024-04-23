<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\ObjekWisata;
use App\Models\TemporaryImage;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $kabupatens = Kabupaten::orderBy('created_at', 'DESC')->get();
        return view('admin.objekwisata.add',compact('kategoris','kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'kabupaten_id' => 'required',
            'nama'=>['required', 'string', 'max:255','unique:objek_wisatas'],
            'alamat'=>['required', 'string'],
            'longitude'=>['required', 'string'],
            'latitude'=>['required', 'string'],
            'deskripsi'=>['required', 'string'],
            'potensi_wisata'=>['required', 'string'],
        ]);

        $temporary_images = TemporaryImage::all();

        if ($validator->fails()) {
            foreach ($temporary_images as $temporary_image) {
                $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

                File::deleteDirectory($directoryPath);
                $temporary_image->delete();
            }
            return redirect()->route('objekwisata.create')->withErrors($validator)->withInput();
        }

        try{
            $objek_wisata = ObjekWisata::create([
                'pengelola_id' => NULL,
                'kabupaten_id' => $request->kabupaten_id,
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'deskripsi' => $request->deskripsi,
                'potensi_wisata' => $request->potensi_wisata,
            ]);
            foreach ($temporary_images as $temporary_image) {
                File::copy(public_path('images/tmp/' . $temporary_image->folder . '/' . $temporary_image->file), public_path('images/objekwisata/' . $temporary_image->folder . '/' . $temporary_image->file));
                Image::create([
                    'objek_wisata_id' => $objek_wisata->id,
                    'name' => $temporary_image->file,
                    'folder' => $temporary_image->folder
                ]);
                $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

                File::deleteDirectory($directoryPath);
                $temporary_image->delete();
            }
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
        $images = Image::where('objek_wisata_id', $id)->get();
        return view('admin.objekwisata.detail',compact('data','images'));
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
        $kabupatens = Kabupaten::orderBy('created_at', 'DESC')->get();
        return view('admin.objekwisata.edit',compact('data','kategoris','kabupatens'));
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
                'kabupaten_id' => 'required',
                'kategori_id' => 'required',
                'nama'=>['required', 'string', 'max:255'],
                'alamat'=>['required', 'string'],
                'longitude'=>['required', 'string'],
                'latitude'=>['required', 'string'],
                'deskripsi'=>['required', 'string'],
                'potensi_wisata'=>['required', 'string']
            ]);
        }
        else{
            $request->validate([
                'kabupaten_id' => 'required',
                'kategori_id' => 'required',
                'nama'=>['required', 'string', 'max:255','unique:objek_wisatas'],
                'alamat'=>['required', 'string'],
                'longitude'=>['required', 'string'],
                'latitude'=>['required', 'string'],
                'deskripsi'=>['required', 'string'],
                'potensi_wisata'=>['required', 'string']
            ]);
        }

        try{
                ObjekWisata::where('id',$id)->update([
                    'kabupaten_id' => $request->kabupaten_id,
                    'kategori_id' => $request->kategori_id,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude,
                    'deskripsi' => $request->deskripsi,
                    'potensi_wisata' => $request->potensi_wisata,
                    ]);

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
        $objekwisata = ObjekWisata::find($id);
        $images = Image::where('objek_wisata_id', $id)->get();

        foreach($images as $image){
            File::deleteDirectory(public_path('images/objekwisata/' . $image->folder));
        }
        Image::where('objek_wisata_id', $id)->delete();
        $objekwisata->delete();

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

    public function editfoto($id)
    {
        $objekwisata = ObjekWisata::find($id);
        return view('admin.objekwisata.editimg', compact('objekwisata'));
    }

    public function editfotoproses(Request $request, $id)
    {
        $request->validate([
            'image' => ['required']
        ]);

        $temporary_images = TemporaryImage::all();

        $images = Image::where('objek_wisata_id', $id)->get();
        if ($images->count() > 0) {
            foreach ($images as $image) {
                File::deleteDirectory(public_path('images/objekwisata/' . $image->folder));
            }
            Image::where('objek_wisata_id', $id)->delete();
        }

        foreach ($temporary_images as $temporary_image) {
            File::copy(public_path('images/tmp/' . $temporary_image->folder . '/' . $temporary_image->file), public_path('images/objekwisata/' . $temporary_image->folder . '/' . $temporary_image->file));
            Image::create([
                'objek_wisata_id' => $id,
                'name' => $temporary_image->file,
                'folder' => $temporary_image->folder
            ]);
            $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

            File::deleteDirectory($directoryPath);
            $temporary_image->delete();
        }
        return redirect()->route('objekwisata.index')->with('success', 'Foto Objek wisata berhasil diedit!');
    }
}
