<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Jambesari</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')

</head>

<body>

    @include('front.layouts.navbar')

    @yield('hero')

    <main id="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
     <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Desa Jambesari</h3>
            <p>
              Kec. Giri <br>
              Banyuwangi<br>
              Jawa Timur <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> desajambesarigiri@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perangkat Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pelayanan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Menu</h4>
            <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Profile RT/RW</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Kritik Saran</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Potensi Desa</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Desa Jambesari</span></strong>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a rel="noopener noreferrer nofollow" target="_blank" href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    {{-- <script src="{{ asset('front/assets/vendor/php-email-form/validate.js')  }}"></script> --}}
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonText: 'Oke'
            })
        </script>
    @elseif(session()->has('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session()->get('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke'
        })
    </script>
    @endif
    @yield('script')

</body>

</html>
