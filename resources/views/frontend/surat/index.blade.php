@extends('frontend.main')
@section('content')

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
       
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-3 mt-3 text-gray-800">Table Pengajuan Surat</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Pengajuan Surat</h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary">Buat Pengajuan</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->keperluan }}</td>
                                        <td>
                                        @if($data->status_surat == "Menunggu")
                                        <div class="alert alert-warning text-center" role="alert">{{ $data->status_surat }}</div>
                                        @else
                                        <div class="alert alert-success text-center" role="alert">{{ $data->status_surat }}</div>
                                        @endif
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
