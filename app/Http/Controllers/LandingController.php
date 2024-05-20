<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kabupaten;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::orderBy('created_at','desc')->get();
        $allDesaWisata = ObjekWisata::count();
        $datas = ObjekWisata::orderBy('created_at','DESC')->get();
        $datas3 = ObjekWisata::orderBy('created_at', 'DESC')->paginate(3);
        return view('index',compact('datas','datas3','kabupatens', 'allDesaWisata'));
    }

    public function about(){
        $allDesaWisata = ObjekWisata::count();
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        return view('about',compact('kabupatens', 'allDesaWisata'));
    }

    public function desawisata(){
        $allDesaWisata = ObjekWisata::count();
        // $allDesaKategori = ObjekWisata::orderBy('created_at', 'DESC')->get();
        $datas = ObjekWisata::orderBy('created_at','DESC')->get();
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        // $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        // $kategori_id = NULL;
        return view('desawisata',compact('datas','kabupatens','allDesaWisata'));
    }

    public function desawisatakabupaten($id)
    {
        $allDesaWisata = ObjekWisata::count();
        // $allDesaKabupaten = ObjekWisata::where('kabupaten_id',$id)->orderBy('created_at', 'DESC')->get();
        $datas = ObjekWisata::where('kabupaten_id',$id)->orderBy('created_at', 'DESC')->get();
        $data = Kabupaten::find($id);
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        // $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        // $kategori_id = NULL;
        return view('desawisatakabupaten', compact('data','datas','kabupatens', 'allDesaWisata'));
    }

    // public function kategorifilter(Request $request){
    //     $kabupaten_id = $request->kabupaten_id;
    //     $kategori_id = $request->kategori_id;

    //     if($kabupaten_id == NULL){
    //         if($kategori_id == 'all'){
    //             $allDesaWisata = ObjekWisata::count();
    //             $allDesaKategori = ObjekWisata::orderBy('created_at', 'DESC')->get();
    //             $datas = ObjekWisata::orderBy('created_at', 'DESC')->get();
    //             $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
    //             $kategoris = Kategori::orderBy('created_at', 'desc')->get();
    //             return view('desawisata', compact('datas','allDesaKategori','kategori_id', 'kabupatens', 'allDesaWisata', 'kategoris'));
    //         }else{
    //             $allDesaWisata = ObjekWisata::count();
    //             $allDesaKategori = ObjekWisata::orderBy('created_at', 'DESC')->get();
    //             $datas = ObjekWisata::where('kategori_id', $kategori_id)->orderBy('created_at', 'DESC')->get();
    //             $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
    //             $kategoris = Kategori::orderBy('created_at', 'desc')->get();
    //             return view('desawisata', compact('datas','allDesaKategori', 'kategori_id', 'kabupatens', 'allDesaWisata', 'kategoris'));
    //         }
    //     }else{
    //         if ($kategori_id == 'all') {
    //             $allDesaWisata = ObjekWisata::count();
    //             $allDesaKabupaten = ObjekWisata::where('kabupaten_id', $kabupaten_id)->orderBy('created_at', 'DESC')->get();
    //             $datas = ObjekWisata::where('kabupaten_id', $kabupaten_id)->orderBy('created_at', 'DESC')->get();
    //             $data = Kabupaten::find($kabupaten_id);
    //             $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
    //             $kategoris = Kategori::orderBy('created_at', 'desc')->get();
    //             return view('desawisatakabupaten', compact('data', 'allDesaKabupaten', 'kategori_id', 'datas', 'kabupatens', 'allDesaWisata', 'kategoris'));
    //         }else{
    //             $allDesaWisata = ObjekWisata::count();
    //             $allDesaKabupaten = ObjekWisata::where('kabupaten_id', $kabupaten_id)->orderBy('created_at', 'DESC')->get();
    //             $datas = ObjekWisata::where('kabupaten_id', $kabupaten_id)->where('kategori_id', $kategori_id)->orderBy('created_at', 'DESC')->get();
    //             $data = Kabupaten::find($kabupaten_id);
    //             $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
    //             $kategoris = Kategori::orderBy('created_at', 'desc')->get();
    //             return view('desawisatakabupaten', compact('data', 'allDesaKabupaten', 'kategori_id', 'datas', 'kabupatens', 'allDesaWisata', 'kategoris'));
    //         }
    //     }
    // }

    public function detail($id){
        $allDesaWisata = ObjekWisata::count();
        $data = ObjekWisata::find($id);
        $images = Image::where('objek_wisata_id', $id)->get();
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        return view('detail',compact('data','images','kabupatens', 'allDesaWisata'));
    }

    public function contact(){
        $allDesaWisata = ObjekWisata::count();
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        return view('contact',compact('kabupatens','allDesaWisata'));
    }

    public function search(Request $request)
    {
        $allDesaWisata = ObjekWisata::count();
        $kabupatens = Kabupaten::orderBy('created_at', 'desc')->get();
        $key = $request->key;
        $datas = ObjekWisata::where('nama', 'like', "%{$key}%")
            ->orWhereHas('kabupaten', function ($q) use ($key) {
                $q->where('nama_kabupaten', 'like', "%{$key}%");
            })
            ->orderBy('created_at', 'DESC')->get();
        return view('desawisata', compact('datas','allDesaWisata','kabupatens', 'key'));
    }
}
