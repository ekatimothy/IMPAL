<?php

namespace App\Http\Controllers;

use App\Model\M_barang;
use App\Model\M_request;
use App\User;

use Illuminate\Http\Request;

class manajer extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("manajer");
    }

    public function index(){
        $id = M_barang::all();
        $id2 = M_request::all();
        return view('manajer.homemanajer',['ids'=>$id,'idx'=>$id2]);
    }

    // public function forminput(Request $request){
    //     return view('barang.buatbarang');
    // } 

    public function register(Request $request){
        $data = new User;
            $data->name=$request->name;                                    
            $data->email=$request->email;
            $data->role=$request->role;
            $data->password=Hash::make($request->password);
            $data->save();
            return redirect('/manajer')->with('status','Data Anda Berhasil Ditambahkan!');   
    }

    public function formpegawai(Request $request){
        dd($request);
        return view('manajer.regist');
    } 

    // public function formedit($kode_barang){
    //     // dd($kode_barang);
    //     $data = M_barang::find($kode_barang);
    //     // dd($data->jumlah);
    //     return view('barang.editbarang',['data'=>$data]);
    // }

    // public function update(Request $request){
    //     $data = M_barang::find($request->kode);
    //     // dd($request->kode);
    //     $data->jumlah=$request->jumlah;
    //     $data->nm_barang=$request->nama;
    //     $data->kode_barang=$request->kode;
    //     $data->save(); 
    //     return redirect('/barang')->with('status','Data Anda Berhasil Diupdate!');
    // }

    // public function delete($kode_barang){
    //     $data = M_barang::find($kode_barang);
    //     $data->delete(); 
    //     return redirect('/barang')->with('status','Data Anda Berhasil Dihapus!');
    // }
    
    
}
