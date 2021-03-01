<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
        $tgl_jimpit = DB::table('uang_sosial')
        ->select('uang_sosial.tanggal')
        ->distinct()
        ->get();
        return view('admin.lapkeu.index', ["tgl_jimpit"=>$tgl_jimpit]);
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
        // dd($request->all());
        $pecahkan = explode('-', $request->get('bln_jimpit'));
        // dd($pecahkan);
        $jimpitan = DB::table('uang_sosial')
        ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->get();
        $tanggal= $request->get('bln_jimpit');
        // dd($jimpitan);
        $total = DB::table('uang_sosial')
        ->whereMonth('uang_sosial.tanggal_jimpitan',$pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan',$pecahkan[0])
        ->sum('uang_sosial.jumlah');
        $pdf= PDF::loadview("admin/lapkeu/jimpitan", [
            "jimpitan"=>$jimpitan, 
            'total'=>$total, 
            'tanggal'=>$tanggal
        ]);
        return $pdf->download("laporan_jimpitan.pdf");
    }
}
