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
            'nik'=> "superAdmin",
            'tempat_lahir'=> "",
            'tanggal_lahir'=> "2021-01-01",
            'jenis_kelamin'=> "",
            'pendidikan'=> "",
            'agama'=> "",
            'pekerjaan'=> "",
            'alamat'=>"",
            'nama_ibu_bapak'=> "",
            'status'=> "",
            'status_kk'=> ""
        ]);

        DB::table('users')->insert([
            'nama'=> "Admin",
            'nik'=> 'superAdmin',
            'password'=> Hash::make('superAdmin123'),
            'role'=> "admin"
        ]);
    }
}
