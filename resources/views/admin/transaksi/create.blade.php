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
            <h1 class="h3 mb-2 text-gray-800">Tambah Transaksi RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Tambah Transaksi RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.store') }}">
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
                                        <label class="form-control-label" for="tanggal_transaksi">Tanggal Transaksi</label>
                                        <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_transaksi">Status Transaksi</label>
                                        <select class="form-control" id="status_transaksi" name="status_transaksi">
                                            <option value="">--Pilih Status Transaksi--</option>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_transaksi">Jenis Transaksi</label>
                                        <select class="form-control" id="jenis_transaksi" name="jenis_transaksi">
                                            <option value="">--Pilih Jenis Transaksi--</option>
                                            <option value="Uang Pembangunan">Uang Pembangunan</option>
                                            <option value="Uang Konsumsi">Uang Konsumsi</option>
                                            <option value="Uang Infak">Uang Infak</option>
                                            <option value="Uang Kas">Uang Kas</option>
                                            <option value="Uang Sosial">Uang Sosial</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="keterangan_transaksi">Keterangan Transaksi</label>
                                        <input type="text" id="keterangan_transaksi" name="keterangan_transaksi" class="form-control"
                                            placeholder="Keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="sumber_transaksi">Sumber/Yang Menyerahkan/Yang Menggunakan Transaksi</label>
                                        <input type="text" id="sumber_transaksi" name="sumber_transaksi" class="form-control"
                                            placeholder="Sumber/Yang Menyerahkan/Yang Menggunakan Transaksi">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="jumlah_transaksi">Jumlah Transaksi (Rp)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="text" id="jumlah_transaksi" name="jumlah_transaksi" class="form-control"
                                            placeholder="Jumlah Transaksi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Create</button>
                                        <a class="btn btn-danger" href="{{ route('transaksi.index') }}" role="button">Kembali</a>
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
