<?php

namespace App\Http\Controllers;
use App\Barang;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchbarang(Request $request)
    {
        $cari = $request -> input ('q');

        $barang = Barang::where('namaBrg', 'LIKE', "%$cari%")->get();

        if($barang -> isEMpty())
        {
            return response() -> json([
                'success' => false,
                'data' => 'Data Tidak Ditemukan'
            ], 200)->header('Access-Control-Allow-Origin', "http://127.0.0.1:5500");
        }
        else
        {
            return response() -> json([
                'success' => true,
                'data' => $barang
            ], 200)->header('Access-Control-Allow-Origin', "http://127.0.0.1:5500");
        }
    }
}