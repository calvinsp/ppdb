<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use Illuminate\Support\Facades\DB;

class PendaftarController extends Controller
{
    public function index()
    {
        $dft = Pendaftaran::all();
        $data['title'] = 'PPDB';

        return view('admin.ppdb', ["dft" => $dft], $data);
    }



    public function form()
    {
        $data['title'] = "Form Tambah Jurusan";
        return view('admin.form.jurusan', $data);
    }

    public function insert(Request $request)
    {

        $validation = $request->validate([
            'nama_jurusan' => 'required|min:3',
            'singkatan' => 'required',
            'deskripsi' => 'required',

        ]);

        DB::table('jurusan')->insert([
            [
                'nama_jurusan' => $request->nama_jurusan,
                'singkatan' => $request->singkatan,
                'deskripsi' => $request->deskripsi,

            ],
        ]);
        // dd($request->all());
        return redirect('/admin/jurusan')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {

        $mhs = Jurusan::find($id);
        return view('dashboard/form-edit', compact('mhs'));
    }

    public function update(Request $request, $id)
    {

        $mhs = Jurusan::find($id);
        // dd($request->all());
        $mhs->update($request->all());
        return redirect('/data-list')->with('suksesup', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $mhs = Jurusan::find($id);
        $mhs->delete();
        return back()->with('delete', 'Data Berhasil Dihapus');
    }
}
