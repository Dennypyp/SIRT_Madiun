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
            <h1 class="h3 mb-2 text-gray-800">Pembayaran Jimpitan RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Jimpitan Bpk/Sdr {{ $jimpitan->nama }} </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('jimpitan.store',[$jimpitan->no_kk])}}">
                        {{-- {{method_field("PUT")}} --}}
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
                                        <label class="form-control-label" for="tanggal">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="YYYY-MM-DD">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama">Nama Warga</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="nama" value="{{ $jimpitan->nama }}" readonly>
                                        <input type="hidden" id="no_kk" name="no_kk" class="form-control" placeholder="" value="{{ $jimpitan->no_kk }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="jumlah">Jumlah Jimpitan (Rp)</label>
                                        <input type="text" id="jumlah" name="jumlah" class="form-control"
                                            placeholder="Jumlah Jimpitan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Bayar</button>
                                        <a class="btn btn-danger" href="{{ route('jimpitan.index') }}" role="button">Kembali</a>
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
