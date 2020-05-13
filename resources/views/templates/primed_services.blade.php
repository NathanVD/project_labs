<div class="team-section spad" id="primed_services">
  <div class="overlay"></div>
  <div class="container">
    <div class="section-title">
      @if (!$primed_services_title)
        <h2>Get in <span>the Lab</span> and discover the world</h2>
      @else
        @if ($primed_services_title->highlight)
          <h2>{{$primed_services_title->title_1}} <span>{{$primed_services_title->highlight}}</span> {{$primed_services_title->title_2}}</h2>
        @else
          <h2>{{$primed_services_title->title_1}} {{$primed_services_title->title_2}}</h2>
        @endif
      @endif
    </div>
    <div class="row">
      @if ($primed_services->isEmpty())
        <!-- feature item -->
        <div class="col-md-4 col-sm-4 features">
          <div class="icon-box light left">
            <div class="service-text">
              <h2>Get in the lab</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
            <div class="icon">
              <i class="flaticon-002-caliper"></i>
            </div>
          </div>
          <!-- feature item -->
          <div class="icon-box light left">
            <div class="service-text">
              <h2>Projects online</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
            <div class="icon">
              <i class="flaticon-019-coffee-cup"></i>
            </div>
          </div>
          <!-- feature item -->
          <div class="icon-box light left">
            <div class="service-text">
              <h2>SMART MARKETING</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
            <div class="icon">
              <i class="flaticon-020-creativity"></i>
            </div>
          </div>
        </div>
        <!-- Devices -->
        <div class="col-md-4 col-sm-4 devices">
          <div class="text-center">
            <img src="img/device.png" alt="">
          </div>
        </div>
        <!-- feature item -->
        <div class="col-md-4 col-sm-4 features">
          <div class="icon-box light">
            <div class="icon">
              <i class="flaticon-037-idea"></i>
            </div>
            <div class="service-text">
              <h2>Get in the lab</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
          </div>
          <!-- feature item -->
          <div class="icon-box light">
            <div class="icon">
              <i class="flaticon-025-imagination"></i>
            </div>
            <div class="service-text">
              <h2>Projects online</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
          </div>
          <!-- feature item -->
          <div class="icon-box light">
            <div class="icon">
              <i class="flaticon-008-team"></i>
            </div>
            <div class="service-text">
              <h2>SMART MARKETING</h2>
              <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
            </div>
          </div>
        </div>
      @else
        <div class="col-md-4 col-sm-4 features">
          @foreach ($primed_services->chunk(3)->first() as $primed_service)
            <div class="icon-box light left">
              <div class="service-text">
                <h2>{{$primed_service->title}}</h2>
                <p>{{$primed_service->description}}</p>
              </div>
              <div class="icon">
                <i class="{{$primed_service->icon}}"></i>
              </div>
            </div> 
          @endforeach
        </div>

        <!-- Devices -->
        <div class="col-md-4 col-sm-4 devices">
          <div class="text-center">
            <img src="img/device.png" alt="">
          </div>
        </div>

        <div class="col-md-4 col-sm-4 features">
          @foreach ($primed_services->chunk(3)->last() as $primed_service)
            <div class="icon-box light">
              <div class="icon">
                <i class="{{$primed_service->icon}}"></i>
              </div>
              <div class="service-text">
                <h2>{{$primed_service->title}}</h2>
                <p>{{$primed_service->description}}</p>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
    <div class="text-center mt100">
      <a href="#quick_blogs" class="site-btn">{{$primed_services_title ? $primed_services_title->button : 'Browse'}}</a>
    </div>
  </div>
</div>