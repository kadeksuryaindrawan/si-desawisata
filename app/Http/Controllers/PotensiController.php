<?php

namespace App\Http\Controllers;

use App\Models\JenisPotensi;
use App\Models\ObjekWisata;
use App\Models\Potensi;
use App\Models\PotensiImage;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $datas = Potensi::orderBy('created_at', 'DESC')->get();
        } elseif (Auth::user()->hasRole('Pengelola')) {
            $id_user = Auth::user()->id;
            $objek_wisata = ObjekWisata::where('pengelola_id', '=', $id_user)->orderBy('created_at', 'DESC')->get();
            foreach($objek_wisata as $objek_wisata){
                $objek_wisata_id = $objek_wisata->id;
            }
            $datas = Potensi::where('objek_wisata_id', '=', $objek_wisata_id)->orderBy('created_at', 'DESC')->get();
        }

        return view('admin.potensi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objek_wisatas = ObjekWisata::orderBy('created_at', 'DESC')->get();
        $jenis_potensis = JenisPotensi::orderBy('created_at', 'DESC')->get();
        return view('admin.potensi.add', compact('objek_wisatas','jenis_potensis'));
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
            'jenis_potensi_id' => 'required',
            'objek_wisata_id' => 'required',
            'nama' => ['required', 'string', 'max:255', 'unique:potensis'],
            'harga_tiket' => ['required', 'numeric'],
            'alamat' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'fasilitas' => ['required', 'string'],
            'sosial_media' => ['required'],
            'kontak' => ['required'],
        ]);

        $temporary_images = TemporaryImage::all();

        if ($validator->fails()) {
            foreach ($temporary_images as $temporary_image) {
                $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

                File::deleteDirectory($directoryPath);
                $temporary_image->delete();
            }
            return redirect()->route('potensi.create')->withErrors($validator)->withInput();
        }

        try {
            $potensi = Potensi::create([
                'jenis_potensi_id' => $request->jenis_potensi_id,
                'objek_wisata_id' => $request->objek_wisata_id,
                'nama' => $request->nama,
                'harga_tiket' => $request->harga_tiket,
                'alamat' => $request->alamat,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'sosial_media' => $request->sosial_media,
                'kontak' => $request->kontak,
            ]);
            foreach ($temporary_images as $temporary_image) {
                File::copy(public_path('images/tmp/' . $temporary_image->folder . '/' . $temporary_image->file), public_path('images/potensi/' . $temporary_image->folder . '/' . $temporary_image->file));
                PotensiImage::create([
                    'potensi_id' => $potensi->id,
                    'name' => $temporary_image->file,
                    'folder' => $temporary_image->folder
                ]);
                $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

                File::deleteDirectory($directoryPath);
                $temporary_image->delete();
            }
            return redirect()->route('potensi.index')->with('success', 'Potensi berhasil ditambah!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function show(Potensi $potensi)
    {
        $data = $potensi;
        $images = PotensiImage::where('potensi_id', $potensi->id)->get();
        return view('admin.potensi.detail', compact('data', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Potensi $potensi)
    {
        $data = $potensi;
        $objek_wisatas = ObjekWisata::orderBy('created_at', 'DESC')->get();
        $jenis_potensis = JenisPotensi::orderBy('created_at', 'DESC')->get();
        return view('admin.potensi.edit', compact('data', 'objek_wisatas','jenis_potensis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Potensi $potensi)
    {
        $data = $potensi;
        if ($data->nama == $request->nama) {
            $request->validate([
                'jenis_potensi_id' => 'required',
                'objek_wisata_id' => 'required',
                'nama' => ['required', 'string', 'max:255'],
                'harga_tiket' => ['required', 'numeric'],
                'alamat' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],
                'deskripsi' => ['required', 'string'],
                'fasilitas' => ['required', 'string'],
                'sosial_media' => ['required'],
                'kontak' => ['required'],
            ]);
        } else {
            $request->validate([
                'jenis_potensi_id' => 'required',
                'objek_wisata_id' => 'required',
                'nama' => ['required', 'string', 'max:255', 'unique:potensis'],
                'harga_tiket' => ['required', 'numeric'],
                'alamat' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],
                'deskripsi' => ['required', 'string'],
                'fasilitas' => ['required', 'string'],
                'sosial_media' => ['required'],
                'kontak' => ['required'],
            ]);
        }

        try {
            Potensi::where('id', $potensi->id)->update([
                'jenis_potensi_id' => $request->jenis_potensi_id,
                'objek_wisata_id' => $request->objek_wisata_id,
                'nama' => $request->nama,
                'harga_tiket' => $request->harga_tiket,
                'alamat' => $request->alamat,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'sosial_media' => $request->sosial_media,
                'kontak' => $request->kontak,
            ]);

            return redirect()->route('potensi.index')->with('success', 'Potensi berhasil diedit!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potensi $potensi)
    {
        $images = PotensiImage::where('potensi_id', $potensi->id)->get();

        foreach ($images as $image) {
            File::deleteDirectory(public_path('images/potensi/' . $image->folder));
        }
        PotensiImage::where('potensi_id', $potensi->id)->delete();
        $potensi->delete();

        return redirect()->back()->with('success', 'Potensi berhasil dihapus!');
    }

    public function editfotopotensi($id)
    {
        $potensi = Potensi::find($id);
        return view('admin.potensi.editimg', compact('potensi'));
    }

    public function editfotopotensiproses(Request $request, $id)
    {
        $request->validate([
            'image' => ['required']
        ]);

        $temporary_images = TemporaryImage::all();

        $images = PotensiImage::where('potensi_id', $id)->get();
        if ($images->count() > 0) {
            foreach ($images as $image) {
                File::deleteDirectory(public_path('images/potensi/' . $image->folder));
            }
            PotensiImage::where('potensi_id', $id)->delete();
        }

        foreach ($temporary_images as $temporary_image) {
            File::copy(public_path('images/tmp/' . $temporary_image->folder . '/' . $temporary_image->file), public_path('images/potensi/' . $temporary_image->folder . '/' . $temporary_image->file));
            PotensiImage::create([
                'potensi_id' => $id,
                'name' => $temporary_image->file,
                'folder' => $temporary_image->folder
            ]);
            $directoryPath = public_path('images/tmp/' . $temporary_image->folder);

            File::deleteDirectory($directoryPath);
            $temporary_image->delete();
        }
        return redirect()->route('potensi.index')->with('success', 'Foto Potensi berhasil diedit!');
    }
}
