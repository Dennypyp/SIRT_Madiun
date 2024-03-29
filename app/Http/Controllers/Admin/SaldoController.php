<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Saldo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $yesterday = date("Y-m-d", strtotime( '-1 days' ) ); 
        // $countYesterday = Timer::whereDate('created_at', $yesterday )->get();

        $saldo = Saldo::orderBy('tanggal_saldo', 'DESC')->get();
        return view('admin.saldo.index', ['saldo'=>$saldo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // $saldo = Saldo::where('tanggal_saldo', '<=', Carbon::now()->subMonth())->get();
        $date = \Carbon\Carbon::now();
        $bulanLalu =  $date->subMonth()->format('Y-m'); // 11
        $pecahkanDulu = explode('-', $bulanLalu);
        $dulu = saldo::whereMonth('tanggal_saldo', $pecahkanDulu[1])
        ->whereYear('tanggal_saldo', $pecahkanDulu[0])
        ->first();
        return view('admin.saldo.create',['dulu'=>$dulu]);
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
        $saldo = new saldo();
        $saldo->tanggal_saldo = $request->get('tanggal_saldo');
        $saldo->jumlah_saldo = $request->get('jumlah_saldo');
        $saldo->save();
        return redirect()->route('saldo.index')->with('msg','Saldo Berhasil Ditambah!');
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
        $saldo = Saldo::find($id);
        return view('admin.saldo.edit',['saldo' => $saldo]);
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
        $saldo = Saldo::find($id);
        $saldo->tanggal_saldo = $request->get('tanggal_saldo');
        $saldo->jumlah_saldo = $request->get('jumlah_saldo');
        $saldo->save();
        return redirect()->route('saldo.index')->with('mag','Saldo Berhasil Diedit!');
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
        $saldo = Saldo::find($id);
        $saldo->delete();
        return redirect(route('saldo.index'))->with('mag','Saldo Berhasil Dihapus!');
    }
}
