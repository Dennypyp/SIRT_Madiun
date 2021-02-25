<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengeluaran;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengeluaran = Pengeluaran::all();
        return view('admin.pengeluaran.index', ['pengeluaran'=>$pengeluaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pengeluaran.create');
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
        $pengeluaran = new pengeluaran();
        $pengeluaran->tanggal = $request->get('tanggal');
        $pengeluaran->keterangan = $request->get('keterangan');
        $pengeluaran->jumlah = $request->get('jumlah');
        $pengeluaran->save();
        return redirect()->route('pengeluaran.index')->with('message','Pengeluaran Berhasil Ditambah!');
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
        $pengeluaran = Pengeluaran::find($id);
        return view('admin.pengeluaran.edit',['pengeluaran' => $pengeluaran]);
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
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->tanggal = $request->get('tanggal');
        $pengeluaran->keterangan = $request->get('keterangan');
        $pengeluaran->jumlah = $request->get('jumlah');
        $pengeluaran->save();
        return redirect()->route('pengeluaran.index')->with('message','pengeluaran Berhasil Diedit!');
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
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect(route('pengeluaran.index'))->with('message','pengeluaran Berhasil Dihapus!');
    }
}
