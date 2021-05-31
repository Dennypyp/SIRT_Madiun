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
            <h1 class="h3 mb-2 text-gray-800">Data Warga Meninggal</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Warga Meninggal</h6>
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
                    <div class="pl-lg-4">
                        <center>
                            <h4>{{ $data->nama }}</h4>
                            <br>
                            <table border="0" cellspacing="4" cellpadding="4">
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{{ $data->nik }}</td>
                                </tr>
                                <tr>
                                    <td>No KK</td>
                                    <td>:</td>
                                    <td>{{ $data->no_kk }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{{ $data->tempat_lahir }}, {{ format_tgl($data->tanggal_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td>{{ $data->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>{{ $data->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>{{ $data->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu/Bapak</td>
                                    <td>:</td>
                                    <td>{{ $data->nama_ibu_bapak }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                <tr>
                                    <td>Status Dalam Keluarga</td>
                                    <td>:</td>
                                    <td>{{ $data->status_kk }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan Warga</td>
                                    <td>:</td>
                                    <td>{{ $data->keterangan_warga }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Meninggal</td>
                                    <td>:</td>
                                    <td>{{ $data->tanggal_ket }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $data->keterangan }}</td>
                                </tr>
                            </table>                            
                        </center>
                    </div>
                    <br>
                    <a class="btn btn-secondary" href="{{ route('wargameninggal.index') }}" role="button">Kembali</a>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
