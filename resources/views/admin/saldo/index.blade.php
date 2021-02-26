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
            <h1 class="h3 mb-2 text-gray-800">Table Saldo RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Saldo RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('saldo.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Kas</th>
                                    <th class="text-center">Bank</th>
                                    <th class="text-center">Saldo</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($saldo))
                                    @foreach($saldo as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ format_tgl($item->tanggal) }}</td>
                                    <td>{{ format_rp($item->kas) }}</td>
                                    <td>{{ format_rp($item->bank) }}</td>
                                    <td>{{ format_rp($item->tot_saldo) }}</td>
                                    <td class="text-center">
                                        
                                            {{-- <a href="{{ route('pemasukan.edit',[$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/pemasukan/destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                        
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
