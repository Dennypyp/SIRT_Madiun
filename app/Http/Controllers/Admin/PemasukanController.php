<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pemasukan;
use App\Saldo_Pemasukan;
use Illuminate\Support\Facades\DB;

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
        $pecahkan = explode('-', $request->get('tanggal_masuk'));

        $pemasukan = new pemasukan();
        $pemasukan->tanggal_masuk = $request->get('tanggal_masuk');
        $pemasukan->jenis_masuk = $request->get('jenis_masuk');
        $pemasukan->keterangan_masuk = $request->get('keterangan_masuk');
        $pemasukan->jumlah_masuk = $request->get('jumlah_masuk');
        $pemasukan->save();

        $saldo_pemasukan = new saldo_pemasukan();
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        $saldo_pemasukan->saldo_id = $saldo_id->id;
        $saldo_pemasukan->pemasukan_id = $pemasukan->id;
        $saldo_pemasukan->save();
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
        $pemasukan->tanggal_masuk = $request->get('tanggal_masuk');
        $pemasukan->jenis_masuk = $request->get('jenis_masuk');
        $pemasukan->keterangan_masuk = $request->get('keterangan_masuk');
        $pemasukan->jumlah_masuk = $request->get('jumlah_masuk');
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

        $saldo_pemasukan = Saldo_Pemasukan::find($id);
        $saldo_pemasukan->delete();
        return redirect(route('pemasukan.index'))->with('message','Pemasukan Berhasil Dihapus!');
    }
}
