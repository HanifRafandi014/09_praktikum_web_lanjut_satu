<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('mahasiswa')->insert([
            'nim'=> '2141720127',
            'nama' => 'Hanif Naufal Rafandi',
            'jurusan' => 'Teknologi Informasi',
            'no_handphone' => '081235485829',
            'email' => 'rafandinaufal03@gmail.com',
            'tanggal_lahir' => '28-Januari-2003',
            'kelas_id' => '1'
        ]);

        DB::table('mahasiswa')->insert([
            'nim'=> '2141720020',
            'nama' => 'Alivia Retnaning Tyas',
            'jurusan' => 'Teknologi Informasi',
            'no_handphone' => '08510284751',
            'email' => 'alipia81@gmail.com',
            'tanggal_lahir' => '17-Agustus-2002',
            'kelas_id' => '2'
        ]);

        DB::table('mahasiswa')->insert([
            'nim'=> '2141720135',
            'nama' => 'Rafifa Nayla',
            'jurusan' => 'Sistem Informasi Bisnis',
            'no_handphone' => '081286140219',
            'email' => 'rafifacans72@gmail.com',
            'tanggal_lahir' => '25-Agustus-2003',
            'kelas_id' => '3'
        ]);
    }
}
