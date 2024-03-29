<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <img src="{{ asset('assets/img/logofix.png') }}" alt="" srcset="" style="width: 50px" class="az-logo">
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <img src="{{ asset('assets/img/logofix.png') }}" alt="" srcset="" style="width: 50px" class="az-logo">
                <a href="" class="close">&times;</a>
              </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ '' == request()->segment(1) ? 'active' : '' }}">
                    <a href="/" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
                </li>

                @if (Auth()->user())
                    <li class="nav-item {{ 'surat' == request()->segment(1) ? 'active' : '' }}">
                        <a href="/surat" class="nav-link"><i class="typcn typcn-document"></i>Surat Pengantar</a>
                    </li>
                    <li class="nav-item {{'kegiatan_fisik_warga' == request()->segment(1) ? 'active' : ''}} {{'kegiatan_nonfisik_warga' == request()->segment(1) ? 'active' : ''}}">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Kegiatan</a>
                        <nav class="az-menu-sub">
                          <a href="/kegiatan_fisik_warga" class="nav-link">Kegiatan Fisik</a>
                          <a href="/kegiatan_nonfisik_warga" class="nav-link">Kegiatan Nonfisik</a>
                        </nav>
                    </li>
                    <li class="nav-item {{ 'jimpitan_warga' == request()->segment(1) ? 'active' : '' }}">
                        <a href="/jimpitan_warga" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Jimpitan</a>
                    </li>
                @endif
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            {{-- <div class="dropdown az-header-notification">
                <a href="" class="new"><i class="typcn typcn-bell"></i></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header mg-b-20 d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <h6 class="az-notification-title">Notifications</h6>
                    <p class="az-notification-text">You have 2 unread notification</p>
                    <div class="az-notification-list">
                        <div class="media new">
                            <div class="az-img-user"><img src="{{ asset('frontend/assets/img/faces/face2.jpg') }}"
                                    alt=""></div>
                            <div class="media-body">
                                <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                                <span>Mar 15 12:32pm</span>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media new">
                            <div class="az-img-user online"><img
                                    src="{{ asset('frontend/assets/img/faces/face3.jpg') }}" alt=""></div>
                            <div class="media-body">
                                <p><strong>Joyce Chua</strong> just created a new blog post</p>
                                <span>Mar 13 04:16am</span>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="az-img-user"><img src="{{ asset('frontend/assets/img/faces/face4.jpg') }}"
                                    alt=""></div>
                            <div class="media-body">
                                <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                                <span>Mar 13 02:56am</span>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="az-img-user"><img src="{{ asset('frontend/assets/img/faces/face5.jpg') }}"
                                    alt=""></div>
                            <div class="media-body">
                                <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                                <span>Mar 12 10:40pm</span>
                            </div><!-- media-body -->
                        </div><!-- media -->
                    </div><!-- az-notification-list -->
                    <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                </div><!-- dropdown-menu -->
            </div><!-- az-header-notification --> --}}


            @if (Auth()->user())
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="{{ asset('frontend/assets/img/faces/undraw_profile_2.svg') }}"
                            alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="{{ asset('frontend/assets/img/faces/undraw_profile_2.svg') }}" alt="">
                            </div><!-- az-img-user -->
                            <h6>{{ Auth::user()->nama }}</h6>
                            <span>{{ Auth::user()->role }}</span>
                        </div><!-- az-header-profile -->
                        @if (Auth()->user()->role == 'admin'||Auth()->user()->role == 'bendahara')
                            <a href="/rt_admin" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Ke Halaman Admin</a>
                        @endif
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                class="typcn typcn-power-outline"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div><!-- dropdown-menu -->
                </div>
            @else
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="{{ asset('frontend/assets/img/faces/undraw_profile_2.svg') }}"
                            alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="{{ asset('frontend/assets/img/faces/undraw_profile_2.svg') }}" alt="">
                            </div><!-- az-img-user -->
                        </div><!-- az-header-profile -->
                        <a href="/login" class="dropdown-item"><i class="typcn typcn-time"></i>Login</a>
                    </div><!-- dropdown-menu -->
                </div>
            @endif

        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->
