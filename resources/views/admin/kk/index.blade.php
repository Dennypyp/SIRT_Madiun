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
            <h1 class="h3 mb-2 text-gray-800">Table Nomor Kartu Keluarga</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Nomor Kartu Keluarga </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('kk.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No. KK</th>
                                </tr>
                            </thead>
                            @foreach($kk as $item)
                            <tbody>
                                <tr>
                                    <td><a href="{{ route('kk.edit',[$item->no_kk]) }}">{{ $item->no_kk }}</a></td>
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

@endsection
