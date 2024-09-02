<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_instansi', // Tambahkan kolom id_instansi ke sini
        'nama_fasilitas',
        'deskripsi_fasilitas',
        'kondisi',
        'jenis',
        'foto',
    ];

    /**
     * Define the relationship with the Instansi model.
     */
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi', 'id_instansi');
    }
}


