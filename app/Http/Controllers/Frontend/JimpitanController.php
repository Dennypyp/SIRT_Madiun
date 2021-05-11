<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jimpitan;
use Illuminate\Support\Facades\Auth;

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
        if ($request->get('bln_jimpit') != null) {
            $pecahkan = explode('-', $request->get('bln_jimpit'));
        } else {
            $pecahkan = explode('-', date('Y-m-d'));
        }

        $jimpitan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where('anggota_kk.status_kk', 'Bapak/Kepala Keluarga')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->get();

        // $tagihan = DB::table('uang_sosial')
        // ->join('kk','kk.no_kk','=','uang_sosial.nkk')
        // ->join('anggota_kk','anggota_kk.no_kk','=','kk.no_kk')
        // ->where('anggota_kk.status_kk','Bapak/Kepala Keluarga')
        // // ->where("anggota_kk.nik", Auth::user()->nik)
        // ->get();
        // dd($tagihan);
        $d1 = strtotime("2013-12-09");
        $d2 = strtotime("2014-03-17");
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $i = 0;
        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $i++;
        }
        dd($i+1);

        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');

        return view('frontend.jimpitan.index', [
            'jimpitan' => $jimpitan,
            'total' => $total,
            // 'tagihan'=>$tagihan
            'i'=>$i
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
