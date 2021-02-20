<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\anggota;
use App\kk;

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
        $anggota = anggota::all();
        return view('admin.anggota.index',['anggota'=>$anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kk = kk::all();
        return view('admin.anggota.create',['kk'=>$kk]);
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
        $akk = new anggota();
        $akk->nik = $request->get('nik');
        $akk->nama = $request->get('nama');
        $akk->ttl = $request->get('ttl');
        $akk->jenis_kelamin = $request->get('jenis_kelemin');
        $akk->pendidikan = $request->get('pendidikan');
        $akk->agama = $request->get('agama');
        $akk->pekerjaan = $request->get('pekerjaan');
        $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
        $akk->status = $request->get('status');
        $akk->no_kk = $request->get('no_kk');
        $akk->save();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di simpan');
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
        $data = DB::table('anggota_kk')->where('nik','=',$id)->first();
        return view('admin.anggota.edit', ['data'=>$data]);
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
        $akk = anggota::where('nik','=',$id)->first();
        $akk->nik = $request->get('nik');
        $akk->nama = $request->get('nama');
        $akk->ttl = $request->get('ttl');
        $akk->jenis_kelamin = $request->get('jenis_kelemin');
        $akk->pendidikan = $request->get('pendidikan');
        $akk->agama = $request->get('agama');
        $akk->pekerjaan = $request->get('pekerjaan');
        $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
        $akk->status = $request->get('status');
        $akk->save();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di Edit');
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
        $anggota = anggota::where('nik','=',$id)->first();
        $anggota->delete();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di Hapus');
    }
}
