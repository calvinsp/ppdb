<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use Illuminate\Support\Facades\DB;

class PendaftarController extends Controller
{
    public function index()
    {
        $dft = DB::table('pendaftar')
        ->join('jurusan', 'jurusan.id', '=', 'pendaftar.id_jurusan')
        ->get();
        $data['title'] = 'PPDB';

        return view('admin.ppdb', ["dft" => $dft], $data);
    }


    public function update(Request $request, $id){
        $validation = $request->validate([
            'status_seleksi' => 'required',

        ]);
        $mhs = Pendaftaran::find($id);
        $mhs->update($request->all());

        $status = $request->status_seleksi;
        $status1 = $request->status_seleksi1;
        $namajrs = $request->nama_jurusan;
        $ditrima = DB::table('jurusan')->select('diterima')->where('nama_jurusan',$namajrs)->first();
        $array = $ditrima->diterima;
        //  echo $array+1;
        if($status =='Diterima'){
            $hasil = $array + 1;
            DB::table('jurusan')->where('nama_jurusan',$namajrs)->update([
                'diterima'=>$hasil
            ]);
            return redirect('/admin/pendaftar')->with('sukses', 'Data berhasil diupdate');
        }elseif($status1 =='Diterima' && $status !='Diterima'){
            $hasil = $array - 1;
            DB::table('jurusan')->where('nama_jurusan',$namajrs)->update([
                'diterima'=>$hasil
            ]);
        return redirect('/admin/pendaftar')->with('sukses', 'Data berhasil diupdate');
        }
    }


}
