<?php

namespace App\Http\Controllers;
use App\Produk;
use Illuminate\Http\Request;


class APIController extends Controller
{
    public function searchproduk(Request $request)
    {
        $cari = $request->input('q');

       $produk = Produk::where('nama', 'LIKE',"%$cari%")->get();

        if($produk->isEmpty())
        {
            return response()->json([
                                    'succes'=>false,
                                    'data'=>'Data Tidak Ditemukan'
                                    ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5502');
        }
        else
        {
            return response()->json([
                'succes'=>true,
                'data'=>$produk
                ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5502');
        }
    }
}
