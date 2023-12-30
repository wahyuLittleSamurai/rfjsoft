<section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          @foreach($staffs as $row)
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/team-1.jpg" alt=""></div>
              <div class="details">
                <h4>{{ $row->StaffName }}</h4>
                <span>{{ $row->Position }}</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>

      </div>
    </section><!-- End Team Section -->