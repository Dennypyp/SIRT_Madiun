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
            <h1 class="h3 mb-2 text-gray-800">Data Warga Bukan RT 03</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Warga Bukan RT 03</h6>
                    <div class="col-1 text-right d-inline">
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $data)
                                    <tr>
                                        <td>{{ $data->nik }}</td>
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
                                        <td><a href="{{ route('bukanwarga.edit', [$data->nik]) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href="/bukanwarga/detail/{{ $data->nik }}"
                                                class="btn btn-sm btn-success">Detail</a>
                                        </td>
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
