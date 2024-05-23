<?php

namespace App\Http\Controllers;

use App\Models\JenisPotensi;
use Illuminate\Http\Request;

class JenisPotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = JenisPotensi::orderBy('created_at', 'DESC')->get();
        return view('admin.jenispotensi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenispotensi.add');
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
            'nama_jenis_potensi' => ['required', 'string', 'max:255', 'unique:jenis_potensis'],
        ]);

        try {
            JenisPotensi::create([
                'nama_jenis_potensi' => $request->nama_jenis_potensi
            ]);
            return redirect()->route('jenispotensi.index')->with('success', 'Jenis Potensi berhasil ditambah!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPotensi  $jenisPotensi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPotensi $jenisPotensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPotensi  $jenisPotensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JenisPotensi::find($id);
        return view('admin.jenispotensi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPotensi  $jenisPotensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JenisPotensi::find($id);
        if ($data->nama_jenis_potensi == $request->nama_jenis_potensi) {
            $request->validate([
                'nama_jenis_potensi' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'nama_jenis_potensi' => ['required', 'string', 'max:255', 'unique:jenis_potensis'],
            ]);
        }

        try {
            $data->update([
                'nama_jenis_potensi' => $request->nama_jenis_potensi
            ]);

            return redirect()->route('jenispotensi.index')->with('success', 'Jenis Potensi berhasil diedit!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPotensi  $jenisPotensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisPotensi::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Jenis Potensi berhasil dihapus!');
    }
}
