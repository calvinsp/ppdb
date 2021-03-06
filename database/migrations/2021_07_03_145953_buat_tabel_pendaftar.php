<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')->reference('id')->on('users');
            $table->foreignId('id_jurusan')->reference('id')->on('jurusan');
            $table->integer('no_pendaftar');
            $table->string('status_seleksi');
            $table->string('nama', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama', 15);
            $table->string('alamat', 200);
            $table->string('sekolah', 75)->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar');
    }
}
