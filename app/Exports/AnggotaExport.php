<?php

namespace App\Exports;

use App\anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $anggota = DB::table('anggota_kk')
            ->select('nik','nama','no_kk','tempat_lahir','tanggal_lahir','jenis_kelamin','pendidikan','agama','pekerjaan','alamat','nama_ibu_bapak')
            ->where('no_kk', '!=', 'admin')
            ->orderBy('no_kk')
            ->get();
        return $anggota;
    }

    public function headings(): array
    {
        return[
            'NIK',
            'Nama',
            'No. KK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Pendidikan',
            'Agama',
            'Pekerjaan',
            'Alamat',
            'Nama Ibu/Bapak',
        ];
    }
}
