@extends('frontend.main')
@section('content')

<div id="content">

        <!-- Topbar -->
     
        <!-- End of Topbar -->
<div class="container">
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-2 text-gray-800">Pengajuan Surat Pengantar</h1></center>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="md-0 font-weight-bold text-primary">Form Pengajuan Surat Pengantar</h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('anggota.store') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                            <label class="form-control-label" for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="Nama Lengkap">
                        </div> 
                        <div class="form-group">
                            <label class="form-control-label" for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK">
                        </div>
                       
                        <label class="form-control-label" for="ttl">Tempat Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelemin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                                placeholder="Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="keperluan">Keperluan</label>
                            <input type="text" id="keperluan" name="keperluan" class="form-control"
                                placeholder="Keperluan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <div class="col text-left">
                            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="{{ route('anggota.index') }}" role="button">Kembali</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>

</div>
</div>
</div>
<!-- /.container-fluid -->
@endsection