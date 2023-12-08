<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Showroom;

class ShowroomController extends Controller
{

    public function index()
    {

        $showroom = \App\Models\showroom_mobil::all();

        return view('showroom.index', compact('showroom'));
    }

    public function create()
    {
        return view('showroom.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'warna' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
        ]);

        $data = $request->all();

        Showroom::create([
            'nama_mobil'=>$data['name'],
            'brand_mobil'=>$data['brand'],
            'warna_mobil'=>$data['warna'],
            'tipe_mobil'=>$data['tipe'],
            'harga-mobil'=>$data['harga'],
        ]);

        return redirect()->route('showroom.index');
    }

}

