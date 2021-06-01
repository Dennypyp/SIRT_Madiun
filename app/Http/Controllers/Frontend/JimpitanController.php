<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jimpitan;
use App\kk;
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
        //Ambil Daftar Bulan Jimpitan
        if ($request->get('bln_jimpit') != null) {
            $pecahkan = explode('-', $request->get('bln_jimpit'));
        } else {
            $pecahkan = explode('-', date('Y-m-d'));
        }
        // ==================

        // Ambil Data Jimpitan
        $jimpitan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where('anggota_kk.status_kk', 'Bapak/Kepala Keluarga')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->get();
        // ====================

        // Ambil Tanggal Warga Tinggal
        // $tglTinggal = DB::table('anggota_kk')
        //     ->where('nik', Auth::user()->nik)
        //     ->first();
        $tglTinggal = DB::table('kk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where("anggota_kk.nik", Auth::user()->nik)
            ->first();
        // =========================

        // Ambil jumlah jimpitan yang terbayar
        $tagihan = DB::table('uang_sosial')
            ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where("anggota_kk.nik", Auth::user()->nik)
            ->sum('uang_sosial.jumlah_jimpitan');
        // ===============================

        // Hitung Jumlah bulan warga tinggal di RT
        $d1 = strtotime($tglTinggal->tanggal_masuk);
        $d2 = strtotime(date('Y-m-d'));
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $i = 0;
        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $i++;
        }
        $jumlahBln = $i + 1;
        // ==============

        // Hitung Tagihan
        $jmlTag = $jumlahBln * 10000;
        $totTag = $jmlTag - intval($tagihan);
        // ===================

        // Ambil kk user
        $user = DB::table('kk')
            ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
            ->where("anggota_kk.nik", Auth::user()->nik)
            ->first();
        // ===============================

        // Ambil nama kepala keluarga
        $kk = DB::table('anggota_kk')
            ->where("no_kk", $user->no_kk)
            ->first();
        // ===============================
        // dd($kk->nama);

        $total = DB::table('uang_sosial')
            ->whereMonth('uang_sosial.tanggal_jimpitan', $pecahkan[1])
            ->whereYear('uang_sosial.tanggal_jimpitan', $pecahkan[0])
            ->sum('uang_sosial.jumlah_jimpitan');

        return view('frontend.jimpitan.index', [
            'jimpitan' => $jimpitan,
            'total' => $total,
            'totTag' => $totTag,
            'kk' => $kk
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
