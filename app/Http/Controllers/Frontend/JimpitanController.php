<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jimpitan;

class JimpitanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->get('bln_jimpit')!=null) {
            $pecahkan = explode('-', $request->get('bln_jimpit'));
        } else {
            $pecahkan = explode('-', date('Y-m-d'));
        }

        $jimpitan = DB::table('uang_sosial')
        ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
        ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
        ->get();
        
        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');

        return view('frontend.jimpitan.index', [
            'jimpitan' => $jimpitan,
            'total' => $total
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
