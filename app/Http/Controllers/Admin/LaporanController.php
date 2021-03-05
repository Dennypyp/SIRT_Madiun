<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Transaksi;
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
    public function jimpitan(Request $request){
        $pecahkan = explode('-', $request->get('bln_jimpit'));
        dd($pecahkan);
        $jimpitan = DB::table('uang_sosial')
        ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->get();
        $tanggal= $request->get('bln_jimpit');
        
        $total = DB::table('uang_sosial')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->sum('uang_sosial.jumlah_jimpitan');
        $pdf= PDF::loadview("admin/lapkeu/jimpitan", [
            "jimpitan"=>$jimpitan, 
            'total'=>$total, 
            'tanggal'=>$tanggal
        ]);
        return $pdf->download("laporan_jimpitan.pdf");
    }

    public function keuangan(Request $request){
        $pecahkan = explode('-', $request->get('bln_uang'));
        // dd($pecahkan);
        $jimpitan = DB::table('uang_sosial')
        ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->get();
        // dd($jimpitan);
        $tanggal= $request->get('bln_uang');

        $total = DB::table('uang_sosial')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->sum('uang_sosial.jumlah_jimpitan');
        // dd($total);
        $saldo = DB::table('saldo')
        ->join('saldo_pemasukan','saldo_pemasukan.saldo_id','=','saldo.id')
        ->join('pemasukan','pemasukan.id','=','saldo_pemasukan.pemasukan_id')
        ->join('saldo_pengeluaran','saldo_pengeluaran.saldo_id','=','saldo.id')
        ->join('pengeluaran','pengeluaran.id','=','saldo_pengeluaran.pengeluaran_id')
        // ->join('saldo_uang_sosial','saldo_uang_sosial.saldo_id','=','saldo.id')
        // ->join('uang_sosial','uang_sosial.id','=','saldo_uang_sosial.uang_sosial_id')
        // ->select('sum(jumlah_masuk) as jumlah_masuk')
        // ->groupBy('jenis_masuk');
        // ->sum('jumlah_masuk');
        ->whereMonth('saldo.tanggal_saldo',$pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->groupBy('pemasukan.jenis_masuk')
        ->groupBy('pengeluaran.jenis_keluar');
        // ->get();
        // dd($saldo);

        $pemasukan = Pemasukan::all()
        
        ->sum('jumlah_masuk as tot_masuk')
        ->groupBy('jenis_masuk')
        // ->groupBy('tot_masuk')
        ;
        dd($pemasukan);
        $pdf= PDF::loadview("admin/lapkeu/keuangan", [
            "jimpitan"=>$jimpitan, 
            'total'=>$total, 
            'tanggal'=>$tanggal,
            'pemasukan'=>$pemasukan
        ]);
        return $pdf->download("laporan_keuangan.pdf");
    }
}
