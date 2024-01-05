
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
          @foreach($topMenus as $row)
          <li><a class="nav-link scrollto
            @if ($loop->index == 0)
              ' active'
            @endif
          "  href="{{ $row->Link }}">{{ $row->Menu }}</a></li>
          @endforeach
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->