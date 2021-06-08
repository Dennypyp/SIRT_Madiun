@extends('frontend.main')
@section('content')

<div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->
<div class="container">
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-3 mt-3 text-gray-800">Pengajuan Kegiatan Nonfisik</h1></center>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="md-0 font-weight-bold text-primary">Form Pengajuan Kegiatan Nonfisik</h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('frontend.kegiatan_nonfisik_warga.store') }}">
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
                            <label class="form-control-label" for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK" value="{{ Auth::user()->nik}}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="nama">Nama Pengusul</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="Nama Lengkap" value="{{ Auth::user()->nama}}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="alamat">Alamat Pengusul</label>
                            <input type="text" id="alamat" name="alamat" class="form-control"
                                placeholder="Alamat" value="{{ $anggota->alamat }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="kegiatan">Nama Kegiatan</label>
                            <input type="text" id="kegiatan" name="kegiatan" class="form-control"
                                placeholder="Nama Kegiatan">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="nama_penerima">Nama Penerima</label>
                            <input type="text" id="nama_penerima" name="nama_penerima" class="form-control"
                                placeholder="Nama Penerima">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="alamat_penerima">Alamat Penerima</label>
                            <input type="text" id="alamat_penerima" name="alamat_penerima" class="form-control"
                                placeholder="Alamat Penerima">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="statusk">Status Kegiatan</label>
                            <input type="text" id="statusk" name="statusk" class="form-control"
                                placeholder="Status Kegiatan">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="dana">Dana</label>
                            <input type="text" id="dana" name="dana" class="form-control"
                                placeholder="Dana">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="keterangan">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control"
                                placeholder="Keterangan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <div class="col text-left">
                            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="{{ route('frontend.kegiatan_nonfisik_warga.index') }}" role="button">Kembali</a>
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
