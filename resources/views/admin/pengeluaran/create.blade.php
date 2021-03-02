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
            <h1 class="h3 mb-2 text-gray-800">Tambah Pengeluaran RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Tambah Pengeluaran RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pengeluaran.store') }}">
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
                                        <label class="form-control-label" for="tanggal_keluar">Tanggal Pengeluaran</label>
                                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_keluar">Jenis Pengeluaran</label>
                                        <select class="form-control" id="jenis_keluar" name="jenis_keluar">
                                            <option value="">--Pilih Jenis Pengeluaran--</option>
                                            <option value="Uang Pembangunan">Uang Pembangunan</option>
                                            <option value="Uang Konsumsi">Uang Konsumsi</option>
                                            <option value="Uang Infak">Uang Infak</option>
                                            <option value="Uang Kas">Uang Kas</option>
                                            <option value="Uang Sosial">Uang Sosial</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="keterangan_keluar">Keterangan Pengeluaran</label>
                                            <input type="text" id="keterangan_keluar" name="keterangan_keluar" class="form-control"
                                            placeholder="Keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="jumlah_keluar">Jumlah Pengeluaran (Rp)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="text" id="jumlah_keluar" name="jumlah_keluar" class="form-control"
                                            placeholder="Jumlah Pengeluaran">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Create</button>
                                        <a class="btn btn-danger" href="{{ route('pengeluaran.index') }}" role="button">Kembali</a>
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
