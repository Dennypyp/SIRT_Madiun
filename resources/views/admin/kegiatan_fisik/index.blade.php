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
            <h1 class="h3 mb-2 text-gray-800">Table Kegiatan Fisik Warga RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Kegiatan Fisik Warga RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('kegiatan_fisik.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Volume</th>
                                    <th class="text-center">Satuan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Dana</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($kegiatan_fisik))
                                    @foreach($kegiatan_fisik as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->kegiatan }}</td>
                                            <td class="text-center">{{ $data->volume }}</td>
                                            <td class="text-center">{{ $data->satuan }}</td>
                                            <td class="text-center">{{ $data->status }}</td>
                                            <td class="text-center">{{ $data->dana }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td class="text-center">

                                            <a href="{{ route('kegiatan_fisik.edit',[$data->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/kegiatan_fisik/destroy/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection



