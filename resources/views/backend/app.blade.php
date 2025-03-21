<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href=" {{ url('backend/assets/img/kaiadmin/favicon.ico')}}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src=" {{ url('backend/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ url('backend/assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('backend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ url('backend/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ url('backend/assets/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href=" {{ url('backend/assets/css/demo.css')}}" />
  </head>
  <body>
    <div class="wrapper">
      @include('backend._partials.Sidebar')

    <div class="main-panel">
      @include('backend._partials.header')

      @yield('content')

      @include('backend._partials.footer')
    </div>
    </div>

    <!--   Core JS Files   -->
    <script src=" {{ url('backend/assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src=" {{ url('backend/assets/js/core/popper.min.js')}}"></script>
    <script src=" {{ url('backend/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{ url('backend/assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ url('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{ url('backend/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ url('backend/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ url('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{ url('backend/assets/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('backend/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ url('backend/assets/js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ url('backend/assets/js/setting-demo.js')}}"></script>
    <script src="{{ url('backend/assets/js/demo.js')}}"></script>
      <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')

     </body>
</html>
