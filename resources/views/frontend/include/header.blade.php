<div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="index.html" class="az-logo"><span></span> azia</a>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header">
          <a href="index.html" class="az-logo"><span></span> azia</a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item">

            <a href="/" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>

          </li>
<<<<<<< HEAD
         
=======
          
>>>>>>> main
          <li class="nav-item">

            <a href="/surat" class="nav-link"><i class="typcn typcn-document"></i>Surat</a>

          </li>
<<<<<<< HEAD
          
=======

>>>>>>> main
          <li class="nav-item">
            <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Charts</a>
          </li>
          <li class="nav-item">
            <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Forms</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
            <div class="az-menu-sub">
              <div class="container">
                <div>
                  <nav class="nav">
                    <a href="elem-buttons.html" class="nav-link">Buttons</a>
                    <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                    <a href="elem-icons.html" class="nav-link">Icons</a>
                    <a href="table-basic.html" class="nav-link">Table</a>
                  </nav>
                </div>
              </div><!-- container -->
            </div>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank" class="az-header-search-link"><i class="far fa-file-alt"></i></a>
        <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
        <div class="az-header-message">
          <a href="#"><i class="typcn typcn-messages"></i></a>
        </div><!-- az-header-message -->
        
        
        <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <p class="az-notification-text">You have 2 unread notification</p>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="{{asset('frontend/assets/img/faces/face2.jpg')}}" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media new">
                <div class="az-img-user online"><img src="{{asset('frontend/assets/img/faces/face3.jpg')}}" alt=""></div>
                <div class="media-body">
                  <p><strong>Joyce Chua</strong> just created a new blog post</p>
                  <span>Mar 13 04:16am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="{{asset('frontend/assets/img/faces/face4.jpg')}}" alt=""></div> 
                <div class="media-body">
                  <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                  <span>Mar 13 02:56am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="{{asset('frontend/assets/img/faces/face5.jpg')}}" alt=""></div>
                <div class="media-body">
                  <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                  <span>Mar 12 10:40pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div><!-- dropdown-menu -->
        </div><!-- az-header-notification -->


@if (Auth()->user())
    <div class="dropdown az-profile-menu">
      <a href="" class="az-img-user"><img src="{{asset('frontend/assets/img/faces/face1.jpg')}}" alt=""></a>
      <div class="dropdown-menu">
        <div class="az-dropdown-header d-sm-none">
          <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
        </div>
        <div class="az-header-profile">
          <div class="az-img-user">
            <img src="{{asset('frontend/assets/img/faces/face1.jpg')}}" alt="">
          </div><!-- az-img-user -->
          <h6>{{ Auth::user()->nama}}</h6>
          <span>{{ Auth::user()->role}}</span>
        </div><!-- az-header-profile -->

        <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
        <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
<<<<<<< HEAD
          document.getElementById('logout-form').submit();"><i class="typcn typcn-power-outline" ></i>Logout</a>
=======
        document.getElementById('logout-form').submit();"><i class="typcn typcn-power-outline"></i>Logout</a>
>>>>>>> main
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div><!-- dropdown-menu -->
    </div>
@else
      <div class="dropdown az-profile-menu">
        <a href="" class="az-img-user"><img src="{{asset('frontend/assets/img/faces/face1.jpg')}}" alt=""></a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <div class="az-header-profile">
            <div class="az-img-user">
              <img src="{{asset('frontend/assets/img/faces/face1.jpg')}}" alt="">
            </div><!-- az-img-user -->
          </div><!-- az-header-profile -->
          <a href="/login" class="dropdown-item"><i class="typcn typcn-time"></i>Login</a>
        </div><!-- dropdown-menu -->
      </div>
@endif

      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->