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
            <h1 class="h3 mb-2 text-gray-800">Table Anggota KK</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Anggota KK</h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('anggota.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No. KK</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan</th>
                                    <th>Agama</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>
                                    <th>Nama Ibu/Bapak</th>
                                    <th>Status</th>
                                    <th>Status dalam Keluarga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $data)
                                    <tr>
                                        <td><a href="{{ route('anggota.edit',[$data->nik]) }}">{{ $data->nik }}</a></td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->no_kk }}</td>
                                        <td>{{ $data->tempat_lahir }}, {{ format_tgl($data->tanggal_lahir) }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->pendidikan }}</td>
                                        <td>{{ $data->agama }}</td>
                                        <td>{{ $data->pekerjaan }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->nama_ibu_bapak }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->status_kk }}</td>
                                    </tr>
                                @endforeach
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
