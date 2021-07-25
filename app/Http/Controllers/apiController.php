<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pendaftaran;

class apiController extends Controller
{


    public function index(Request $request)
    { {
            $result = DB::table('pendaftar')->where([['status_seleksi', 'Diterima'], ['nama', 'LIKE', '%' . $request->input('q') . '%']])->get();
            return  response(
                $result,
                200
            );
        }
    }

    public function jurusan()
    { {
            $result = DB::table('jurusan')->get();
            return  response(
                $result,
                200
            );
        }
    }
    public function profile($id)
    { {
            return Pendaftaran::find($id);
        }
    }
    public function ubah(Request $request, $id)
    { {
            $siswa = Pendaftaran::find($id);
            $siswa->nama = $request->nama;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->agama = $request->agama;
            $siswa->alamat = $request->alamat;
            $siswa->sekolah = $request->sekolah;
            $siswa->tahun_lulus = $request->tahun_lulus;
            $siswa->save();
        }
    }
}
