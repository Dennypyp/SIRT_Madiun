<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jimpitan;
use App\Saldo_Uang_Sosial;
use App\Saldo;

class JimpitanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jimpitan = DB::table('uang_sosial')
        ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->get();
        return view('admin.jimpitan.index', ['jimpitan' => $jimpitan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jimpitan = DB::table('kk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->get();
        return view('admin.jimpitan.create', ['jimpitan' => $jimpitan]);
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
        $pecahkan = explode('-', $request->get('tanggal_jimpitan'));

        $jimpitan = new Jimpitan();
        $jimpitan->nkk = $request->get('no_kk');
        $jimpitan->tanggal_jimpitan = $request->get('tanggal_jimpitan');
        $jimpitan->jumlah_jimpitan = $request->get('jumlah_jimpitan');
        $jimpitan->save();

        $saldo_uang_sosial = new saldo_uang_sosial();
        $saldo_id = DB::table('saldo')
        ->whereMonth('saldo.tanggal_saldo', $pecahkan[1])
        ->whereYear('saldo.tanggal_saldo',$pecahkan[0])
        ->first();
        $saldo_uang_sosial->saldo_id = $saldo_id->id;
        $saldo_uang_sosial->uang_sosial_id = $jimpitan->id;
        $saldo_uang_sosial->save();

        $saldo = Saldo::find($saldo_id->id);
        $saldo->jumlah_saldo = $saldo->jumlah_saldo + $request->get('jumlah_jimpitan');
        $saldo->save();
        return redirect()->route('jimpitan.index')->with('message','Dana Sosial (Jimpitan) Telah Terdata!');
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

    public function bayar($id)
    {
        //
        $jimpitan = DB::table('kk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.no_kk','=',$id)
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->first();
        return view('admin.jimpitan.bayar', ['jimpitan' => $jimpitan]);
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
}
