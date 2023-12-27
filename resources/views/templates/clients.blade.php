<section id="clients">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Kami ingin berterima kasih kepada semua klien kami yang telah menjadi bagian dari perjalanan kami dalam memberikan solusi yang berkualitas.</p>
        </div>

        <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper align-items-center">
            @foreach ($clients as $row)
            <div class="swiper-slide">
              <img src="assets/img/clients/{{$row->Logo }}" class="img-fluid" alt="{{ $row->ClientName }}">
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->