<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Food;

class FoodController extends Controller
{
    public function index()
    {
        $data = Food::get();
        return view('home',['data'=>$data]);
    }

    public function transaksi()
    {
        $data = Food::get();
        return view('transaksi',['data'=>$data]);
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);

        // echo $request->file('image');
        // echo $request->nama;
        // echo $request->harga;
        // exit();
    	$nama = $request->nama;
    	$harga = $request->harga;
        $foto = $request->file('image');
        $nama_foto = $foto->getClientOriginalName();

        $upload = $foto->move('foto', $nama_foto);
        if ($upload) {
            $data = array(
                'nama'=>$nama,
                'harga'=>$harga,
                'foto'=>$nama_foto
            );

            $ins = Food::insert($data);

            if ($ins) {
                echo "<script type='text/javascript'>alert('Data Ditmabahkan'); window.location.href = '/'; </script>";
            }else{
                echo "<script type='text/javascript'>alert('Data Gagal Ditmabahkan');</script>";
            }   
        }
    }
}
