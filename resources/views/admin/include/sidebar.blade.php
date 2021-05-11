{{-- <!-- Sidebar --> --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- <!-- Sidebar - Brand --> --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ asset('assets/img/logoputih.png') }}" alt="" srcset="" style="width: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">Admin RT. 03</div>
    </a>

    {{-- <!-- Divider --> --}}
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ 'rt_admin' == request()->segment(1) ? 'active' : '' }}">
        <a class="nav-link" href="/rt_admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- <!-- Divider --> --}}
    <hr class="sidebar-divider">

    {{-- <!-- Heading --> --}}
    <div class="sidebar-heading">
        Interface
    </div>

    @if (Auth()->user()->role == 'admin')
        {{-- Nav Warga --}}
        <li
            class="nav-item {{ 'kk' == request()->segment(1) ? 'active' : '' }} {{ 'anggota' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWarga"
                aria-expanded="true" aria-controls="collapseWarga">
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
        {{-- ======================== --}}
    @endif

    @if (Auth()->user()->role == 'admin')
        {{-- Nav Keuangan --}}
        <li
            class="nav-item {{ 'jimpitan' == request()->segment(1) ? 'active' : '' }} {{ 'pengeluaran' == request()->segment(1) ? 'active' : '' }} {{ 'transaksi' == request()->segment(1) ? 'active' : '' }} {{ 'saldo' == request()->segment(1) ? 'active' : '' }} {{ 'lapkeu' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeuangan"
                aria-expanded="true" aria-controls="collapseKeuangan">
                <i class="fas fa-fw fa-university"></i>
                <span>Keuangan</span>
            </a>
            <div id="collapseKeuangan" class="collapse" aria-labelledby="headingKeuangan"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/saldo">Saldo</a>
                    <a class="collapse-item" href="/transaksi">Transaksi</a>
                    <a class="collapse-item" href="/jimpitan">Dana Sosial (Jimpitan)</a>
                    <a class="collapse-item" href="/lapkeu">Laporan</a>
                </div>
            </div>
        </li>
        {{-- =============================== --}}
    @endif

    @if (Auth()->user()->role == 'admin')
        {{-- Nav Surat --}}
        <li
            class="nav-item {{ 'surat_admin' == request()->segment(1) ? 'active' : '' }} {{ 'laporan_surat' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat"
                aria-expanded="true" aria-controls="collapseSurat">
                <i class="fas fa-fw fa-file"></i>
                <span>Surat</span>
            </a>
            <div id="collapseSurat" class="collapse" aria-labelledby="headingSurat" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/surat_admin">Surat Pengantar</a>
                    <a class="collapse-item" href="/laporan_surat">Laporan</a>
                </div>
            </div>
        </li>
        {{-- =========================== --}}

        {{-- Nav Kegiatan --}}
        <li
            class="nav-item {{ 'kegiatan_fisik' == request()->segment(1) ? 'active' : '' }} {{ 'kegiatan_nonfisik' == request()->segment(1) ? 'active' : '' }} ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan"
                aria-expanded="true" aria-controls="collapseKegiatan">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>Kegiatan</span>
            </a>
            <div id="collapseKegiatan" class="collapse" aria-labelledby="headingKegiatan"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/kegiatan_fisik">Data Kegiatan Fisik</a>
                    <a class="collapse-item" href="/kegiatan_nonfisik">Data Kegiatan Nonfisik</a>
                </div>
            </div>
        </li>
        {{-- ========================= --}}

        {{-- <!-- Divider --> --}}
        <hr class="sidebar-divider">

        {{-- Nav Akun --}}
        {{-- <!-- Heading --> --}}
        <div class="sidebar-heading">
            Akun Warga
        </div>

        {{-- <!-- Nav Item - Pages Collapse Menu --> --}}
        <li class="nav-item {{ 'akun' == request()->segment(1) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Akun</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/akun">Data Akun</a>
                </div>
            </div>
        </li>
        {{-- ======================================= --}}
    @endif


    {{-- <!-- Divider --> --}}
    <hr class="sidebar-divider d-none d-md-block">


    {{-- <!-- Sidebar Toggler (Sidebar) --> --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
