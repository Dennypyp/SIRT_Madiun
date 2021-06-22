<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
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
        ->orderBy('surat.created_at', 'DESC')
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

    public function status_surat($id)
    {
        $suratp = Surat::where('id','=',$id)->first();
        $suratp->status_surat = 'Disetujui';
        $suratp->save();
        return redirect('surat_admin');
    }

    public function tolak_status_surat($id)
    {
        $suratp = Surat::where('id','=',$id)->first();
        $suratp->status_surat = 'Ditolak';
        $suratp->save();
        return redirect('surat_admin');
    }

    public function surat($id){
       
        $surat = DB::table('surat')
        ->join('anggota_kk','anggota_kk.nik','=','surat.nik')
        ->where('surat.id',$id)
        ->first();

        $pecahkan = explode('-', date('Y-m-d'));
        $no = DB::table('surat')
        ->whereMonth('surat.created_at',$pecahkan[1])
        ->count();
        $pdf= PDF::loadview("admin/surat/isisurat", [
            "surat"=>$surat,
            "no"=>$no 
        ]);
        return $pdf->download("surat_pengantar.pdf");
    }
}
