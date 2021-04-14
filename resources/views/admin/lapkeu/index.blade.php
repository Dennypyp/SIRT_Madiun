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
            <h1 class="h3 mb-2 text-gray-800">Laporan Keuangan</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Laporan Keuangan RT </h6>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/laporan_jimpitan" method="GET" id="lap_jimpit">
                                            @csrf
                                            <h5 class="card-title text-center">Laporan Dana Sosial (Jimpitan)</h5>
                                            <div class="form-group">
                                                <label for="tgl_jimpit">Pilih Bulan Jimpitan</label>
                                                <input id="bday-month" type="month" name="bln_jimpit" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-warning"
                                                id="btn_jimpit"><i class="far fa-file-pdf"></i> Cetak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/laporan_keuangan" method="GET" id="lap_keuangan">
                                            @csrf
                                            <h5 class="card-title text-center">Laporan Keuangan Bulanan</h5>
                                            <div class="form-group">
                                                <label for="tgl_jimpit">Pilih Bulan Laporan</label>
                                                <input id="bday-month" type="month" name="bln_uang" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-warning"
                                                id="btn_keuangan"><i class="far fa-file-pdf"></i> Cetak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <form action="/laporan_jimpitan" method="GET" id="lap_jimpit">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Bulan Laporan</th>
                                    <th class="text-center" style="width:30%">Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Laporan Dana Sosial (Jimpitan)</td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <label for="tgl_jimpit">Pilih Bulan Jimpitan</label>
                                                <input id="bday-month" type="month" name="bln_jimpit" class="form-control">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            
                                            <button type="submit" class="btn btn-sm btn-warning" id="btn_jimpit">Cetak</button>
                                        </td>
                                    </tr>
                                
                                
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Laporan Keungan Bulanan</td>
                                    <td class="text-center">
                                        <div class="form-group">
                                            <label for="tgl_keuangan">Pilih Bulan Lap. Keuangan</label>
                                            <input id="bday-month" type="month" name="bln_keuangan" class="form-control">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-sm btn-warning" id="btn_keuangan">Cetak</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </form> --}}
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
