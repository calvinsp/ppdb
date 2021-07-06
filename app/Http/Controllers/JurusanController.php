<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index(){

    }
     
    public function data(){
        $jrs = Jurusan::all();
        $data['title'] = 'PROJECT UAS';

        return view('admin.jurusan',["jrs"=>$jrs], $data);
    }

    public function form(){
        $data['title'] = "Form Tambah Jurusan";
        return view('admin.form.jurusan', $data);
    }

    public function insert(Request $request){

        $validation = $request->validate([
            'nama_jurusan' => 'required|min:3',
            'singkatan' => 'required',
            'deskripsi' => 'required',

        ]);

        DB::table('jurusan')->insert([
            [
                'nama_jurusan' => $request->nama,
                'singkatan' => $request->singkatan,
                'deskripsi' => $request->deskripsi,

            ], 
        ]);
        dd($request->all());
        // return redirect('/admin.jurusan')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id){

        $mhs = Mahasiswa::find($id);
        return view('dashboard/form-edit', compact('mhs'));
    }

    public function update(Request $request, $id){

        $mhs = Mahasiswa::find($id);
        // dd($request->all());
        $mhs->update($request->all());
        return redirect('/data-list')->with('suksesup', 'Data Berhasil Diupdate');
    }

    public function destroy($id){
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return back()->with('delete', 'Data Berhasil Dihapus');

    }
}
