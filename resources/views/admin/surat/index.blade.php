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
            <h1 class="h3 mb-2 text-gray-800">Tabel Pengajuan Surat Pengantar</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Surat Pengantar </h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Keperluan</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($surat))
                                    @foreach($surat as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama}}</td>
                                    <td>{{ $item->keperluan }}</td>
                                    <td class="text-center">

                                            {{-- <a href="#" class="btn btn-sm btn-info">Setujui</a> --}}
                                            @if ($item->status_surat == "Menunggu")
                                                <a href="/status_surat/{{$item->id}}" class="btn btn-sm btn-success" >Setujui</a>

                                            @elseif($item->status_surat == "Disetujui")
                                            <a href="#" class="btn btn-sm btn-secondary" disabled>Disetujui</a>
                                            <a href="/surat_pengantar/{{$item->id}}" class="btn btn-sm btn-primary"><i class="far fa-file-pdf"></i> Cetak</a>
                                            @endif



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