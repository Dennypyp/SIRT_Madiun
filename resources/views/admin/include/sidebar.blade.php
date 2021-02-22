{{--  <!-- Sidebar -->  --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{--  <!-- Sidebar - Brand -->  --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{'test_admin' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link" href="/test_admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider">

    {{--  <!-- Heading -->  --}}
    <div class="sidebar-heading">
        Interface
    </div>

    {{--  Nav Warga  --}}
    <li class="nav-item {{'kk' == request()->segment(1) ? 'active' : ''}} {{'anggota' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWarga" aria-expanded="true"
            aria-controls="collapseWarga">
            <i class="fas fa-fw fa-user"></i>
            <span>Warga</span>
        </a>
        <div id="collapseWarga" class="collapse" aria-labelledby="headingWarga" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/kk">Data KK</a>
                <a class="collapse-item" href="/anggota">Data Anggota KK</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{'pengeluaran' == request()->segment(1) ? 'active' : ''}} {{'pemasukan' == request()->segment(1) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeuangan" aria-expanded="true"
            aria-controls="collapseKeuangan">
            <i class="fas fa-fw fa-university"></i>
            <span>Keuangan</span>
        </a>
        <div id="collapseKeuangan" class="collapse" aria-labelledby="headingKeuangan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Dana Sosial (Jimpitan)</a>
                <a class="collapse-item" href="/pemasukan">Pemasukan</a>
                <a class="collapse-item" href="/pengeluaran">Pengeluaran</a>
                <a class="collapse-item" href="#">Laporan</a>
            </div>
        </div>
    </li>

    {{--  <!-- Nav Item - Pages Collapse Menu -->  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    {{--  <!-- Nav Item - Utilities Collapse Menu -->  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider">

    {{--  <!-- Heading -->  --}}
    <div class="sidebar-heading">
        Addons
    </div>

    {{--  <!-- Nav Item - Pages Collapse Menu -->  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    {{--  <!-- Nav Item - Charts -->  --}}
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    {{--  <!-- Nav Item - Tables -->  --}}
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{--  <!-- Sidebar Toggler (Sidebar) -->  --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>