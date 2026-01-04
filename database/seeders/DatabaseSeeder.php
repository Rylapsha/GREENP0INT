<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama'          => 'Dhini Can Tiek',
            'email'         => 'admin@gmail.com',
            'password'      => bcrypt('iyadeh123'),
            'hak_akses'     => 'Admin',
            'total_point'   => '0',
        ]);
        User::create([
            'nama'          => 'Remy Enduet',
            'email'         => 'Rey@gmail.com',
            'password'      => bcrypt('11111111'),
            'hak_akses'     => 'User',
            'total_point'   => '0',
        ]);
        User::create([
            'nama'          => 'Pri Kie Tiw',
            'email'         => 'admin1@gmail.com',
            'password'      => bcrypt('iyadeh123'),
            'hak_akses'     => 'Admin',
            'total_point'   => '0',
        ]);
        User::create([
            'nama'          => 'Mal ieng',
            'email'         => 'Mal@gmail.com',
            'password'      => bcrypt('11111111'),
            'hak_akses'     => 'User',
            'total_point'   => '0',
        ]);
    }
}
