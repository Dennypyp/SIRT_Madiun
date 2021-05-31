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
            <h1 class="h3 mb-2 text-gray-800">Edit Anggota Keluarga</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Edit Anggota Keluarga</h6>
                    <div class="col-11 text-right">
                        <a href="" data-target="#edit" data-toggle="modal" class="btn btn-danger">Hapus</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('wargameninggal.update', [$data->nik]) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <input readonly type="text" id="nik" name="nik" class="form-control"
                                            placeholder="NIK" value="{{ $data->nik }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama">Nama Lengkap</label>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            placeholder="Nama Lengkap" value="{{ $data->nama }}">
                                    </div>
                                    <label class="form-control-label" for="ttl">Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                                    class="form-control" value="{{ $data->tempat_lahir }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                                    class="form-control" value="{{ $data->tanggal_lahir }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelemin">
                                            <option value="{{ $data->jenis_kelamin }}">{{ $data->jenis_kelamin }}
                                            </option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="pendidikan">Pendidikan</label>
                                        <input type="text" id="pendidikan" name="pendidikan" class="form-control"
                                            placeholder="Pendidikan" value="{{ $data->pendidikan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <option value="{{ $data->agama }}">{{ $data->agama }}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                                            placeholder="Pekerjaan" value="{{ $data->pekerjaan }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="alamat">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control"
                                            placeholder="Alamat" value="{{ $data->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama_ibu_bapak">Nama Ibu/Bapak</label>
                                        <input type="text" id="nama_ibu_bapak" name="nama_ibu_bapak" class="form-control"
                                            placeholder="Nama Ibu/Bapak" value="{{ $data->nama_ibu_bapak }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Status dalam Keluarga</label>
                                        <select class="form-control" id="status_kk" name="status_kk">
                                            <option value="{{ $data->status_kk }}">{{ $data->status_kk }}</option>
                                            <option value="Bapak/Kepala Keluarga">Bapak/Kepala Keluarga</option>
                                            <option value="Ibu">Ibu</option>
                                            <option value="Anak">Anak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="keterangan_warga">Keterangan Warga</label>
                                        <select class="form-control" id="keterangan_warga" name="keterangan_warga">
                                            <option value="{{ $data->keterangan_warga }}">{{ $data->keterangan_warga }}</option>
                                            <option value="Warga Asli">Warga Asli</option>
                                            <option value="Warga Pindahan">Warga Pindahan</option>
                                            <option value="Sudah Pindah">Sudah Pindah</option>
                                            <option value="Meninggal">Meninggal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="tgl_masuk">Tanggal Masuk/Keluar/Meninggal</label>
                                        <input type="date" id="tanggal_ket" name="tanggal_ket" class="form-control" value="{{ $data->tanggal_ket }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="ket">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" rows="5" class="form-control">{{ $data->keterangan }}</textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="no_kk">No. KK</label>
                                        <select class="form-control" id="no_kk" name="no_kk">
                                            @foreach ($kk as $data)
                                                <option value="{{ $data->no_kk }}">{{ $data->no_kk }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Edit</button>
                                        <a class="btn btn-danger" href="{{ route('wargameninggal.index') }}"
                                            role="button">Kembali</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Hapus Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data Warga?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Hapus" untuk Menghapus Data <br> Data yang terhapus tidak bisa dikembalikan
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="/wargameninggal/destroy/{{ $data->nik }}">Hapus</a>
                </div>
            </div>
        </div>
    </div>

@endsection
