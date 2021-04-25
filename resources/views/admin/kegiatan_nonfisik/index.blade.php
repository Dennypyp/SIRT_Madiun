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
            <h1 class="h3 mb-2 text-gray-800">Table Kegiatan Non Fisik RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Kegiatan Non Fisik RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('kegiatan_nonfisik.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                    <div class="float-right">
                        <a href="/nonfisik_detail_kegiatan" class="btn btn-sm btn-info"><i class="far fa-file-pdf"></i> Cetak</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Status Kegiatan</th>
                                    <th class="text-center">Dana</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($kegiatan_nonfisik))
                                    @foreach($kegiatan_nonfisik as $key)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $key->nama }}</td>
                                        <td>{{ $key->alamat }}</td>
                                        <td>{{ $key->kegiatan }}</td>
                                        <td>{{ $key->statusk }}</td>
                                        <td>{{ format_rp($key->dana) }}</td>
                                        <td>{{ $key->keterangan }}</td>
                                        <td class="text-center">

                                            {{-- <a href="{{ route('kegiatan_nonfisik.edit',[$data->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/kegiatan_nonfisik/destroy/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                            @if ($key->status_kegiatan == "Menunggu")
                                                <a href="/nonfisik_status_kegiatan/{{$key->id}}" class="btn btn-sm btn-success" >Setujui</a>
                                                <a href="/nonfisik_tolak_status_kegiatan/{{$key->id}}" class="btn btn-sm btn-warning" >Tolak</a>
                                            @elseif($key->status_kegiatan == "Disetujui")
                                            <a href="#" class="btn btn-sm btn-secondary" disabled>Disetujui</a>
                                            @elseif($key->status_kegiatan == "Ditolak")
                                            <a href="#" class="btn btn-sm btn-danger" disabled>Ditolak</a>
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
