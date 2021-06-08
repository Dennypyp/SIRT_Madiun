@extends('admin.main')
@section('content')

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('admin.include.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tambah Kegiatan Nonfisik RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Tambah Kegiatan Nonfisik RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kegiatan_nonfisik.store') }}">
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
                                        <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="nama">Nama Pengusul</label>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            placeholder="Nama Lengkap">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="alamat">Alamat Pengusul</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control"
                                            placeholder="Alamat">
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
                                        <label class="form-control-label" for="alamat_penerima">AlamatPenerima</label>
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
                                        <button type="submit" name="save" class="btn btn-primary">Create</button>
                                        <a class="btn btn-danger" href="{{ route('kegiatan_nonfisik.index') }}" role="button">Kembali</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
