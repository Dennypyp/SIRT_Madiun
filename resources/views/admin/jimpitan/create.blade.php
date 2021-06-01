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
            <h1 class="h3 mb-2 text-gray-800">Tambah Jimpitan RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Tambah Jimpitan RT </h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">Nama Warga</th>
                                    <th class="text-center" colspan="2">Tagihan</th>
                                    <th class="text-center" style="width:30%" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Kekurangan</th>
                                    <th class="text-center">Kelebihan</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @if (!empty($jimpitan)) --}}
                                @foreach ($jimpitan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        {{-- ================================================ --}}
                                        @php
                                            // Ambil Tanggal Warga Tinggal
                                            $tglTinggal = DB::table('kk')
                                                ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
                                                ->where('anggota_kk.nik', $item->nik)
                                                ->first();
                                            // =========================
                                            
                                            // Ambil jumlah jimpitan yang terbayar
                                            $tagihan = DB::table('uang_sosial')
                                                ->join('kk', 'kk.no_kk', '=', 'uang_sosial.nkk')
                                                ->join('anggota_kk', 'anggota_kk.no_kk', '=', 'kk.no_kk')
                                                ->where('anggota_kk.nik', $item->nik)
                                                ->sum('uang_sosial.jumlah_jimpitan');
                                            // ===============================
                                            
                                            // Hitung Jumlah bulan warga tinggal di RT
                                            $d1 = strtotime($tglTinggal->tanggal_masuk);
                                            $d2 = strtotime(date('Y-m-d'));
                                            $min_date = min($d1, $d2);
                                            $max_date = max($d1, $d2);
                                            $i = 0;
                                            while (($min_date = strtotime('+1 MONTH', $min_date)) <= $max_date) {
                                                $i++;
                                            }
                                            $jumlahBln = $i + 1;
                                            // ==============
                                            
                                            // Hitung Tagihan
                                            $jmlTag = $jumlahBln * 10000;
                                            $totTag = $jmlTag - intval($tagihan);
                                            // ===================
                                        @endphp
                                        {{-- ==================================================== --}}
                                        @if ($totTag >= 10000)
                                            <td>{{ format_rp($totTag) }}</td>
                                            <td class="text-center">-</td>
                                        @elseif($totTag<10000) @if ($totTag === 0) <td class="text-center">-</td>
                                                    <td class="text-center">-</td>
                                            @else
                                                    <td class="text-center">-</td>
                                                    <td>{{ format_rp($totTag * -1) }}</td> @endif @endif
                                                <td class="text-center">
                                                    <a href="{{ route('jimpitan.bayar', ['id' => $item->no_kk]) }}"
                                                        class="btn btn-sm btn-primary">Bayar</a>
                                                </td>
                                    </tr>
                                @endforeach
                                {{-- @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif --}}

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
