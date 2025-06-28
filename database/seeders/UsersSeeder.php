<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use DB;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
{
    // Matikan sementara foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Hapus data user (meskipun masih terhubung ke tabel lain)
    DB::table('users')->truncate();

    // Aktifkan kembali foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Tambahkan user baru
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('12345678'),
        'isAdmin' => 1,
    ]);

    User::create([
        'name' => 'member',
        'email' => 'member@gmail.com',
        'password' => bcrypt('rahasia'),
        'isAdmin' => 0,
    ]);
}

}
