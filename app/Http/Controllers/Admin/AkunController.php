<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = DB::table('users')
        ->where('nik','!=','superAdmin')
        ->get();
        return view('admin.akun.index', ['akun' => $akun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.akun.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string',  'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }else {
            $akun = DB::table('users')->insert([
                'nama'=>$request->nama,
                'nik'=>$request->nik,
                'password'=>Hash::make($request->password),
                'role' => 'warga',
            ]);
            if ($akun) {
                return redirect('akun')->with('msg', 'Berhasil Menambah Akun');
            }else {
                return redirect('akun.create')->with('msg', 'Gagal Menambah Akun');
            }    
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
        $data = DB::table('users')->where('nik','=',$id)->first();
        return view('admin.akun.edit', ['data' => $data]);
    }

    public function editnama($id)
    {
        //
        $data = DB::table('users')->where('nik','=',$id)->first();
        return view('admin.akun.nama', ['data' => $data]);
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
            'password' => ['required', 'string', 'min:8', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }else {
            $akun = DB::table('users')->where('nik','=',$id)
            ->update(['password'=>Hash::make($request->password)]);
            if ($akun) {
                return redirect('akun')->with('msg', 'Berhasil Mengubah Password');
            }else {
                return redirect('akun.create')->with('msg', 'Gagal Mengubah Password');
            }
        }
    }

    public function updatenama(Request $request, $id)
    {
        //
        $validator = Validator::make(request()->all(), [
            'nama' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }else {
            $akun = DB::table('users')->where('nik','=',$id)
            ->update(['nama'=>$request->nama]);
            if ($akun) {
                return redirect('akun')->with('msg', 'Berhasil Mengubah Nama');
            }else {
                return redirect('akun.create')->with('msg', 'Gagal Mengubah Nama');
            }
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
        DB::table('users')->where('nik','=',$id)->delete();
        return redirect('akun')->with('msg', 'Berhasil Menghapus Akun');
    }
}
