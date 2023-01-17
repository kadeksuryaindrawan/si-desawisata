<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        
        return view('index');
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
