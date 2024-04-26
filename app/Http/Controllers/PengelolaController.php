<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::role('Pengelola')->orderBy('created_at','DESC')->get();
        return view('admin.pengelola.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengelola.add');
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
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required', 'string', 'min:7', 'confirmed'],
        ]);

        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->assignRole('Pengelola');
            return redirect()->route('pengelola.index')->with('success', 'Pengelola berhasil ditambah!');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.pengelola.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        if($data->email == $request->email){
            $request->validate([
                'name'=>['required', 'string', 'max:255'],
                'email'=>['required', 'string', 'email', 'max:255'],
            ]);
        }
        else{
            $request->validate([
                'name'=>['required', 'string', 'max:255'],
                'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        try{
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect()->route('pengelola.index')->with('success', 'Pengelola berhasil diedit!');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    public function ubahPassword($id)
    {
        $data = User::find($id);
        return view('admin.pengelola.ubahPassword',compact('data'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password'=>['required', 'string', 'min:7', 'confirmed']
        ]);

        try{
            User::where('id',$id)->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->back()->with('success', 'Berhasil ubah password!');

        }catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('success', 'Pengelola berhasil dihapus!');
    }
}
