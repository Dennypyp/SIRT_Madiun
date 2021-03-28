<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\anggota;
use App\Kegiatan_fisik;
use Illuminate\Support\Facades\Auth;

class Kegiatan_fisikwargaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kegiatan_fisik = Kegiatan_fisik::where("nik", Auth::user()->nik)->get();
        return view('frontend.kegiatan_fisik.index',['kegiatan_fisik'=>$kegiatan_fisik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('frontend.kegiatan_fisik.create');
        $anggota = anggota::where("nik","=", Auth::user()->nik)->first();
        return view('frontend.kegiatan_fisik.create',['anggota'=>$anggota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
