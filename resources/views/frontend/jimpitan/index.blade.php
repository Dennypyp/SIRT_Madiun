@extends('frontend.main')
@section('content')

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-3 mt-3 text-gray-800">Table Jimpitan Warga</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Jimpitan</h6>
                    {{-- <div class="col-1 text-right">
                        <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary">Buat Pengajuan</a>
                    </div> --}}
                </div>
                <div class="container mb-2 mt-2">
                    <div class="row row-sm">
                        <div class="col-lg-8">

                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <form action="{{route('frontend.jimpitan_warga.index')}}" method="GET">
                                {{-- @csrf --}}
                                <div class="input-group">
                                <input id="bday-month" type="month" name="bln_jimpit" class="form-control" placeholder="Pilih Bulan">
                                {{-- <input type="text" class="form-control" placeholder="Search for..."> --}}
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"> Cari Bulan</i></button>
                                </span>
                            </div><!-- input-group -->
                            </form>
                        </div>
                    </div><!-- row -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mg-b-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jumlah</th>

                                </tr>
                            </thead>

                            <tbody>
                                @if (!empty($jimpitan))
                                    {{-- @foreach ($jimpitan as $tanggal_jimpitan => $uang)
                                        @php
                                            $total['tanggal_jimpitan'] = 0;
                                        @endphp
                                        @foreach ($uang as $item)
                                            <tr>
                                                <td class="text-center">{{ format_bln($item->tanggal_jimpitan) }}</td>
                                                <td class="text-center">{{ $item->nama }}</td>
                                                <td class="text-center">{{ format_rp($item->jumlah_jimpitan) }}</td>
                                            </tr>
                                            @php
                                                $total['tanggal_jimpitan'] = $total['tanggal_jimpitan'] + $item->jumlah_jimpitan;
                                            @endphp
                                        @endforeach
                                        <td colspan="2" align="center">TOTAL</td>
                                        <td align="center"><b>{{ format_rp($total['tanggal_jimpitan']) }}</b></td>
                                    @endforeach --}}
                                    @foreach ($jimpitan as $item)
                                        <tr>
                                            <td class="text-center">{{ format_bln($item->tanggal_jimpitan) }}</td>
                                            <td class="text-center">{{ $item->nama }}</td>
                                            <td class="text-center">{{ format_rp($item->jumlah_jimpitan) }}</td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" align="center"><b>TOTAL</b></td>
                                        <td align="center"><b>{{ format_rp($total) }}</b></td>
                                    </tr>
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
