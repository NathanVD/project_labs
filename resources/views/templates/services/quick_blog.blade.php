<div class="services-card-section spad" id="quick_blogs">
  <div class="container">
    <div class="row d-flex justify-content-center">
      @if (!$articles || $articles->isEmpty())
        <!-- Single Card -->
        <div class="col-md-4 col-sm-6">
          <div class="sv-card">
            <div class="card-img">
              <img src="img/card-1.jpg" alt="">
            </div>
            <div class="card-text">
              <h2>Get in the lab</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>
        </div>
        <!-- Single Card -->
        <div class="col-md-4 col-sm-6">
          <div class="sv-card">
            <div class="card-img">
              <img src="img/card-2.jpg" alt="">
            </div>
            <div class="card-text">
              <h2>Projects online</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>
        </div>
        <!-- Single Card -->
        <div class="col-md-4 col-sm-12">
          <div class="sv-card">
            <div class="card-img">
              <img src="img/card-3.jpg" alt="">
            </div>
            <div class="card-text">
              <h2>SMART MARKETING</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
            </div>
          </div>
        </div>          
      @else
        @foreach ($articles as $article)
          <div class="col-md-4 col-sm-6">
            <a class="text-dark" href="blog_post/{{$article->id}}">
              <div class="sv-card">
                <div class="card-img">
                  <img src="{{asset('storage/'.$article->img_path)}}" alt="">
                </div>
                <div class="card-text">
                  <h2>{{$article->title}}</h2>
                  <p>{{\Illuminate\Support\Str::limit($article->content,125)}}</p>
                </div>
              </div>              
            </a>
          </div>
        @endforeach
      @endif

    </div>
  </div>
</div>