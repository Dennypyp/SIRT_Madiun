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
            <h1 class="h3 mb-2 text-gray-800">Edit Pemasukan RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Edit Pemasukan RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('pemasukan.update',[$pemasukan->id])}}">
                        {{method_field("PUT")}}
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
                                        <label class="form-control-label" for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="{{ $pemasukan->tanggal_masuk }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_masuk">Jenis Pemasukan</label>
                                        <select class="form-control" id="jenis_masuk" name="jenis_masuk">
                                            <option value="{{ $pemasukan->jenis_masuk }}">{{ $pemasukan->jenis_masuk }}</option>
                                            <option value="Uang Pembangunan">Uang Pembangunan</option>
                                            <option value="Uang Konsumsi">Uang Konsumsi</option>
                                            <option value="Uang Infak">Uang Infak</option>
                                            <option value="Uang Kas">Uang Kas</option>
                                            <option value="Uang Sosial">Uang Sosial</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="keterangan_masuk">Keterangan Pemasukan</label>
                                        <input type="text" id="keterangan_masuk" name="keterangan_masuk" class="form-control"
                                            placeholder="Keterangan" value="{{ $pemasukan->keterangan_masuk }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="jumlah_masuk">Jumlah Pemasukan (Rp)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="text" id="jumlah_masuk" name="jumlah_masuk" class="form-control"
                                            placeholder="Jumlah Pengeluaran" value="{{ $pemasukan->jumlah_masuk }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Edit</button>
                                        <a class="btn btn-danger" href="{{ route('pemasukan.index') }}" role="button">Kembali</a>
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
