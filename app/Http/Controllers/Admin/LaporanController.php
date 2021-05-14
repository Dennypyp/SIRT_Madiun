<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
Use DateTimeZone;


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
        // Ambil Bulan Sebelumnya
        $date = strtotime($request->get('bln_uang'));
        $tgl = date('Y-m', $date);
        $bulanLalu =  new DateTime($tgl, new DateTimeZone('UTC'));
        $bulanLalu->modify('first day of previous month');
        $month = $bulanLalu->format('m');
        $year = $bulanLalu->format('Y');
        // ======================

        // Ambil Tanggal
        $pecahkan = explode('-', $request->get('bln_uang'));
        $tanggal = $request->get('bln_uang');
        // ===================

        // Ambil Data Jimpitan
        $jimpitan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where('anggota_kk.status_kk', 'Bapak/Kepala Keluarga')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->get();
        // ===================


        // Ambil Total Jimpitan
        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');
        // ====================

        // Ambil Saldo Sekarang
        $saldo = Saldo::whereMonth('tanggal_saldo', $pecahkan[1])
        ->whereYear('tanggal_saldo', $pecahkan[0])
        ->first();
        // =====================
        // Ambil Saldo Bulan Sebelumnya
        $dulu = Saldo::whereMonth('tanggal_saldo', $month)
        ->whereYear('tanggal_saldo', $year)
        ->first();
        // ============================

        // Ambil record berdasarkan jenis transaksi
        $transaksi = transaksi::select('jenis_transaksi')
        // ->whereMonth('tanggal_transaksi', $pecahkan[1])
        // ->whereYear('tanggal_transaksi', $pecahkan[0])
        ->groupBy('jenis_transaksi')
        ->get();
        // foreach ($transaksi as $trans) {
        //     dd($trans);
        // }
        // dd($transaksi);

        $transaksi2 = transaksi::whereMonth('tanggal_transaksi', $pecahkan[1])
        ->whereYear('tanggal_transaksi', $pecahkan[0])
        ->get();

        // =====================

        // Ambil total pengeluaran
        $keluar = transaksi::where('status_transaksi','Pengeluaran')
        ->whereMonth('tanggal_transaksi', $pecahkan[1])
        ->whereYear('tanggal_transaksi', $pecahkan[0])
        ->sum('jumlah_transaksi');
        // ========================

        // Ambil Total Pemasukan
        $masuk = transaksi::where('status_transaksi','Pemasukan')
        ->whereMonth('tanggal_transaksi', $pecahkan[1])
        ->whereYear('tanggal_transaksi', $pecahkan[0])
        ->sum('jumlah_transaksi');
        // =======================

        // Neraca Jumlah Pemasukan
        if ($dulu===null){
            $jumlah_masuk = intval($masuk)+ 0 +intval($total);
        }else{
            $jumlah_masuk = intval($masuk) + $dulu->jumlah_saldo +intval($total);
        }
        // dd($jumlah_masuk);
        // =======================
        // Neraca Jumlah Pengeluaran
        $jumlah_keluar = $saldo->jumlah_saldo+intval($keluar);
        // =========================

        $pdf = PDF::loadview("admin/lapkeu/keuangan", [
            "jimpitan" => $jimpitan,
            'total' => $total,
            'tanggal' => $tanggal,
            'transaksi' => $transaksi,
            'transaksi2' => $transaksi2,
            'saldo' => $saldo,
            'dulu' => $dulu,
            'keluar' => $keluar,
            'jumlah_masuk' => $jumlah_masuk,
            'jumlah_keluar' => $jumlah_keluar,
        ]);

        return $pdf->download("laporan_keuangan.pdf");
    }
}
