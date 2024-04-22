<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Desa Wisata',
            'password' => bcrypt('admin123'),
            'email' => 'admin@gmail.com'
        ]);
        $admin->assignRole('Admin');

        $pemilik = User::create([
            'name' => 'Pengelola Desa Wisata',
            'password' => bcrypt('pengelola123'),
            'email' => 'pengelola@gmail.com'
        ]);
        $pemilik->assignRole('Pengelola');
    }
}
