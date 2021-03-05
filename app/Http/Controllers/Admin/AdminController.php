<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Saldo;
use App\Surat;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pecahkan = explode('-', date('Y-m-d'));

        $tunggu = Surat::where("status_surat", "Menunggu")
        ->whereMonth('created_at', $pecahkan[1])
        ->whereYear('created_at', $pecahkan[0])
        ->count();
        $setuju = Surat::where("status_surat", "Disetujui")
        ->whereMonth('created_at', $pecahkan[1])
        ->whereYear('created_at', $pecahkan[0])
        ->count();

        $saldo = saldo::whereMonth('tanggal_saldo', $pecahkan[1])
        ->whereYear('tanggal_saldo', $pecahkan[0])
        ->first();
        // dd($saldo);
        return view('admin.index',[
            'tunggu'=>$tunggu, 
            'setuju'=>$setuju,
            'saldo'=>$saldo
            ]);
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
}
