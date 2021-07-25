<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{

    protected $table = "jurusan";
    protected $fillable = ['id','nama_jurusan', 'singkatan','kuota','diterima', 'deskripsi'];

    public function pendaftaran()
    {
        return $this->hasMany('App\Pendaftaran', 'id_jurusan', 'id');
    }
}
