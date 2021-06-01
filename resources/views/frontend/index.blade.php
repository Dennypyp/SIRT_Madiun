@extends('frontend.main')
@section('content')
<div class="az-content az-content-dashboard">
  <div class="container">
    <div class="az-content-body">
      <div class="az-dashboard-one-title">
        <div>
          @if (Auth()->user())
          <h2 class="az-dashboard-title">Hal, Selamat datang {{ Auth::user()->nama }}!</h2>
          
          @else
          <h2 class="az-dashboard-title">Silakan Login terlebih dahulu</h2>
          
          @endif
          <p class="az-dashboard-text">Web ini merupakan Web Sistem Informasi RT.03</p>
        </div>
        <div class="az-content-header-right">
          <div class="media">
            <div class="media-body">
              {{-- <label>Tanggal Hari Ini</label>
              <h6>{{format_tgl(date('Y-m-d'))}}</h6> --}}
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-body">
              <label>Tanggal Hari Ini</label>
              <h6>{{format_tgl(date('Y-m-d'))}}</h6>
            </div><!-- media-body -->
          </div><!-- media -->
          
        </div>
      </div><!-- az-dashboard-one-title -->

      <div class="row row-sm mg-b-20 mg-lg-b-0">
        <div class="col-lg-12 col-xl-12 mg-t-20 mg-lg-t-0">
          <div class="card card-table-one">
            <h4 class="az-dashboard-title">Sistem Informasi RT.03</h4>
            <p class="az-dashboard-text">Warga dapat mengajukan <b>Surat Pengantar</b>, mengajukan <b>Kegiatan Fisik</b> dan <b>Kegiatan Nonfisik</b>, serta melihat data Pembayayaran <b>Jimpitan</b>.</p>
            <br>
            
            
          </div><!-- card -->
        </div><!-- col-lg -->
      </div><!-- row -->
    </div><!-- az-content-body -->
  </div>
</div><!-- az-content -->
@endsection

