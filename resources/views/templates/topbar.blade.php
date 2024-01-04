
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Email'); @endphp
        @if ($dataFilter != null)
        <i class="bi bi-envelope d-flex align-items-center">
          <a href="mailto:contact@example.com">
            {{ $dataFilter }}
          </a>
        </i>
        @endif
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Phone'); @endphp
        @if ($dataFilter != null)
        <i class="bi bi-phone d-flex align-items-center ms-4"><span> {{ $dataFilter }} </span></i>
        @endif
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Twitter'); @endphp
        @if ($dataFilter != null ) <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> @endif
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Facebook'); @endphp
        @if ($dataFilter != null ) <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> @endif
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Instagram'); @endphp
        @if ($dataFilter != null ) <a href="{{ $dataFilter }}" class="instagram"><i class="bi bi-instagram"></i></a>@endif
        @php $dataFilter = App\Http\Controllers\rjsoft::filteringObj($detailsCompanies, 'Linkedin'); @endphp
        @if ($dataFilter != null ) <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>@endif
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1><a href="index.html">
        {{ $companyName }}
        </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->