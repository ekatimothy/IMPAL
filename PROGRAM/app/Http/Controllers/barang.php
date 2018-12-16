<?php

namespace App\Http\Controllers;
use App\Model\M_barang;
use App\Model\M_request;

use Illuminate\Http\Request;

class barang extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("barang");
    }

    public function index(){
        $id = M_barang::all();
        $id2 = M_request::all();
        return view('barang.homebarang',['ids'=>$id,'idx'=>$id2]);
    }

    public function forminput(Request $request){
        return view('barang.buatbarang');
    } 

    public function input(Request $request){
        $data = new M_barang;
        $data->jumlah=$request->jumlah;                                    
        $data->nm_barang=$request->nama;
        $data->kode_barang=$request->kode;
        $data->save();
        return redirect('/barang')->with('status','Data Anda Berhasil Ditambahkan!');   
    }

    public function formedit($kode_barang){
        // dd($kode_barang);
        $data = M_barang::find($kode_barang);
        // dd($data->jumlah);
        return view('barang.editbarang',['data'=>$data]);
    }

    public function update(Request $request){
        $data = M_barang::find($request->kode);
        // dd($request->kode);
        $data->jumlah=$request->jumlah;
        $data->nm_barang=$request->nama;
        $data->kode_barang=$request->kode;
        $data->save(); 
        return redirect('/barang')->with('status','Data Anda Berhasil Diupdate!');
    }

    public function delete($kode_barang){
        // dd('hai');
        $data = M_barang::find($kode_barang);
        $data->delete(); 
        return redirect('/barang')->with('status','Data Anda Berhasil Dihapus!');
    }

    public function acceptBarang($kode_barang){
        $dataRequest = M_request::where('kode_barang',$kode_barang)->first();
        $data = M_barang::find($kode_barang);
        $data->jumlah = $data->jumlah - $dataRequest->jumlah;
        $data->save();
        #$history = new M_history;
        #$history->nama = $dataRequest->nama;
        $dataRequest->delete();
        return redirect('/barang')->with('status','data berhasil dikonfirmasi');
    }

    public function rejectBarang($kode_barang){
        $data = M_request::find($kode_barang);
        $data->delete(); 
        return redirect('/barang')->with('status','Data Anda Berhasil Ditolak!');
    }

    
    
}
