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
                    {{-- <div class="col-1 text-right">
                        <a href="{{ route('saldo.create') }}" class="btn btn-primary" style="width: 200px">Saldo Bulanan
                            Baru</a>
                    </div> --}}
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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Saldo</th>
                                    {{-- <th class="text-center" style="width:20%">Aksi</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @if (!empty($saldo))
                                    @foreach ($saldo as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ format_bln($item->tanggal_saldo) }}</td>
                                            <td class="text-center">{{ format_rp($item->jumlah_saldo) }}</td>
                                            {{-- <td class="text-center"> --}}

                                                {{-- <a href="{{ route('pemasukan.edit',[$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/pemasukan/destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                                {{-- <a href="{{ route('saldo.edit', [$item->id]) }}" class="btn btn-sm btn-warning"  --}}
                                                {{-- data-toggle="modal" data-target="#editSaldoModal" --}}
                                                {{-- >Edit</a> --}}

                                                {{-- <a href="/saldo/destroy/{{ $item->id }}"
                                                    class="btn btn-sm btn-danger">Hapus</a> --}}

                                            {{-- </td> --}}
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
    {{-- <div class="modal fade" id="editSaldoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Edit
                        Saldo?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Perhitungkan pengeditan saldo! Karena
                    akan
                    merubah perhitungan Neraca atau Neraca tidak seimbang</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('saldo.edit', [$item->id]) }}">Edit</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of Main Content -->

@endsection
