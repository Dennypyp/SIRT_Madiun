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
            <h1 class="h3 mb-2 text-gray-800">Edit Akun</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Reset Password</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('akun.update',[$data->nik]) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @if (session('msg'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                {{ session('msg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <input readonly type="text" id="nik" name="nik" class="form-control" placeholder="NIK" value="{{ $data->nik }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Password Baru</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password">
                                        <label class="form-control-label" style="font-size: 10px">Minimal 6 Karakter</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password_con">Konfirmasi Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Konfirmasi Password">
                                        <label class="form-control-label" style="font-size: 10px">Minimal 6 Karakter</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Reset</button>
                                        <a class="btn btn-danger" href="{{ route('akun.index') }}"
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

@endsection
