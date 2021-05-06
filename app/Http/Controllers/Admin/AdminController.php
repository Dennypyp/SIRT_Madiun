<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Saldo;
use App\Surat;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $date = \Carbon\Carbon::now();
        $bulanLalu =  $date->subMonth()->format('Y-m'); // 11

        // Ambil bulan sekarang
        $pecahkan = explode('-', date('Y-m-d'));
        // =======================
        // Ambil bulan sebelumnya
        $pecahkanDulu = explode('-', $bulanLalu);
        // ==================

        // Ambil jumlah surat menunggu
        $tunggu = Surat::where("status_surat", "Menunggu")
        ->whereMonth('created_at', $pecahkan[1])
        ->whereYear('created_at', $pecahkan[0])
        ->count();
        // ==============================

        // Ambil jumlah surat disetujui
        $setuju = Surat::where("status_surat", "Disetujui")
        ->whereMonth('created_at', $pecahkan[1])
        ->whereYear('created_at', $pecahkan[0])
        ->count();
        // ======================

        // Ambil saldo bulan sekarang
        $saldo = saldo::whereMonth('tanggal_saldo', $pecahkan[1])
        ->whereYear('tanggal_saldo', $pecahkan[0])
        ->first();
        // ===================

        // Ambil saldo bulan sebelumnya
        $dulu = saldo::whereMonth('tanggal_saldo', $pecahkanDulu[1])
        ->whereYear('tanggal_saldo', $pecahkanDulu[0])
        ->first();
        // =======================

        return view('admin.index',[
            'tunggu'=>$tunggu, 
            'setuju'=>$setuju,
            'saldo'=>$saldo,
            'dulu'=>$dulu,
            'bulanLalu'=>$bulanLalu
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function chartku()
    {
        $pemasukan = DB::table('transaksi')
        ->select(DB::raw('sum(jumlah_transaksi) as `data`')
        ,DB::raw("MONTH(tanggal_transaksi) as month"))
        ->where("status_transaksi", "Pemasukan")
        ->groupby('month')
        ->get();
        $data["pemasukan"] = $pemasukan;

        return response()->json($data);
    }

    public function chartku2()
    {
        $pengeluaran = DB::table('transaksi')
        ->select(DB::raw('sum(jumlah_transaksi) as `data`')
        ,DB::raw("MONTH(tanggal_transaksi) as month"))
        ->where("status_transaksi", "Pengeluaran")
        ->groupby('month')
        ->get();
        $data["pengeluaran"] = $pengeluaran;

        return response()->json($data);
    }
}
