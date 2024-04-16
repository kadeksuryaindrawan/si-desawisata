<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $datas = ObjekWisata::orderBy('created_at','DESC')->get();
        $datas3 = ObjekWisata::orderBy('created_at', 'DESC')->paginate(3);
        return view('index',compact('datas','datas3'));
    }

    public function about(){
        return view('about');
    }

    public function destination(){
        $datas = ObjekWisata::orderBy('created_at','DESC')->get();
        return view('destination',compact('datas'));
    }

    public function detail($id){
        $data = ObjekWisata::find($id);
        return view('detail',compact('data'));
    }

    public function contact(){
        return view('contact');
    }

    public function dashboard(){
        return view('admin.index');
    }
}
