<div class="about-section">
  
  <div class="overlay"></div>

  <!-- services rapides -->
  <div class="card-section">
    <div class="container">
      <div class="row d-flex justify-content-center">
        @if ($services_chunks->isEmpty())
          <!-- single card -->
          <div class="col-md-4 col-sm-6">
            <div class="lab-card">
              <div class="icon">
                <i class="flaticon-023-flask"></i>
              </div>
              <h2>Get in the lab</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>

          <!-- single card -->
          <div class="col-md-4 col-sm-6">
            <div class="lab-card">
              <div class="icon">
                <i class="flaticon-011-compass"></i>
              </div>
              <h2>Projects online</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>

          <!-- single card -->
          <div class="col-md-4 col-sm-12">
            <div class="lab-card">
              <div class="icon">
                <i class="flaticon-037-idea"></i>
              </div>
              <h2>SMART MARKETING</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>
        @else
          @foreach ($services_chunks->first()->chunk(3)->first() as $quick_service)
            <div class="col-md-4 col-sm-12">
              <div class="lab-card">
                <div class="icon">
                  <i class="{{$quick_service->icon}}"></i>
                </div>
                <h2>{{$quick_service->title}}</h2>
                <p>{{$quick_service->description}}</p>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
  <!-- services rapides end-->

  <div class="about-contant">
    <div class="container">

      <!-- présentation -->
      <div class="section-title">
        @if (!$about)
          <h2>Get in <span>the Lab</span> and discover the world</h2>
        @else
          @if ($about->highlight)
            <h2>{{$about->title_1}} <span>{{$about->highlight}}</span> {{$about->title_2}}</h2>
          @else
            <h2>{{$about->title_1}} {{$about->title_2}}</h2>
          @endif
        @endif
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>{{$about ? $about->col_1 : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.'}}</p>
        </div>
        <div class="col-md-6">
          <p>{{$about ? $about->col_2 : 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.'}}</p>
        </div>
      </div>
      <div class="text-center mt60">
        <a href="#contact_form" class="site-btn">{{$about ? $about->button : 'browse'}}</a>
      </div>
      <!-- présentation end -->

      <!-- video -->
      <div class="intro-video">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <img src="{{$video ? $video->img_path === 'img/video.jpg' ? asset($video->img_path) : asset('storage/'.$video->img_path) : 'img/video.jpg'}}" alt="">
            <a href="{{$video ? $video->video_link : 'https://www.youtube.com/watch?v=JgHfx2v9zOU'}}" class="video-popup">
              <i class="fas fa-play"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- video end -->

    </div>
  </div>

</div>