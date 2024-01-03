<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.header')
</head>

<body>
  @include('templates.topbar')
 
  @if($sliding == true)
    <!-- ======= hero Section ======= -->
    @include('templates.slideshow')
  @endif

  
  <main id="main">
  
    @yield('content')

  </main><!-- End #main -->


  @include('templates.footer')

</body>

</html>