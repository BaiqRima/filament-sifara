<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdInstansiToFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_instansi')->nullable()->after('id');

            // Tambahkan foreign key jika tabel `instansis` ada
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
            $table->dropColumn('id_instansi'); // Hapus kolom
        });
    }
}
