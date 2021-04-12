<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Kegiatan_nonfisik;



class Kegiatan_nonfisikController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan_nonfisik = DB::table('kegiatan_nonfisik')
        ->select('anggota_kk.nik','anggota_kk.nama','anggota_kk.alamat','kegiatan_nonfisik.kegiatan','kegiatan_nonfisik.statusk','kegiatan_nonfisik.dana','kegiatan_nonfisik.keterangan','kegiatan_nonfisik.status_kegiatan','kegiatan_nonfisik.id')
        ->join('anggota_kk','anggota_kk.nik','=','kegiatan_nonfisik.nik')
        ->get();
        // dd($kegiatan_nonfisik);
        return view('admin.kegiatan_nonfisik.index',['kegiatan_nonfisik'=>$kegiatan_nonfisik]);
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
        return view('frontend.kegiatan_nonfisik.create',['anggota'=>$anggota]);
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
        $kegiatan_nonfisikk= new Kegiatan_nonfisik();
        $kegiatan_nonfisikk->nik = $request->get('nik');
        $kegiatan_nonfisikk->kegiatan = $request->get('kegiatan');
        $kegiatan_nonfisikk->statusk = $request->get('statusk');
        $kegiatan_nonfisikk->dana = $request->get('dana');
        $kegiatan_nonfisikk->keterangan = $request->get('keterangan');
        $kegiatan_nonfisikk->status_kegiatan = 'Menunggu';
        $kegiatan_nonfisikk->save();
        return redirect('kegiatan_nonfisik_warga')->with('msg','Kegiatan Non Fisik Berhasil Ditambah!');
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
    }

    public function status_kegiatan($id)
    {
        $kegiatan_nonfisikk = Kegiatan_nonfisik::where('id','=',$id)->first();
        $kegiatan_nonfisikk->status_kegiatan = 'Disetujui';
        $kegiatan_nonfisikk->save();
        return redirect('kegiatan_nonfisik');
    }

    public function kegiatan_nonfisik($id){

        $kegiatan_nonfisik = DB::table('kegiatan_nonfisik')
        ->select('anggota_kk.nik','anggota_kk.nama','anggota_kk.alamat','kegiatan_nonfisik.kegiatan','kegiatan_nonfisik.statusk','kegiatan_nonfisik.dana','kegiatan_nonfisik.keterangan')
        ->join('anggota_kk','anggota_kk.nik','=','kegiatan_nonfisik.nik')
        ->where('kegiatan_nonfisik.id',$id)
        ->first();
        // dd($kegiatan_nonfisik);

        $pecahkan = explode('-', date('Y-m-d'));
        $no = DB::table('kegiatan_nonfisik')
        ->whereMonth('kegiatan_nonfisik.created_at',$pecahkan[1])
        ->count();
        $pdf= PDF::loadview("admin/kegiatan_nonfisik/detail", [
            "kegiatan_nonfisik"=>$kegiatan_nonfisik,
            "no"=>$no
        ]);
        return $pdf->download("nonfisik_detail_kegiatan.pdf");
    }
}
