<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kabupaten::orderBy('created_at', 'DESC')->get();
        return view('admin.kabupaten.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kabupaten.add');
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
            'nama_kabupaten' => ['required', 'string', 'max:255', 'unique:kabupatens'],
        ]);

        try {
            Kabupaten::create([
                'nama_kabupaten' => $request->nama_kabupaten
            ]);
            return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil ditambah!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        $data = $kabupaten;
        return view('admin.kabupaten.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $data = $kabupaten;
        if ($data->nama_kabupaten == $request->nama_kabupaten) {
            $request->validate([
                'nama_kabupaten' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'nama_kabupaten' => ['required', 'string', 'max:255', 'unique:kabupatens'],
            ]);
        }

        try {
            $data->update([
                'nama_kabupaten' => $request->nama_kabupaten
            ]);

            return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil diedit!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->back()->with('success', 'Kabupaten berhasil dihapus!');
    }
}
