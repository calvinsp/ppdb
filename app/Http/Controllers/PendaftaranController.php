<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendafataran;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{

    public function index()
    {

        $data['title'] = 'Formulir Biodata';
        return view('front.pendaftaran', $data);
    }


    public function insert(Request $request)
    {


        $validation = $request->validate([
            'nama' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'sekolah' => 'required',
            'tahun_lulus' => 'required',

        ]);

        $result = DB::table('pendaftar')->insert([
            [
                'id_user' => '1',
                'id_jurusan' => '1',
                'no_pendaftar' => '1',
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'sekolah' => $request->sekolah,
                'tahun_lulus' => $request->tahun_lulus,
                'status_seleksi' => 'Belum Dikonfirmasi',

            ],
        ]);
        // dd($request->all());
        return redirect('/user')->with('sukses', 'Data berhasil diinput');
    }
}
