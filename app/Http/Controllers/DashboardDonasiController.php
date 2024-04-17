<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardDonasiController extends Controller
{
    public function successform()
    {
        return view('donasi.formsuccess'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_barang'=> 'required',
            'nama_barang'=> 'required',
            'kategori_barang'=> 'required',
            'detail_barang'=> 'required'
        ]);

        $user_id = Auth::id();
        $donasisubmission = Donasi::create([
            'user_id'=> $user_id,
            'jumlah_donasi'=> $request->input('jumlah_donasi'),
            'nama_barang'=> $request->input('nama_barang'),
            'kategori_barang'=> $request->input('kategori_barang'),
            'detail_barang'=> $request->input('detail_barang')

        ]);

        return redirect ('/dashboard/donasi/formsuccess');
        
    }

    public function donasinow()
    {
        return view('donasi.detaildonasi');
    }
}