<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{

    protected $table = "jurusan";
    protected $fillable = ['id','nama_jurusan', 'singkatan', 'deskripsi'];

    // public function pendaftar(){
    //     return $this->hasMany('App\Pendaftar', 'id_jurusan', 'id');
    // }
}
