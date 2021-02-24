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
                    {{-- <div class="col-1 text-right">
                        <a href="{{ route('jimpitan.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div> --}}
                </div>
                
                <div class="card-body">
                    <form action="/laporan_jimpitan" method="GET" id="lap_jimpit">
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
                                {{-- @if(!empty($jimpitan))
                                @foreach($jimpitan as $item) --}}
                                
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Laporan Dana Sosial (Jimpitan)</td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <label for="tgl_jimpit">Pilih Bulan Jimpitan</label>
                                                {{-- <select class="form-control" id="tgl_jimpit" name="tgl_jimpit">
                                                    <option value="">-- Pilih Bulan  --</option>
                                                    @foreach ($tgl_jimpit as $data)
                                                        <option value="{{ $data->tanggal }}">{{ format_bln($data->tanggal) }}</option>
                                                    @endforeach
                                                </select> --}}
                                                <input id="bday-month" type="month" name="bln_jimpit" class="form-control">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            
                                            <button type="submit" class="btn btn-sm btn-warning" id="btn_jimpit">Cetak</button>
                                            {{-- <input type="submit" name="submit" class="btn btn-sm btn-warning" value="submit"> --}}
                                            {{-- <a href="/laporan_jimpitan" class="btn btn-sm btn-warning">Cetak</a> --}}
                                                {{-- <a href="/jimpitan/destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                        </td>
                                    </tr>
                                
                                
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Laporan Keungan Bulanan</td>
                                    <td class="text-center"></td>
                                    <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-warning">Cetak</a>
                                            {{-- <a href="/jimpitan/destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                    </td>
                                </tr>
                                {{-- @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif --}}
                                
                            </tbody>
                            
                        </table>
                    
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection


