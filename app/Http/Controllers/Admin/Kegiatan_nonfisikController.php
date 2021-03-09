<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kegiatan_nonfisik;

class Kegiatan_nonfisikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan_nonfisik = Kegiatan_nonfisik::all();
        return view('admin.kegiatan_nonfisik.index', ['kegiatan_nonfisik'=>$kegiatan_nonfisik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kegiatan_nonfisik.create');
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
        $kegiatan_nonfisik = new Kegiatan_nonfisik();
        $kegiatan_nonfisik->kegiatan = $request->get('kegiatan');
        $kegiatan_nonfisik->nama_pengusul = $request->get('nama_pengusul');
        $kegiatan_nonfisik->alamat_pengusul = $request->get('alamat_pengusul');
        $kegiatan_nonfisik->status = $request->get('status');
        $kegiatan_nonfisik->dana = $request->get('dana');
        $kegiatan_nonfisik->keterangan = $request->get('keterangan');
        $kegiatan_nonfisik->save();
        return redirect()->route('kegiatan_nonfisik.index')->with('msg','Kegiatan Non Fisik Berhasil Ditambah!');
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
        $kegiatan_nonfisik = Kegiatan_nonfisik::find($id);
        return view('admin.kegiatan_nonfisik.edit',['kegiatan_nonfisik' => $kegiatan_nonfisik]);
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
        $kegiatan_nonfisik = Kegiatan_nonfisik::find($id);
        $kegiatan_nonfisik->kegiatan = $request->get('kegiatan');
        $kegiatan_nonfisik->nama_pengusul = $request->get('nama_pengusul');
        $kegiatan_nonfisik->alamat_pengusul = $request->get('alamat_pengusul');
        $kegiatan_nonfisik->status = $request->get('status');
        $kegiatan_nonfisik->dana = $request->get('dana');
        $kegiatan_nonfisik->keterangan = $request->get('keterangan');
        $kegiatan_nonfisik->save();
        return redirect()->route('kegiatan_nonfisk.index')->with('msg','Kegiatan Non Fisik Berhasil Diedit!');
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
        $kegiatan_nonfisik = Kegiatan_nonfisik::find($id);
        $kegiatan_nonfisik->delete();
        return redirect(route('kegiatan_nonfisik.index'))->with('msg','Kegiatan Non Fisik Berhasil Dihapus!');
    }
}

