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
            <h1 class="h3 mb-2 text-gray-800">Table Kegiatan Fisik RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Data Kegiatan Fisik RT </h6>
                    <div class="col-1 text-right">
                        <a href="{{ route('kegiatan_fisik.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                        
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
                        <a href="/detail_kegiatan" class="btn btn-sm btn-info"><i class="far fa-file-pdf"></i> Cetak</a>
                    </div>
                </div>
                
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nik</th>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Nama Pengusul</th>
                                    <th class="text-center">Alamat Pengusul</th>
                                    <th class="text-center">Volume Kegiatan</th>
                                    <th class="text-center">Satuan</th>
                                    <th class="text-center">Lokasi</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Dana</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($kegiatan_fisik))
                                    @foreach($kegiatan_fisik as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->kegiatan }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->volume }}</td>
                                            <td>{{ $data->satuan }}</td>
                                            <td>{{ $data->lokasi }}</td>
                                            <td>{{ $data->statusk }}</td>
                                            <td>{{ format_rp($data->dana) }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td class="text-center">

                                            {{-- <a href="{{ route('kegiatan_fisik.edit',[$data->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/kegiatan_fisik/destroy/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                                            @if ($data->status_kegiatan == "Menunggu")
                                                <a href="/status_kegiatan/{{$data->id}}" class="btn btn-sm btn-success" >Setujui</a>

                                            @elseif($data->status_kegiatan == "Disetujui")
                                            <a href="#" class="btn btn-sm btn-secondary" disabled>Disetujui</a>
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



