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
            <h1 class="h3 mb-2 text-gray-800">Laporan Surat Pengantar</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Laporan Pengajuan Surat Pengantar RT</h6>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                     
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/cetak_lapsurat" method="GET" id="lap_surat">
                                            @csrf
                                            <h5 class="card-title text-center">Laporan Pengajuan Surat Pengantar</h5>
                                            <div class="form-group">
                                                <label for="tgl_surat">Pilih Bulan Pengajuan Surat Pengantar</label>
                                                <input id="bday-month" type="month" name="bln_surat" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-warning"
                                                id="btn_surat"><i class="far fa-file-pdf"></i> Cetak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>

                   
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
