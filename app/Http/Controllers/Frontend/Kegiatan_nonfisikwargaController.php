<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\anggota;
use App\Kegiatan_nonfisik;
use Illuminate\Support\Facades\Auth;

class Kegiatan_nonfisikwargaController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kegiatan_nonfisik = Kegiatan_nonfisik::where("nik", Auth::user()->nik)->get();
        return view('frontend.kegiatan_nonfisik.index',['kegiatan_nonfisik'=>$kegiatan_nonfisik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('frontend.kegiatan_nonfisik.create');
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
        // $kegiatan_nonfisik = new Kegiatan_nonfisik();
        // $kegiatan_nonfisik->kegiatan = $request->get('kegiatan');
        // $kegiatan_nonfisik->nama_pengusul = $request->get('nama_pengusul');
        // $kegiatan_nonfisik->alamat_pengusul = $request->get('alamat_pengusul');
        // $kegiatan_nonfisik->status = $request->get('status');
        // $kegiatan_nonfisik->dana = $request->get('dana');
        // $kegiatan_nonfisik->keterangan = $request->get('keterangan');
        // $kegiatan_nonfisik->status_kegiatan = 'Menunggu';
        // $kegiatan_nonfisik->save();
        // return redirect('kegiatan_nonfisik')->with('msg','Kegiatan Non Fisik Berhasil Ditambah!');

        $kegiatan_nonfisikk= new Kegiatan_nonfisik();
        $kegiatan_nonfisikk->nik = $request->get('nik');
        $kegiatan_nonfisikk->kegiatan = $request->get('kegiatan');
        $kegiatan_nonfisikk->nama_penerima = $request->get('nama_penerima');
        $kegiatan_nonfisikk->alamat_penerima = $request->get('alamat_penerima');
        $kegiatan_nonfisikk->statusk = $request->get('statusk');
        $kegiatan_nonfisikk->dana = $request->get('dana');
        $kegiatan_nonfisikk->keterangan = $request->get('keterangan');
        $kegiatan_nonfisikk->status_kegiatan = 'Menunggu';
        $kegiatan_nonfisikk->save();
        return redirect('kegiatan_nonfisik_warga')->with('msg','Kegiatan Nonfisik Berhasil Ditambah!');
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
}
