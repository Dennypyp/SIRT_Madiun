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
            <h1 class="h3 mb-2 text-gray-800">Table Transaksi RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Transaksi RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                    <th class="text-center" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">Tanggal</th>
                                    <th class="text-center" rowspan="2">Jenis</th>
                                    <th class="text-center" rowspan="2">Keterangan</th>
                                    <th class="text-center" colspan="2">Status</th>
                                    <th class="text-center" rowspan="2" style="width:30%">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Pemasukan</th>
                                    <th class="text-center">Pengeluaran</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (!empty($transaksi))
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ format_tgl($item->tanggal_transaksi) }}</td>
                                            <td>{{ $item->jenis_transaksi }}</td>
                                            <td>{{ $item->keterangan_transaksi }}</td>
                                            @if ($item->status_transaksi=='Pemasukan')
                                                <td>{{ format_rp($item->jumlah_transaksi) }}</td>
                                                <td class="text-center">-</td>
                                            @elseif($item->status_transaksi=='Pengeluaran') 
                                                <td class="text-center">-</td>
                                                <td>{{ format_rp($item->jumlah_transaksi) }}</td>
                                            @endif
                                            <td class="text-center">

                                                <a href="{{ route('transaksi.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <a href="/transaksi/destroy/{{ $item->id }}"
                                                    class="btn btn-sm btn-danger">Hapus</a>

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
