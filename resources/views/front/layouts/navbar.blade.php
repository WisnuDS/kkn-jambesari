  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Jambesari</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{ route('front.index') }}" {{ Route::currentRouteName() == "front.index" ? "class=active" : '' }}>Home</a></li>
          <li><a href="{{ route('front.perangkat_desa.index') }}" {{ Route::currentRouteName() == 'front.perangkat_desa.index' ? 'class=active' : '' }}>Perangkat Desa</a></li>
          <li><a href="{{ route('front.services.index') }}" {{ Route::currentRouteName() == 'front.services.index' ? 'class=active' : '' }}>Pelayanan</a></li>
          <li><a href="{{ route('front.profil_rt_rw') }}" {{ Route::currentRouteName() == 'front.profil_rt_rw' ? 'class=active' : '' }}>Profil Data RT/RW</a></li>
          <li><a href="{{ route('front.blog.index') }}" {{ Route::currentRouteName() == 'front.blog.index' ? 'class=active' : '' }}>Potensi Desa</a></li>
          <li><a href="{{ route('front.kritik-saran.create') }}" {{ Route::currentRouteName() == 'front.kritik-saran.create' ? 'class=active' : '' }}>Kritik & Saran</a></li>

          {{-- <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}



        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
