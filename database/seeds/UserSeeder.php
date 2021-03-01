<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kk')->insert([
            'no_kk'=> "admin"
        ]);

        DB::table('anggota_kk')->insert([
            'nama'=> "Admin",
            'no_kk'=> "admin",
            'nik'=> "supeAdmin",
            'tempat_lahir'=> "Madiun",
            'tanggal_lahir'=> date('Y-m-d'),
            'jenis_kelamin'=> "Laki-laki",
            'pendidikan'=> "Sarjana",
            'agama'=> "Islam",
            'pekerjaan'=> "RT",
            'alamat'=>"Madiun",
            'nama_ibu_bapak'=> "Ibu/Bapak",
            'status'=> "Kawin",
            'status_kk'=> "Bapak/Kepala Keluarga"
        ]);

        DB::table('users')->insert([
            'nama'=> "Admin",
            'nik'=> 'supeAdmin',
            'password'=> Hash::make('superAdmin123'),
            'role'=> "admin"
        ]);

        DB::table('saldo')->insert([
            'tanggal_saldo'=> date('Y-m-d'),
            'kas'=> 0
        ]);
    }
}
