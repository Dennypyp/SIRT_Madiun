<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\kk;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $kk = DB::table('kk')
            ->where('no_kk', '!=', 'admin')
            ->get();
        return view('admin.kk.index', ['kk' => $kk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kk.create');
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
        $validator = Validator::make(request()->all(), [
            'no_kk' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $kk = new kk();
            $kk->no_kk = $request->get('no_kk');
            $kk->save();
            return redirect('kk')->with('msg', 'Nomor KK Berhasil di simpan');
        }
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
        // $kk = kk::where('no_kk',$id);
        $kk = DB::table('kk')->where('no_kk', '=', $id)->first();
        return view('admin.kk.edit', ['kk' => $kk]);
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
        $validator = Validator::make(request()->all(), [
            'no_kk' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $data = kk::where('no_kk', '=', $id)->first();
            $data->no_kk = $request->get('no_kk');
            $data->save();
            return redirect('kk')->with('msg', 'Nomor KK Berhasil di Edit');
        }
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
        $kk = kk::where('no_kk', '=', $id)->first();
        $kk->delete();
        return redirect('kk')->with('msg', 'Nomor KK Berhasil di Hapus');
    }
}
