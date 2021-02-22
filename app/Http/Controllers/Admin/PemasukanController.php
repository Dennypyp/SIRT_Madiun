<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pemasukan;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemasukan = Pemasukan::all();
        return view('admin.pemasukan.index', ['pemasukan'=>$pemasukan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pemasukan.create');
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
        $pemasukan = new pemasukan();
        $pemasukan->tanggal = $request->get('tanggal');
        $pemasukan->keterangan = $request->get('keterangan');
        $pemasukan->jumlah = $request->get('jumlah');
        $pemasukan->save();
        return redirect()->route('pemasukan.index')->with('message','Pemasukan Berhasil Ditambah!');
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
        $pemasukan = Pemasukan::find($id);
        return view('admin.pemasukan.edit',['pemasukan' => $pemasukan]);
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
        $pemasukan = Pemasukan::find($id);
        $pemasukan->tanggal = $request->get('tanggal');
        $pemasukan->keterangan = $request->get('keterangan');
        $pemasukan->jumlah = $request->get('jumlah');
        $pemasukan->save();
        return redirect()->route('pemasukan.index')->with('message','Pemasukan Berhasil Diedit!');
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
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return redirect(route('pemasukan.index'))->with('message','Pemasukan Berhasil Dihapus!');
    }
}
