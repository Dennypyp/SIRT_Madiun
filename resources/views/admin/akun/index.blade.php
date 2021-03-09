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
            <h1 class="h3 mb-2 text-gray-800">Table Akun</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Akun </h6>
                    <div class="col-2 text-right">
                        <a href="{{ route('akun.create') }}" class="btn btn-sm btn-primary">Tambah Akun</a>
                    </div>
                    <br>
                    @if (session('msg'))
                        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                            {{ session('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($akun as $item)
                                <tbody>
                                    <tr>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Edit
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/akun/editnama/{{ $item->nik }}">Edit
                                                        Nama</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('akun.edit', [$item->nik]) }}">Reset Password</a>
                                                </div>
                                            </div>
                                            {{-- <a href="{{ route('akun.edit',[$item->nik]) }}" class="btn btn-sm btn-info">Ubah Password</a> --}}
                                            <a href="" data-target="#edit{{ $item->id }}" data-toggle="modal"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Hapus Modal-->
    @foreach ($akun as $item)
        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Akun?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" untuk Menghapus Akun dengan NIK {{ $item->nik }}
                        <br> Akun yang terhapus tidak bisa dikembalikan
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="/akun/destroy/{{ $item->nik }}">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
