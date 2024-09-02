<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $primaryKey = 'id_instansi'; // Pastikan primary key sesuai dengan kolom yang baru
    public $incrementing = false; // Jika id_instansi bukan auto increment
    protected $keyType = 'string'; // Atur tipe key jika bukan integer
}

