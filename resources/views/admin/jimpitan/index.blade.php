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
            <h1 class="h3 mb-2 text-gray-800">Table Dana Sosial (Jimpitan)</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Jimpitan RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('jimpitan.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center" style="width:30%">Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($jimpitan))
                                @foreach($jimpitan as $item)
                                <tr>
                                    <td class="text-center">{{ format_bln($item->tanggal_jimpitan) }}</td>
                                    <td class="text-center">{{ $item->nama }}</td>
                                    <td class="text-center">{{ format_rp($item->jumlah_jimpitan) }}</td>
                                    <td class="text-center">
                                            <a href="{{ route('jimpitan.edit',[$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            {{-- <a href="/jimpitan/destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
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
