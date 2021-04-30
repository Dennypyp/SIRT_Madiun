<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.laporansurat.index');
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
    public function lapsurat_pengantar(Request $request)
    {

        $pecahkan = explode('-', $request->get('bln_surat'));

        $surat = DB::table('surat')
        ->join('anggota_kk','anggota_kk.nik','=','surat.nik')
            ->where('surat.status_surat','Disetujui')
            ->whereMonth('surat.created_at', $pecahkan[1])
            ->whereYear('surat.created_at', $pecahkan[0])
            ->get();
           
        $tanggal = $request->get('bln_surat');

        $total = DB::table('surat')
            ->where('status_surat','Disetujui')
            ->whereMonth('surat.created_at', $pecahkan[1])
            ->whereYear('surat.created_at', $pecahkan[0])
            ->count();
            
        $pdf = PDF::loadview("admin/laporansurat/cetaklapsurat", [
            "surat" => $surat,
            'total' => $total,
            'tanggal' => $tanggal
        ]);
        return $pdf->download("laporan_pengajuan_surat.pdf");
    }
}
