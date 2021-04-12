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
            <h1 class="h3 mb-2 text-gray-800">Edit Nomor Kartu Keluarga</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Edit Nomor Kartu Keluarga </h6>
                    <div class="col-11 text-right">
                        <a href="" data-target="#edit" data-toggle="modal"  class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>                
                <div class="card-body">
                    <form method="POST" action="{{route('kk.update',[$kk->no_kk])}}">
                        {{method_field("PUT")}}
                        @csrf
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="no_kk">Nomor KK</label>
                                            <input type="text" id="no_kk" name="no_kk" class="form-control" placeholder="Nomor KK" value="{{ $kk->no_kk }}">
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col text-left">
                                    <button type="submit" name="save" class="btn btn-primary">Edit</button>
                                    <a class="btn btn-secondary" href="{{ route('kk.index') }}" role="button">Kembali</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Hapus Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data KK?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Hapus" untuk Menghapus Data <br> (usahakan tidak ada No.KK yang terkait dengan anggota)</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="/kk/destroy/{{ $kk->no_kk }}">Hapus</a>
                </div>
            </div>
        </div>
    </div>

@endsection
