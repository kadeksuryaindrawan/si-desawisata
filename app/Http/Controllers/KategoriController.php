<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kategori::orderBy('created_at','DESC')->get();
        return view('admin.kategori.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.add');
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
            'nama_kategori'=>['required', 'string', 'max:255','unique:kategoris'],
        ]);

        try{
            Kategori::create([
                'nama_kategori' => $request->nama_kategori
            ]);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambah!');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('admin.kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kategori::find($id);
        if($data->nama_kategori == $request->nama_kategori){
            $request->validate([
                'nama_kategori'=>['required', 'string', 'max:255'],
            ]);
        }
        else{
            $request->validate([
                'nama_kategori'=>['required', 'string', 'max:255','unique:kategoris'],
            ]);
        }

        try{
            Kategori::where('id',$id)->update([
                'nama_kategori' => $request->nama_kategori
            ]);

            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diedit!');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::destroy($id);

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
