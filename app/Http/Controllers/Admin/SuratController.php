<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\Surat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = DB::table('surat')
        ->join('anggota_kk','anggota_kk.nik','=','surat.nik')
        ->get();
        return view('admin.surat.index',['surat'=>$surat]);
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

    public function surat($id){
        // dd($request->all());
       // $pecahkan = explode('-', $request->get('bln_jimpit'));
        // dd($pecahkan);
        $surat = DB::table('surat')
        ->join('anggota_kk','anggota_kk.nik','=','surat.nik')
        ->where('surat.id',$id)
        ->first();
      // $tanggal= $request->get('bln_jimpit');
        // dd($jimpitan);
      //  $total = DB::table('uang_sosial')
      //  ->whereMonth('uang_sosial.tanggal',$pecahkan[1])
      //  ->whereYear('uang_sosial.tanggal',$pecahkan[0])
     //   ->sum('uang_sosial.jumlah');
        $pdf= PDF::loadview("admin/surat/isisurat", [
            "surat"=>$surat 
        ]);
        return $pdf->download("surat_pengantar.pdf");
    }
}
