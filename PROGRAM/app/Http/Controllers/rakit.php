<?php

namespace App\Http\Controllers;
use App\Model\M_barang;
use App\Model\M_request;

use Illuminate\Http\Request;

class rakit extends Controller
{
    // public function __construct(){
    //     $this->middleware("auth");
    //     $this->middleware("rakit");
    // }

    public function index(){
        $id = M_request::all();
        return view('rakit.homerakit',['ids'=>$id]);
    }

    public function forminput(Request $request){
        return view('rakit.buatrakit');
    }

    public function input(Request $request){
        $data = new M_request;
            $data->jumlah=$request->jumlah;                                    
            $data->nm_barang=$request->nama;
            $data->kode_barang=$request->kode;
            $data->save();
            return redirect('/rakit')->with('status','Data Anda Berhasil Ditambahkan!');   
    }

    public function formedit($kode_barang){
        // dd($kode_barang);
        $data = M_request::find($kode_barang);
        // dd($data);
        // dd($data->jumlah);
        return view('rakit.editrakit',['data'=>$data]);
    }

    public function update(Request $request){
        $data = M_request::find($request->kode);
        // dd($request->kode);
        $data->jumlah=$request->jumlah;
        $data->nm_barang=$request->nama;
        $data->kode_barang=$request->kode;
        $data->save(); 
        return redirect('/rakit')->with('status','Data Anda Berhasil Diupdate!');
    }

    public function delete($kode_barang){
        $data = M_request::find($kode_barang);
        $data->delete();
        return redirect('/rakit')->with('status','Data Anda Berhasil Dihapus!');
    }
    
    
}
