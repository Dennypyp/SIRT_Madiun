<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kegiatan_fisik;

class Kegiatan_fisikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan_fisik = Kegiatan_fisik::all();
        return view('admin.kegiatan_fisik.index', ['kegiatan_fisik'=>$kegiatan_fisik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kegiatan_fisik.create');
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
        $kegiatan_fisik = new Kegiatan_fisik();
        $kegiatan_fisik->kegiatan = $request->get('kegiatan');
        $kegiatan_fisik->volume = $request->get('volume');
        $kegiatan_fisik->satuan = $request->get('satuan');
        $kegiatan_fisik->status = $request->get('status');
        $kegiatan_fisik->dana = $request->get('dana');
        $kegiatan_fisik->keterangan = $request->get('keterangan');
        $kegiatan_fisik->save();
        return redirect()->route('kegiatan_fisik.index')->with('message','Kegiatan  Fisik Berhasil Ditambah!');
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
        $kegiatan_fisik = Kegiatan_fisik::find($id);
        return view('admin.kegiatan_fisik.edit',['kegiatan_fisik' => $kegiatan_fisik]);
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
        $kegiatan_fisik = Kegiatan_fisik::find($id);
        $kegiatan_fisik->kegiatan = $request->get('kegiatan');
        $kegiatan_fisik->volume = $request->get('volume');
        $kegiatan_fisik->satuan = $request->get('satuan');
        $kegiatan_fisik->status = $request->get('status');
        $kegiatan_fisik->dana = $request->get('dana');
        $kegiatan_fisik->keterangan = $request->get('keterangan');
        $kegiatan_fisik->save();
        return redirect()->route('kegiatan_fisk.index')->with('message','Kegiatan Fisik Berhasil Diedit!');
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
        return redirect(route('kegiatan_fisik.index'))->with('message','Kegiatan Fisik Berhasil Dihapus!');
    }
}

