<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jimpitan;
use App\kk;
use App\anggota;

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
        // ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->get();
        // dd($jimpitan);
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
        $jimpitan = new Jimpitan();
        $jimpitan->nkk = $request->get('no_kk');
        $jimpitan->tanggal = $request->get('tanggal');
        $jimpitan->jumlah = $request->get('jumlah');
        $jimpitan->save();
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
        // $jimpitan = DB::table('anggota_kk')
        // // ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        // // ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        // ->where('anggota_kk.no_kk','=',$id)
        // ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        // ->get();
        // // dd($jimpitan);
        // return view('admin.jimpitan.edit', ['jimpitan' => $jimpitan]);
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
        // $jimpitan = DB::table('anggota_kk')
        // // ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        // // ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        // ->where('anggota_kk.no_kk','=',$id)
        // ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        // ->get();
        // dd($jimpitan);
        // return view('admin.jimpitan.edit', ['jimpitan' => $jimpitan]);
    }

    public function bayar($id)
    {
        //
        $jimpitan = DB::table('kk')
        // ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.no_kk','=',$id)
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->first();
        // $jimpitan = anggota::where(['no_kk'=>$id, 'status_kk'=>'Bapak/Kepala Keluarga'])->get();
        // dd($jimpitan);
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
