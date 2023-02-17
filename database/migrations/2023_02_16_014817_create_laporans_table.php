<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('no_laporan')->unique();
            $table->string('nik');
            $table->string('nama');
            $table->string('persetujuan_1');
            $table->string('persetujuan_2');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status');
            $table->foreignId('kendaraan_id')->constrained('kendaraans');
            $table->foreignId('user_id_1')->constrained('users');
            $table->foreignId('user_id_2')->constrained('users');
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
        Schema::dropIfExists('laporans');
    }
};
