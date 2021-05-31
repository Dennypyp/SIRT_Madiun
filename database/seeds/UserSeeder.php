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
        DB::table('kk')->insert(
            ['no_kk'=> "admin",
            'tanggal_masuk'=> date('Y-m-d')]
        );

        DB::table('anggota_kk')->insert(
            ['nama'=> "Admin",
            'no_kk'=> "admin",
            'nik'=> "superAdmin",
            'tempat_lahir'=> "Madiun",
            'tanggal_lahir'=> date('Y-m-d'),
            'jenis_kelamin'=> "Laki-laki",
            'pendidikan'=> "Sarjana",
            'agama'=> "Islam",
            'pekerjaan'=> "RT",
            'alamat'=>"Madiun",
            'nama_ibu_bapak'=> "Ibu/Bapak",
            'status'=> "Kawin",
            'status_kk'=> "Bapak/Kepala Keluarga",
            'keterangan_warga'=> "admin",
            'tanggal_ket'=> date('Y-m-d'),
            'keterangan'=> "-"]
        );

        DB::table('users')->insert(
            ['nama'=> "Admin",
            'nik'=> 'superAdmin',
            'password'=> Hash::make('superAdmin123'),
            'role'=> "admin"]
        );

        DB::table('kk')->insert(
            ['no_kk'=> "bendahara",
            'tanggal_masuk'=> date('Y-m-d')]
        );

        DB::table('anggota_kk')->insert(
            ['nama'=> "Bendahara",
            'no_kk'=> "bendahara",
            'nik'=> "BendaharaRT",
            'tempat_lahir'=> "Madiun",
            'tanggal_lahir'=> date('Y-m-d'),
            'jenis_kelamin'=> "Laki-laki",
            'pendidikan'=> "Sarjana",
            'agama'=> "Islam",
            'pekerjaan'=> "RT",
            'alamat'=>"Madiun",
            'nama_ibu_bapak'=> "Ibu/Bapak",
            'status'=> "Kawin",
            'status_kk'=> "Bapak/Kepala Keluarga",
            'keterangan_warga'=> "admin",
            'tanggal_ket'=> date('Y-m-d'),
            'keterangan'=> "-"]
        );

        DB::table('users')->insert(
            ['nama'=> "Bendahara",
            'nik'=> 'BendaharaRT',
            'password'=> Hash::make('bendahara03RT'),
            'role'=> "bendahara"]
        );

    }
}
