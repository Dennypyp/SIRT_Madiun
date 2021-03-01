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
            <h1 class="h3 mb-2 text-gray-800">Tambah Saldo RT</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="md-0 font-weight-bold text-primary">Tambah Saldo RT </h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saldo.store') }}">
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
                                        <label class="form-control-label" for="tanggal_saldo">Tanggal Saldo</label>
                                        <input type="date" id="tanggal_saldo" name="tanggal_saldo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="kas">Kas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="text" id="kas" name="kas" class="form-control"
                                            placeholder="Kas">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-control-label" for="bank">Bank</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input type="text" id="bank" name="bank" class="form-control"
                                            placeholder="Bank">
                                            </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="tot_saldo">Total Saldo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="text" id="tot_saldo" name="tot_saldo" class="form-control"
                                            placeholder="Total Saldo">
                                        </div>
                                        
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="col text-left">
                                        <button type="submit" name="save" class="btn btn-primary">Create</button>
                                        <a class="btn btn-danger" href="{{ route('saldo.index') }}" role="button">Kembali</a>
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

{{-- @section('script')
    <script>
        $(document).ready(function(){
            $('#bank,#kas').on('input', function(){
                if($(this).val()!=undefined){
                    var kas = $('#kas').val();
                    var hasil = parseInt($(this).val()) + parseInt(kas);
                    $('#tot_saldo').val(hasil);
                }
            })
        })
    </script>
@endsection --}}
