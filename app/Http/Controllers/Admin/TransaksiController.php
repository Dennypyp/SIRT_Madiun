<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Saldo_Transaksi;
use App\Saldo;
use Illuminate\Support\Facades\DB;
use DateTime;
Use DateTimeZone;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksi = Transaksi::orderBy('id', 'DESC')->get();
        return view('admin.transaksi.index', ['transaksi'=>$transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.transaksi.create');
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
        $pecahkan = explode('-', $request->get('tanggal_transaksi'));

        $checkSaldo = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        // dd($checkSaldo);
        if($checkSaldo===null){
            // Ambil Bulan Sebelumnya
            $date = strtotime($request->get('tanggal_transaksi'));
            $tgl = date('Y-m-d', $date);
            $bulanLalu =  new DateTime($tgl, new DateTimeZone('UTC'));
            $bulanLalu->modify('first day of previous month');
            $month = $bulanLalu->format('m');
            $year = $bulanLalu->format('Y');
            // ======================

            // Data Saldo Sebelumnya
            $dulu = Saldo::whereMonth('tanggal_saldo', $month)
            ->whereYear('tanggal_saldo', $year)
            ->first();
            // ======================

            $saldo_baru = new Saldo();
            $saldo_baru->tanggal_saldo = $request->get('tanggal_transaksi');
            if ($dulu===null) {
                $saldo_baru->jumlah_saldo = 0;
            } else {
                $saldo_baru->jumlah_saldo = $dulu->jumlah_saldo;
            }
            // dd($saldo_baru->tanggal_saldo);
            $saldo_baru->save();
        }
        // else if($checkSaldo->jumlah_saldo===0){
        //     // Ambil Bulan Sebelumnya
        //     $date = strtotime($request->get('tanggal_transaksi'));
        //     $tgl = date('Y-m-d', $date);
        //     $bulanLalu =  new DateTime($tgl, new DateTimeZone('UTC'));
        //     $bulanLalu->modify('first day of previous month');
        //     $month = $bulanLalu->format('m');
        //     $year = $bulanLalu->format('Y');
        //     // ======================

        //     // Data Saldo Sebelumnya
        //     $dulu = Saldo::whereMonth('tanggal_saldo', $month)
        //     ->whereYear('tanggal_saldo', $year)
        //     ->first();
        //     // ======================

        //     $saldo_baru = new Saldo();
        //     $saldo_baru->tanggal_saldo = $request->get('tanggal_transaksi');
        //     if ($dulu===null) {
        //         $saldo_baru->jumlah_saldo = 0;
        //     } else {
        //         $saldo_baru->jumlah_saldo = $dulu->jumlah_saldo;
        //     }
        //     // dd($saldo_baru->tanggal_saldo);
        //     // $saldo_baru->save();
        // }
        // $saldo_baru->save();

        // Simpan transaksi
        $transaksi = new transaksi();
        $transaksi->tanggal_transaksi = $request->get('tanggal_transaksi');
        $transaksi->status_transaksi = $request->get('status_transaksi');
        $transaksi->jenis_transaksi = $request->get('jenis_transaksi');
        $transaksi->keterangan_transaksi = $request->get('keterangan_transaksi');
        $transaksi->jumlah_transaksi = $request->get('jumlah_transaksi');
        $transaksi->save();
        //========================

        //simpan relasi
        $saldo_transaksi = new saldo_transaksi();
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        $saldo_transaksi->saldo_id = $saldo_id->id;
        $saldo_transaksi->transaksi_id = $transaksi->id;
        $saldo_transaksi->save();
        // =====================

        // Update saldo
        $saldo = Saldo::find($saldo_id->id);
        if ($request->get('status_transaksi')==='Pemasukan') {
            $saldo->jumlah_saldo = $saldo->jumlah_saldo + intval($request->get('jumlah_transaksi'));
        } else if($request->get('status_transaksi')==='Pengeluaran') {
            $saldo->jumlah_saldo = $saldo->jumlah_saldo - intval($request->get('jumlah_transaksi'));
        }
        // $saldo->jumlah_saldo = $saldo->jumlah_saldo + $request->get('jumlah_transaksi');
        $saldo->save();
        // =========================
        return redirect()->route('transaksi.index')->with('msg', $request->get('status_transaksi').' Berhasil Ditambah!');
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
        $transaksi = Transaksi::find($id);
        return view('admin.transaksi.edit',['transaksi' => $transaksi]);
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
        $pecahkan = explode('-', $request->get('tanggal_transaksi'));
        // Ambil saldo saat ini
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        // ==================

        // Ambil transaksi
        $transaksi = Transaksi::find($id);
        // ==================

        // Update saldo
        $saldo = Saldo::find($saldo_id->id);
        if ($request->get('status_transaksi')==='Pemasukan') {
            $saldo->jumlah_saldo = ($saldo->jumlah_saldo + $transaksi->jumlah_transaksi) + intval($request->get('jumlah_transaksi'));
        } else if($request->get('status_transaksi')==='Pengeluaran') {
            $saldo->jumlah_saldo = ($saldo->jumlah_saldo - $transaksi->jumlah_transaksi) - intval($request->get('jumlah_transaksi'));
        }
        $saldo->save();
        
        // =======================

        // Simpan transaksi
        $transaksi->tanggal_transaksi = $request->get('tanggal_transaksi');
        $transaksi->status_transaksi = $request->get('status_transaksi');
        $transaksi->jenis_transaksi = $request->get('jenis_transaksi');
        $transaksi->keterangan_transaksi = $request->get('keterangan_transaksi');
        $transaksi->jumlah_transaksi = $request->get('jumlah_transaksi');
        $transaksi->save();
        // =======================
        return redirect()->route('transaksi.index')->with('msg', $request->get('status_transaksi').' Berhasil Diedit!');
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
        $transaksi = Transaksi::find($id);
        $pecahkan = explode('-', $transaksi->tanggal_transaksi);
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();

        $saldo = Saldo::find($saldo_id->id);
        if ($transaksi->status_transaksi=='Pemasukan') {
            $saldo->jumlah_saldo = $saldo->jumlah_saldo - $transaksi->jumlah_transaksi;
        } else if($transaksi->status_transaksi=='Pengeluaran') {
            $saldo->jumlah_saldo = $saldo->jumlah_saldo + $transaksi->jumlah_transaksi;
        }
        $saldo->save();

        $saldo_transaksi = Saldo_Transaksi::where('transaksi_id',$id);
        $saldo_transaksi->delete();

        
        $transaksi->delete();

        return redirect(route('transaksi.index'))->with('msg','Transaksi Berhasil Dihapus!');
    }
}
