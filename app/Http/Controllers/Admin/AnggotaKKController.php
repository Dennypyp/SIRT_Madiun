<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\anggota;
use App\kk;
use App\Exports\AnggotaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AnggotaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $anggota = DB::table('anggota_kk')

            ->where('keterangan_warga', '!=', 'Sudah Pindah')
            ->where('keterangan_warga', '!=', 'Meninggal')
            ->where('keterangan_warga', '!=', 'Admin')

            ->where('no_kk', '!=', 'bendahara')

            ->orderBy('no_kk')
            ->get();
        return view('admin.anggota.index', ['anggota' => $anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $kk = DB::table('kk')
            ->where('no_kk', '!=', 'admin')
            ->where('no_kk', '!=', 'bendahara')
            ->get();
        return view('admin.anggota.create', ['kk' => $kk]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(request()->all(), [
            'nik' => ['required', 'min:16', 'int'],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelemin' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nama_ibu_bapak' => 'required',
            'status' => 'required',
            'status_kk' => 'required',
            'keterangan_warga' => 'required',
            'tanggal_ket' => 'required',
            'no_kk' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $akk = new anggota();
            $akk->nik = $request->get('nik');
            $akk->nama = $request->get('nama');
            $akk->tempat_lahir = $request->get('tempat_lahir');
            $akk->tanggal_lahir = $request->get('tanggal_lahir');
            $akk->jenis_kelamin = $request->get('jenis_kelemin');
            $akk->pendidikan = $request->get('pendidikan');
            $akk->agama = $request->get('agama');
            $akk->pekerjaan = $request->get('pekerjaan');
            $akk->alamat = $request->get('alamat');
            $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
            $akk->status = $request->get('status');
            $akk->status_kk = $request->get('status_kk');
            $akk->keterangan_warga = $request->get('keterangan_warga');
            $akk->tanggal_ket = $request->get('tanggal_ket');
            $akk->keterangan = $request->get('keterangan');
            $akk->no_kk = $request->get('no_kk');
            $akk->save();
            return redirect('anggota')->with('msg', 'Data Warga Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DB::table('anggota_kk')->where('nik', '=', $id)->first();
        // dd($data);
        return view('admin.anggota.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make(request()->all(), [
            'nik' => ['required', 'min:16', 'int'],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelemin' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nama_ibu_bapak' => 'required',
            'status' => 'required',
            'status_kk' => 'required',
            'keterangan_warga' => 'required',
            'tanggal_ket' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $akk = anggota::where('nik', '=', $id)->first();
            $akk->nik = $request->get('nik');
            $akk->nama = $request->get('nama');
            $akk->tempat_lahir = $request->get('tempat_lahir');
            $akk->tanggal_lahir = $request->get('tanggal_lahir');
            $akk->jenis_kelamin = $request->get('jenis_kelemin');
            $akk->pendidikan = $request->get('pendidikan');
            $akk->agama = $request->get('agama');
            $akk->pekerjaan = $request->get('pekerjaan');
            $akk->alamat = $request->get('alamat');
            $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
            $akk->status = $request->get('status');
            $akk->status_kk = $request->get('status_kk');
            $akk->keterangan_warga = $request->get('keterangan_warga');
            $akk->tanggal_ket = $request->get('tanggal_ket');
            $akk->keterangan = $request->get('keterangan');
            $akk->save();
            return redirect('anggota')->with('msg', 'Data Warga Berhasil Diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $anggota = anggota::where('nik', '=', $id)->first();
        $anggota->delete();
        return redirect('anggota')->with('msg', 'Data Warga Berhasil Dihapus');
    }

    public function detail($id)
    {
        //
        $data = DB::table('anggota_kk')->where('nik', '=', $id)->first();
        // dd($data);
        return view('admin.anggota.detail', ['data' => $data]);
    }

    public function laporan()
	{
		return Excel::download(new AnggotaExport, 'warga.xlsx');
	}

    public function laporan_warga()
    {
        $anggota = DB::table('anggota_kk')
            ->where('keterangan_warga', '!=', 'Sudah Pindah')
            ->where('keterangan_warga', '!=', 'Meninggal')
            ->where('keterangan_warga', '!=', 'Admin')
            ->orderBy('no_kk')
            ->get();
        $pdf = PDF::loadview("admin/anggota/cetak", ['anggota' => $anggota])
        ->setPaper('a4','landscape');
        return $pdf->download("data-warga-".date('Y-m-d_H-i-s').".pdf");
    }
}
