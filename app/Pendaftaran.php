<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = "pendaftar";
    protected $fillable = [
        'id', 'id_user', 'id_jurusan', 'no_pendaftar', 'status_seleksi', 'nama', 'tempat_lahir',
        'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'sekolah', 'tahun_lulus'
    ];
}
