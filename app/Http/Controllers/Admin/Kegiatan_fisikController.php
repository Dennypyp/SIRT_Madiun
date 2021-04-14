<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan_fisik;
use App\anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class Kegiatan_fisikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kegiatan_fisik = DB::table('kegiatan_fisik')
        ->select('anggota_kk.nik','anggota_kk.nama','anggota_kk.alamat','kegiatan_fisik.kegiatan','kegiatan_fisik.volume','kegiatan_fisik.satuan','kegiatan_fisik.lokasi','kegiatan_fisik.statusk','kegiatan_fisik.dana','kegiatan_fisik.keterangan','kegiatan_fisik.status_kegiatan','kegiatan_fisik.id')
        ->join('anggota_kk','anggota_kk.nik','=','kegiatan_fisik.nik')
        ->get();
        return view('admin.kegiatan_fisik.index',['kegiatan_fisik'=>$kegiatan_fisik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anggota = anggota::where("nik","=", Auth::user()->nik)->first();
        return view('admin.kegiatan_fisik.create',['anggota'=>$anggota]);
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
        $kegiatan_fisikk= new Kegiatan_fisik();
        $kegiatan_fisikk->nik = $request->get('nik');
        $kegiatan_fisikk->kegiatan = $request->get('kegiatan');
        $kegiatan_fisikk->volume = $request->get('volume');
        $kegiatan_fisikk->satuan = $request->get('satuan');
        $kegiatan_fisikk->lokasi = $request->get('lokasi');
        $kegiatan_fisikk->statusk = $request->get('statusk');
        $kegiatan_fisikk->dana = $request->get('dana');
        $kegiatan_fisikk->keterangan = $request->get('keterangan');
        $kegiatan_fisikk->status_kegiatan = 'Menunggu';
        $kegiatan_fisikk->save();
        return redirect('kegiatan_fisik_warga')->with('msg','Kegiatan Fisik Berhasil Ditambah!');
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
        // //
        // $kegiatan_fisik = Kegiatan_fisik::find($id);
        // return view('admin.kegiatan_fisik.edit',['kegiatan_fisik' => $kegiatan_fisik]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        // $kegiatan_fisik = Kegiatan_fisik::find($id);
        // $kegiatan_fisik->nik = $request->get('nik');
        // $kegiatan_fisik->kegiatan = $request->get('kegiatan');
        // $kegiatan_fisik->kegiatan = $request->get('kegiatan');
        // $kegiatan_fisik->volume = $request->get('volume');
        // $kegiatan_fisik->satuan = $request->get('satuan');
        // $kegiatan_fisik->lokasi = $request->get('lokasi');
        // $kegiatan_fisik->status = $request->get('statusk');
        // $kegiatan_fisik->dana = $request->get('dana');
        // $kegiatan_fisik->keterangan = $request->get('keterangan');
        // $kegiatan_fisik->status_kegiatan = 'Menunggu';
        // $kegiatan_fisik->save();
        // return redirect()->route('kegiatan_fisk.index')->with('msg','Kegiatan Fisik Berhasil Diedit!');
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
        $kegiatan_fisik = Kegiatan_fisik::find($id);
        $kegiatan_fisik->delete();
        return redirect(route('kegiatan_fisik.index'))->with('msg','Kegiatan Fisik Berhasil Dihapus!');
    }

    public function status_kegiatan($id)
    {
        $kegiatan_fisik = Kegiatan_fisik::where('id','=',$id)->first();
        $kegiatan_fisik->status_kegiatan = 'Disetujui';
        $kegiatan_fisik->save();
        return redirect('kegiatan_fisik');
    }

    public function kegiatan_fisik()
    {
        $kegiatan_fisik = DB::table('kegiatan_fisik')
        ->select('anggota_kk.nik','anggota_kk.nama','anggota_kk.alamat','kegiatan_fisik.kegiatan','kegiatan_fisik.volume','kegiatan_fisik.satuan','kegiatan_fisik.lokasi','kegiatan_fisik.statusk','kegiatan_fisik.dana','kegiatan_fisik.keterangan','kegiatan_fisik.status_kegiatan','kegiatan_fisik.id')
        ->join('anggota_kk','anggota_kk.nik','=','kegiatan_fisik.nik')
        // ->where('kegiatan_fisik.id',$id)
        ->first();

        $pecahkan = explode('-', date('Y-m-d'));
        $kegiatan_fisik = DB::table('kegiatan_fisik')
        ->select('anggota_kk.nik','anggota_kk.nama','anggota_kk.alamat','kegiatan_fisik.kegiatan','kegiatan_fisik.volume','kegiatan_fisik.satuan','kegiatan_fisik.lokasi','kegiatan_fisik.statusk','kegiatan_fisik.dana','kegiatan_fisik.keterangan','kegiatan_fisik.status_kegiatan','kegiatan_fisik.id')
        ->join('anggota_kk','anggota_kk.nik','=','kegiatan_fisik.nik')
        ->get();

        $pdf= PDF::loadview("admin/kegiatan_fisik/detail", [
            "kegiatan_fisik"=>$kegiatan_fisik,

        ]);
        return $pdf->download("detail_kegiatan.pdf");
    }
}

