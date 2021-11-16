<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK Pemilihan Mobil Menggunakan Metode Profile Matching</title>

    <!-- Bootstrap -->
    <link href="{{ asset('template/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('template/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('template/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
				<br><br> 	
        <div class="col-md-12 mt-5 col-sm-9">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">Hai !</h1>
              <h2>Selamat Datang di Aplikasi SPK Pemilihan Mobil</h2>
              <p>Aplikasi ini dibuat untuk memenuhi tugas akhir di STMIK Indonesia Mandiri.
              </p>
							<p>Develop By <a href="#">Arif Irawan</a></p>
              <div class="mid_center">
								@if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-secondary btn-sm">Halaman Utama</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Log in</a>

                        @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Register</a>
                        @endif
                    @endauth
            		@endif
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('template/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('template/vendors/nprogress/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('template/build/js/custom.min.js') }}"></script>
  </body>
</html>