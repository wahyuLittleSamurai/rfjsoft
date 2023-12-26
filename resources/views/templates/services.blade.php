<section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Services</h2>
          <p>Inilah saatnya untuk menjelajahi berbagai layanan yang kami miliki dan menemukan solusi yang paling cocok untuk Anda.</p>
        </div>

        <div class="row gy-4">
        @foreach ($services as $row)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <div class="icon">{!! $row->Icon !!}</div>
              <h4 class="title"><a href="">{{ $row->ServiceName }}</a></h4>
              <p class="description">{{ $row->DetailService }}</p>
            </div>
          </div>
        @endforeach
       
        </div>

      </div>
    </section><!-- End Services Section -->