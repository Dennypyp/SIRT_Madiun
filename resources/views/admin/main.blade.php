<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin SIRT</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logobiru.png') }}" type="image/x-icon">

    <link href="{{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- ======= Sidebar ======= -->
        @include('admin.include.sidebar')
        <!-- End Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <main id="main">
                @yield('content')
            </main><!-- End #main -->

            <!-- ======= Footer ======= -->
            @include('admin.include.footer')
            <!-- End Footer -->
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @if (Auth()->user())
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" untuk keluar dari Halaman Admin</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        

    @endif

    {{-- <!-- Bootstrap core JavaScript--> --}}
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <!-- Core plugin JavaScript--> --}}
    {{-- <script src="{{ asset('admin/assets/css/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

    {{-- <!-- Custom scripts for all pages--> --}}
    <script src="{{ asset('admin/assets/js/sb-admin-2.min.js') }}"></script>

    {{-- <!-- Page level plugins --> --}}
    <script src="{{ asset('admin/assets/vendor/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    {{-- <!-- Page level custom scripts --> --}}
    {{-- <script src="{{ asset('admin/assets/js/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/js/demo/chart-pie-demo.js') }}"></script> --}}

    <script src="{{ asset('admin/assets/js/demo/datatables-demo.js') }}"></script>
    @yield('script')
</body>

</html>
