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
            'kuota' => 'required',
            'deskripsi' => 'required',

        ]);
        echo $validation['nama_jurusan'];
        echo "<br>";
        echo $validation['singkatan'];
        echo "<br>";
        echo $validation['deskripsi'];
        echo "<br>";
        $result = DB::table('jurusan')->insert([
            [
                'nama_jurusan' => $request->nama_jurusan,
                'singkatan' => $request->singkatan,
                'kuota' => $request->kuota,
                'deskripsi' => $request->deskripsi,

            ],
        ]);

        return redirect('/admin/jurusan')->with('sukses', 'Data berhasil diinput');
    }



    public function update(Request $request, $id){
        $validation = $request->validate([
            'nama_jurusan' => 'required|min:3',
            'singkatan' => 'required',
            'kuota' => 'required',
            'deskripsi' => 'required',

        ]);
        echo $validation['nama_jurusan'];
        echo "<br>";
        echo $validation['singkatan'];
        echo "<br>";
        echo $validation['deskripsi'];
        echo "<br>";
        $mhs = Jurusan::find($id);
        // dd($request->all());
        $mhs->update($request->all());
        return redirect('/admin/jurusan')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id){
        $mhs = DB::table('jurusan')->where('id',$id)->delete();
        if ($mhs){
            return redirect('/admin/jurusan')->with('sukses', 'Data berhasil dihapus');
        }else {
            return redirect('/admin/jurusan')->with('error', 'Data berhasil dihapus');
        }


    }
}
