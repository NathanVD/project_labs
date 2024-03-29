<div class="testimonial-section pb100">

  <div class="test-overlay"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-4">
        <div class="section-title left">
          <h2>{{$testiTitle ? $testiTitle->title : 'What our clients say'}}</h2>
        </div>
        <div class="owl-carousel" id="testimonial-slide">
          @if (!$testimonials || $testimonials->isEmpty())
            <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="img/avatar/01.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div>

            <div class="testimonial">
              <span>‘​‌‘​‌</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
              <div class="client-info">
                <div class="avatar">
                  <img src="img/avatar/02.jpg" alt="">
                </div>
                <div class="client-name">
                  <h2>Michael Smith</h2>
                  <p>CEO Company</p>
                </div>
              </div>
            </div> 
          @else
            @foreach ($testimonials as $testimonial)
              <div class="testimonial">
                <span>‘​‌‘​‌</span>
                <p>{{$testimonial->testimony}}</p>
                <div class="client-info">
                  <div class="avatar">
                    <img src="{{substr( $testimonial->profile_picture_path, 0, 4 ) === "http" ? $testimonial->profile_picture_path : asset('storage/'.$testimonial->profile_picture_path)}}" alt="">
                  </div>
                  <div class="client-name">
                    <h2>{{$testimonial->first_name}} {{$testimonial->last_name}}</h2>
                    <p>{{$testimonial->job_title}}</p>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        {{-- testimonials --}}
          {{-- <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/01.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div>

          <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/02.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div>

          <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/01.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div>

          <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/02.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div>

          <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/01.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div>

          <!-- single testimonial -->
          <div class="testimonial">
            <span>‘​‌‘​‌</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
            <div class="client-info">
              <div class="avatar">
                <img src="img/avatar/02.jpg" alt="">
              </div>
              <div class="client-name">
                <h2>Michael Smith</h2>
                <p>CEO Company</p>
              </div>
            </div>
          </div> --}}
        {{-- testimonials end --}}
          
        </div>
      </div>
    </div>
  </div>
</div>