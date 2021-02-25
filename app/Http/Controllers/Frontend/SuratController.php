<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\anggota;
<<<<<<< Updated upstream
use App\kk;
=======
use App\Surat;
use App\kk;
use Illuminate\Support\Facades\Auth;
>>>>>>> Stashed changes

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
<<<<<<< Updated upstream
        $anggota = anggota::all();
        return view('frontend.surat.create',['anggota'=>$anggota]);
=======
        $surat = Surat::where("nik", Auth::user()->nik)->get();
        return view('frontend.surat.index',['surat'=>$surat]);
>>>>>>> Stashed changes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
<<<<<<< Updated upstream
        $kk = kk::all();
        return view('admin.anggota.create',['kk'=>$kk]);
=======
        $anggota = anggota::where("nik","=", Auth::user()->nik)->first();
        return view('frontend.surat.create',['anggota'=>$anggota]);
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $akk = new anggota();
        $akk->nik = $request->get('nik');
        $akk->nama = $request->get('nama');
        $akk->tempat_lahir = $request->get('tempat_lahir');
        $akk->tanggal_lahir = $request->get('tanggal_lahir');
        $akk->jenis_kelamin = $request->get('jenis_kelemin');
        $akk->pendidikan = $request->get('pendidikan');
        $akk->agama = $request->get('agama');
        $akk->pekerjaan = $request->get('pekerjaan');
        $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
        $akk->status = $request->get('status');
        $akk->status_kk = $request->get('status_kk');
        $akk->no_kk = $request->get('no_kk');
        $akk->role = 'warga';
        $akk->save();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di simpan');
=======
        $suratp = new surat();
        $suratp->nik = $request->get('nik');
        $suratp->keperluan = $request->get('keperluan');
        $suratp->save();
        return redirect('surat')->with('msg','Surat Pengantar Berhasil di simpan');
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $data = DB::table('anggota_kk')->where('nik','=',$id)->first();
        // dd($data);
        return view('admin.anggota.edit', ['data'=>$data]);
=======
       
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $akk = anggota::where('nik','=',$id)->first();
        $akk->nik = $request->get('nik');
        $akk->nama = $request->get('nama');
        $akk->tempat_lahir = $request->get('tempat_lahir');
        $akk->tanggal_lahir = $request->get('tanggal_lahir');
        $akk->jenis_kelamin = $request->get('jenis_kelemin');
        $akk->pendidikan = $request->get('pendidikan');
        $akk->agama = $request->get('agama');
        $akk->pekerjaan = $request->get('pekerjaan');
        $akk->nama_ibu_bapak = $request->get('nama_ibu_bapak');
        $akk->status = $request->get('status');
        $akk->status_kk = $request->get('status_kk');
        $akk->role = 'warga';
        $akk->save();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di Edit');
=======
      
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $anggota = anggota::where('nik','=',$id)->first();
        $anggota->delete();
        return redirect('anggota')->with('msg','Anggota KK Berhasil di Hapus');
=======
        
>>>>>>> Stashed changes
    }
}
