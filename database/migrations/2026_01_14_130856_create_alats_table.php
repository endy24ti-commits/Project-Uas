<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('kategori');
            $table->enum('status', ['Tersedia', 'Dipinjam']);
            $table->integer('waktu_sewa'); // dalam hari
            $table->integer('harga_sewa'); // dalam rupiah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alats');
    }
};
