<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- CSS Eksternal -->
  @include('komponen-layout/css-eksternal')
  <!-- css internal -->
  @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  
  <!-- top navbar -->
  @include('komponen-layout/top-bar')

  <!-- Side Navbar -->
  @include('komponen-layout/side-bar')

  <!-- konten layout -->
  @include('komponen-layout/layout-konten')
  
  <!-- footer layout -->
  @include('komponen-layout/footer-layout')
  
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- js ekternal -->
@include('komponen-layout/js-eksternal')

<!-- js internal -->
@yield('script')

</body>
</html>
