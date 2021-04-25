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
            <h1 class="h3 mb-2 text-gray-800">Edit Kegiatan Fisik RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Edit Kegiatan Fisik RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('kegiatan_fisik.update',[$kegiatan_fisik->id])}}">
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
                                        <label class="form-control-label" for="kegiatan">Nama Kegiatan</label>
                                        <input type="text" id="kegiatan" name="kegiatan" class="form-control" value="{{ $kegiatan_fisik->kegiatan }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="volume">Volume Kegiatan</label>
                                        <input type="text" id="volume" name="volume" class="form-control" value="{{ $kegiatan_fisik->volume }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="satuan">Satuan</label>
                                        <input type="text" id="satuan" name="satuan" class="form-control" value="{{ $kegiatan_fisik->satuan }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Status</label>
                                        <input type="text" id="status" name="status" class="form-control" value="{{ $kegiatan_fisik->status }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="dana">Status</label>
                                        <input type="text" id="dana" name="dana" class="form-control" value="{{ $kegiatan_fisik->dana }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="keterangan">Keterangan Kegiatan</label>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control"
                                            placeholder="Keterangan" value="{{ $kegiatan_fisik->keterangan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Edit</button>
                                        <a class="btn btn-danger" href="{{ route('kegiatan_fisik.index') }}" role="button">Kembali</a>
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
