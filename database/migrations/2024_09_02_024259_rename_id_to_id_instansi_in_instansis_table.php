<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIdToIdInstansiInInstansisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('instansis', function (Blueprint $table) {
            // Ganti nama kolom `id` menjadi `id_instansi`
            $table->renameColumn('id', 'id_instansi');
        });

        // Jika Anda memiliki foreign key yang mengacu pada kolom `id` di tabel lain, Anda mungkin perlu memperbarui foreign key tersebut juga.
        Schema::table('fasilitas', function (Blueprint $table) {
            // Update foreign key constraint
            $table->dropForeign(['id_instansi']);
            $table->foreign('id_instansi')->references('id_instansi')->on('instansis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instansis', function (Blueprint $table) {
            // Kembalikan nama kolom ke `id`
            $table->renameColumn('id_instansi', 'id');
        });

        Schema::table('fasilitas', function (Blueprint $table) {
            // Kembalikan foreign key constraint
            $table->dropForeign(['id_instansi']);
            $table->foreign('id')->references('id')->on('instansis')->onDelete('cascade');
        });
    }
}
