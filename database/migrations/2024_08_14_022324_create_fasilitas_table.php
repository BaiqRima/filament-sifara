<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instansi')->nullable(); // Kolom id_instansi sebagai foreign key
            $table->string('nama_fasilitas');
            $table->string('deskripsi_fasilitas');
            $table->string('kondisi');
            $table->string('jenis');
            $table->string('foto')->nullable();
            $table->timestamps();

            // Tambahkan foreign key yang mengacu pada kolom id_instansi di tabel instansis
            $table->foreign('id_instansi')->references('id')->on('instansis')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->dropForeign(['id_instansi']); // Hapus foreign key
        });

        Schema::dropIfExists('fasilitas');
    }
};