<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data user admin
        $userData = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang ingin Anda gunakan
            'role' => 'admin',
            'status' => 'aktif',
        ];

        // Masukkan data user admin ke dalam tabel 'users'
        DB::table('users')->insert($userData);
    }
}
