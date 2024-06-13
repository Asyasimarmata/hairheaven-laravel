<?php

namespace App\Http\Controllers;
use App\Produk;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view("home", ["key" => "home"]);
    }

    public function about(){
        return view("about", ["key" => "about"]);
    }

    public function produk(){
        $produk = Produk::orderBy('id', 'desc')->get();
        return view("produk", ["key" => "produk", "pr" => $produk]);
    }

    public function addproduk(){
        return view("formadd", ["key"  => "produk"]);
    }

    public function saveproduk(Request $r){
       $file_name = time().'-'.$r->file('gambar')->getClientOriginalName(); 
       $path = $r->file('gambar')->storeAs('poster', $file_name, 'public'); 

       Produk::create([ 
           'nama'      =>$r->nama, 
           'deskripsi' =>$r->deskripsi, 
           'harga'     =>$r->harga,
           'kategori'  =>$r->kategori,
           'gambar'    =>$path 
       ]);
       return redirect("/produk")->with('alert','Data Berhasil di Simpan'); 
    }
    public function editproduk($id){
        $r = produk::find($id);
        return view("formedit",["key" => "produk", "p" => $r]);
    }
    public function updateproduk($id, Request $request){
        $p = produk::find($id);
        $p->nama = $request->nama;
        $p->deskripsi = $request->deskripsi;
        $p->kategori = $request->kategori;
        $p->harga = $request->harga;

        if($request->poster){
            if($p->poster){
                Storage::disk('public')->delete($p->poster);
            }

            $file_name = time().'-'.$request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public'); 
            $p->poster= $path;  
        }
        $p->save();
        return redirect("/produk")->with('alert', 'Data Berhasil Diubah');
    }
    public function deleteproduk($id){
        $p = produk::find($id);
        if($p->poster){
            Storage::disk('public')->delete($p->poster);
        }
        $p->delete();
        return redirect("/produk")->with('alert', 'Data Berhasil Di Hapus');
    }
    public function login(){
        return view("login");
    }
    public function edituser(){
        return view("edituser", ["key"=>""]);
    }
    
    public function updateuser(Request $request){
        $user = Auth::user();
        if (Hash::check($request->password_lama, $user->password)) {
            if ($request->password_baru == $request->konfirmasi_baru) {
                $user->password = bcrypt($request->password_baru);
                $user->save();
                return redirect("/user")->with('info', 'Password Berhasil di Ubah');
            } else {
                return redirect("/user")->with('info', 'Password Baru dan Konfirmasi Password Tidak Cocok');
            }
        } else {
            return redirect("/user")->with('info', 'Password Lama Salah');
        }
    }
    

    public function faq(){
        return view("faq", ["key" => "faq"]);
    }
}
