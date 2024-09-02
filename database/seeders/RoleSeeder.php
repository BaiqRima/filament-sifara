<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah peran sudah ada, jika belum, buat peran baru
        if (!Role::where('name', 'user')->where('guard_name', 'web')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }

        if (!Role::where('name', 'admin')->where('guard_name', 'web')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }
    }
}
