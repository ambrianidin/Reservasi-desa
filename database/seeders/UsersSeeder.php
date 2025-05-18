<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData= [
            [
                'email'=> 'admin@desa.id',
                'password'=>bcrypt('12345678'),
                'level'=> 'admin',
                'aktif'=> 1,
            ],
            [
                'email'=> 'bendahara@desa.id',
                'password'=>bcrypt('12345678'),
                'level'=> 'bendahara',
                'aktif'=> 1,
            ],
            [
                'email'=> 'pemilik@desa.id',
                'password'=>bcrypt('12345678'),
                'level'=> 'pemilik',
                'aktif'=> 1,
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
