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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            </div>

            <!-- Content Row -->
            <div class="row">


                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Saldo Bulanan ({{ format_bln(date('Y-m-d')) }})</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ format_rp($saldo->jumlah_saldo) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Saldo Bulanan Lalu ({{ format_bln($bulanLalu) }})</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ format_rp($dulu->jumlah_saldo) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Disetujui
                                        ({{ format_bln(date('Y-m-d')) }})
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $setuju }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Surat Menunggu ({{ format_bln(date('Y-m-d')) }})</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tunggu }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            

            <!-- Content Row -->
            
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Pemasukan</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="myChart" width="400" height="400"></canvas>
                                {{-- <canvas id="chart-sales-dark" class="chart-canvas"></canvas> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Pengeluaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="myChart2" width="400" height="400"></canvas>
                                {{-- <canvas id="chart-sales-dark" class="chart-canvas"></canvas> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-12 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, {{ Auth::user()->nama }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="{{ asset('admin/assets/img/undraw_posting_photo2.svg') }}" alt="">
                            </div>
                            <p>Web ini merupakan Sistem Informasi dari RT.03/RW.01, Kelurahan Josenan, Kecamatan Taman, Kota
                                Madiun. Pada Web ini memungkinkan Admin mampu mengelola pencatatan warga RT.03, mengelola
                                keuangan, pengelolaan surat pengantar, dan pencatatan kegiatan fisik & non-fisik. Web ini
                                dibuat guna membantu Pengurus dan Warga RT.03 dalam mengelola kegiatan administratif RT.03.
                            </p>
                            {{-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw &rarr;</a> --}}
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

@section('script')
    <script>
        $.ajax({
            url: "/dashboardchart",
            method: "GET",
            datatype: "json",
            success: function(rtnData) {
                $.each(rtnData, function(datatype, data) {
                        console.log(rtnData);
                        var hello = [];
                        var total = [];
                        rtnData['pemasukan'].forEach(res => {
                            var tgl = monthName(res.month);
                            hello.push(tgl);
                            total.push(res.data);
                        });
                        var ctx = document.getElementById("myChart").getContext("2d");
                        config = {
                            type: 'bar',
                            data: {
                                labels: hello,
                                datasets: [{
                                    label: 'Jumlah Pemasukan',
                                    data: total,
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            callback: function(value, index, values) {
                                                return addCommas(
                                                value); //! panggil function addComas tadi disini
                                            }
                                        }
                                    }]
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return 'Jumlah Pemasukan: '+addCommas(tooltipItem.yLabel);
                                        }
                                    }
                                }
                            }
                        };
                        chartku = new Chart(ctx, config);
                        window.myPie = chartku;
                    }

                )
            }
        });

        $.ajax({
            url: "/dashboardchart2",
            method: "GET",
            datatype: "json",
            success: function(rtnData) {
                $.each(rtnData, function(datatype, data) {
                        console.log(rtnData);
                        var hello = [];
                        var total = [];
                        rtnData['pengeluaran'].forEach(res => {
                            var tgl = monthName(res.month);
                            hello.push(tgl);
                            total.push(res.data);
                        });
                        var ctx = document.getElementById("myChart2").getContext("2d");
                        config = {
                            type: 'bar',
                            data: {
                                labels: hello,
                                datasets: [{
                                    label: 'Jumlah Pengeluatan',
                                    data: total,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            callback: function(value, index, values) {
                                                return addCommas(
                                                value); //! panggil function addComas tadi disini
                                            }
                                        }
                                    }]
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return 'Jumlah Pengeluaran: '+addCommas(tooltipItem.yLabel);
                                        }
                                    }
                                }
                            }
                        };
                        chartku2 = new Chart(ctx, config);
                        window.myPie = chartku2;
                    }

                )
            }
        });

        function monthName(mon) {
            return ['Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ]
                [mon - 1];
        }

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            let rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return 'Rp' + x1 + x2;
        }

    </script>
@endsection
