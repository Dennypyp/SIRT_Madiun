<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $tgl_jimpit = DB::table('uang_sosial')
        // ->select('uang_sosial.tanggal')
        // ->distinct()
        // ->get();
        return view('admin.lapkeu.index');
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
    public function jimpitan(Request $request)
    {
        
        $pecahkan = explode('-', $request->get('bln_jimpit'));
        
        $jimpitan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where('anggota_kk.status_kk', 'Bapak/Kepala Keluarga')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->get();
        $tanggal = $request->get('bln_jimpit');

        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');
        $pdf = PDF::loadview("admin/lapkeu/jimpitan", [
            "jimpitan" => $jimpitan,
            'total' => $total,
            'tanggal' => $tanggal
        ]);
        return $pdf->download("laporan_jimpitan.pdf");
    }

    public function keuangan(Request $request)
    {
        $date = $request->get('bln_uang');
        $bulanLalu =  date('Y-m', strtotime("-1 Months")); // 11
        // dd($bulanLalu);
        $pecahkan = explode('-', $request->get('bln_uang'));
        $pecahkanDulu = explode('-', $bulanLalu);
        // dd($pecahkan);
        $jimpitan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where('anggota_kk.status_kk', 'Bapak/Kepala Keluarga')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->get();
        // dd($jimpitan);
        $tanggal = $request->get('bln_uang');

        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');
        // dd($total);

        $saldo = Saldo::whereMonth('tanggal_saldo', $pecahkan[1])
        ->whereYear('tanggal_saldo', $pecahkan[0])
        ->first();
        $dulu = Saldo::whereMonth('tanggal_saldo', $pecahkanDulu[1])
        ->whereYear('tanggal_saldo', $pecahkanDulu[0])
        ->first();

        $transaksi = transaksi::all()
        ->groupBy('jenis_transaksi');

        $keluar = transaksi::where('status_transaksi','Pengeluaran')
        ->sum('jumlah_transaksi');

        $masuk = transaksi::where('status_transaksi','Pemasukan')
        ->sum('jumlah_transaksi');

        $jumlah_masuk = intval($masuk)+ $dulu->jumlah_saldo +intval($total);
        $jumlah_keluar = $saldo->jumlah_saldo+intval($keluar);
        // dd($jumlah_keluar);


        
        // dd($transaksi);
        $pdf = PDF::loadview("admin/lapkeu/keuangan", [
            "jimpitan" => $jimpitan,
            'total' => $total,
            'tanggal' => $tanggal,
            'transaksi' => $transaksi,
            'saldo' => $saldo,
            'dulu' => $dulu,
            'keluar' => $keluar,
            'jumlah_masuk' => $jumlah_masuk,
            'jumlah_keluar' => $jumlah_keluar,
        ]);
        return $pdf->download("laporan_keuangan.pdf");
    }
}
