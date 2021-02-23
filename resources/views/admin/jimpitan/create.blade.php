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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Warga</th>
                                    <th class="text-center" style="width:30%">Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {{-- @if(!empty($jimpitan)) --}}
                                @foreach($jimpitan as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('jimpitan.bayar',['id' =>$item->no_kk]) }}" class="btn btn-sm btn-primary">Bayar</a>
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
