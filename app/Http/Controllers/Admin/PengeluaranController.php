<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengeluaran;
use App\Saldo_Pengeluaran;
use App\Saldo;

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
        $pecahkan = explode('-', $request->get('tanggal_keluar'));

        $pengeluaran = new pengeluaran();
        $pengeluaran->tanggal_keluar = $request->get('tanggal_keluar');
        $pengeluaran->jenis_keluar = $request->get('jenis_keluar');
        $pengeluaran->keterangan_keluar = $request->get('keterangan_keluar');
        $pengeluaran->jumlah_keluar = $request->get('jumlah_keluar');
        $pengeluaran->save();

        $saldo_pengeluaran = new saldo_pengeluaran();
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        $saldo_pengeluaran->saldo_id = $saldo_id->id;
        $saldo_pengeluaran->pengeluaran_id = $pengeluaran->id;
        $saldo_pengeluaran->save();

        $saldo = Saldo::find($saldo_id->id);
        $saldo->jumlah_saldo = $saldo->jumlah_saldo - $request->get('jumlah_keluar');
        $saldo->save();
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
        $pecahkan = explode('-', $request->get('tanggal_keluar'));
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();

        $pengeluaran = Pengeluaran::find($id);

        $saldo = Saldo::find($saldo_id->id);
        $saldo->jumlah_saldo = ($saldo->jumlah_saldo + $pengeluaran->jumlah_keluar) - $request->get('jumlah_keluar');
        $saldo->save();

        $pengeluaran->tanggal_keluar = $request->get('tanggal_keluar');
        $pengeluaran->jenis_keluar = $request->get('jenis_keluar');
        $pengeluaran->keterangan_keluar = $request->get('keterangan_keluar');
        $pengeluaran->jumlah_keluar = $request->get('jumlah_keluar');
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
        $pecahkan = explode('-', $pengeluaran->tanggal_keluar);
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();

        $saldo = Saldo::find($saldo_id->id);
        $saldo->jumlah_saldo = $saldo->jumlah_saldo + $pengeluaran->jumlah_keluar;
        $saldo->save();

        $saldo_pengeluaran = Saldo_Pengeluaran::where('pengeluaran_id',$id);
        $saldo_pengeluaran->delete();
        $pengeluaran->delete();
        // $pengeluaran = Pengeluaran::find($id);
        

        return redirect(route('pengeluaran.index'))->with('message','pengeluaran Berhasil Dihapus!');
    }
}
