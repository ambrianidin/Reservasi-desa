<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            [
                'email'=> 'admin@desa.id',
                'password'=> bcrypt('12345678'),
                'level'=> 'admin',
                'aktif'=> 1,
                'nama_karyawan' => 'Admin Desa',
                'alamat' => 'Bandung',
                'no_hp' => '08123456789',
                'jabatan' => 'admin',
            ],
            [
                'email'=> 'bendahara@desa.id',
                'password'=> bcrypt('12345678'),
                'level'=> 'bendahara',
                'aktif'=> 1,
                'nama_karyawan' => 'Bendahara Desa',
                'alamat' => 'Jakarta',
                'no_hp' => '08123456788',
                'jabatan' => 'bendahara',
            ],
            [
                'email'=> 'pemilik@desa.id',
                'password'=> bcrypt('12345678'),
                'level'=> 'pemilik',
                'aktif'=> 1,
                'nama_karyawan' => 'Pemilik Desa',
                'alamat' => 'Surabaya',
                'no_hp' => '08123456787',
                'jabatan' => 'pemilik',
            ],
        ];

        foreach ($userData as $val) {

            $user = User::create([
                'email' => $val['email'],
                'password' => $val['password'],
                'level' => $val['level'],
                'aktif' => $val['aktif'],
            ]);

            Karyawan::create([
                'nama_karyawan' => $val['nama_karyawan'],
                'alamat' => $val['alamat'],
                'no_hp' => $val['no_hp'],
                'jabatan' => $val['jabatan'],
                'status' => 'aktif',
                'id_user' => $user->id,
            ]);
        }
    }
}