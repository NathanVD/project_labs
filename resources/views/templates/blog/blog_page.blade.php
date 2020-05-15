<div class="page-section spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7 blog-posts">
        @if (!$articles || $articles->isEmpty())
          <!-- Post item -->
          <div class="post-item">
            <div class="post-thumbnail">
              <img src="img/blog/blog-2.jpg" alt="">
              <div class="post-date">
                <h2>03</h2>
                <h3>Nov 2017</h3>
              </div>
            </div>
            <div class="post-content">
              <h2 class="post-title">Just a simple blog post</h2>
              <div class="post-meta">
                <a href="">Loredana Papp</a>
                <a href="">Design, Inspiration</a>
                <a href="">2 Comments</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
              <a href="blog-post.html" class="read-more">Read More</a>
            </div>
          </div>
          <!-- Post item -->
          <div class="post-item">
            <div class="post-thumbnail">
              <img src="img/blog/blog-1.jpg" alt="">
              <div class="post-date">
                <h2>03</h2>
                <h3>Nov 2017</h3>
              </div>
            </div>
            <div class="post-content">
              <h2 class="post-title">Just a simple blog post</h2>
              <div class="post-meta">
                <a href="">Loredana Papp</a>
                <a href="">Design, Inspiration</a>
                <a href="">2 Comments</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
              <a href="blog-post.html" class="read-more">Read More</a>
            </div>
          </div>
          <!-- Post item -->
          <div class="post-item">
            <div class="post-thumbnail">
              <img src="img/blog/blog-3.jpg" alt="">
              <div class="post-date">
                <h2>03</h2>
                <h3>Nov 2017</h3>
              </div>
            </div>
            <div class="post-content">
              <h2 class="post-title">Just a simple blog post</h2>
              <div class="post-meta">
                <a href="">Loredana Papp</a>
                <a href="">Design, Inspiration</a>
                <a href="">2 Comments</a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
              <a href="blog-post.html" class="read-more">Read More</a>
            </div>
          </div>
          <!-- Pagination -->
          <div class="page-pagination">
            <a class="active" href="">01.</a>
            <a href="">02.</a>
            <a href="">03.</a>
          </div>
        @else
          @foreach ($articles as $article)
            <div class="post-item">
              <div class="post-thumbnail">
                <img src="{{asset('storage/'.$article->img_path)}}" alt="">
                <div class="post-date">
                  <h2>{{$article->created_at->format('d')}}</h2>
                  <h3>{{$article->created_at->format('M Y')}}</h3>
                </div>
              </div>
              <div class="post-content">
                <h2 class="post-title">{{$article->title}}</h2>
                <div class="post-meta">
                  <a href="">{{$article->category ? $article->category->name : "Pas de catégorie"}}</a>
                  <a href="">{{$article->tags ? $article->tags()->inRandomOrder()->limit(3)->get()->implode('name', ', ') : "Aucun tag"}}</a>
                  <a href="">{{$article->comments->count()}} Commentaires</a>
                </div>
                <p>{{\Illuminate\Support\Str::limit($article->content,315)}}</p>
                <a href="blog_post/{{$article->id}}" class="read-more">Lire la suite</a>
              </div>
            </div>
          @endforeach
          {{ $articles->links('templates.blog.blog_paginator') }}
        @endif
      </div>
      <!-- Sidebar area -->
      <div class="col-md-4 col-sm-5 sidebar">
        <!-- Single widget -->
        <div class="widget-item">
          <form action="#" class="search-form">
            <input type="text" placeholder="Search">
            <button class="search-btn"><i class="flaticon-026-search"></i></button>
          </form>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Categories</h2>
          <ul>
            @if (!$categories || $categories->isEmpty())
              <li><a href="#">Vestibulum maximus</a></li>
              <li><a href="#">Nisi eu lobortis pharetra</a></li>
              <li><a href="#">Orci quam accumsan </a></li>
              <li><a href="#">Auguen pharetra massa</a></li>
              <li><a href="#">Tellus ut nulla</a></li>
              <li><a href="#">Etiam egestas viverra </a></li>
            @else
              @foreach ($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>
              @endforeach
            @endif
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Instagram</h2>
          <ul class="instagram">
            <li><img src="img/instagram/1.jpg" alt=""></li>
            <li><img src="img/instagram/2.jpg" alt=""></li>
            <li><img src="img/instagram/3.jpg" alt=""></li>
            <li><img src="img/instagram/4.jpg" alt=""></li>
            <li><img src="img/instagram/5.jpg" alt=""></li>
            <li><img src="img/instagram/6.jpg" alt=""></li>
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Tags</h2>
          <ul class="tag">
            @if (!$tags || $tags->isEmpty())
              <li><a href="">branding</a></li>
              <li><a href="">identity</a></li>
              <li><a href="">video</a></li>
              <li><a href="">design</a></li>
              <li><a href="">inspiration</a></li>
              <li><a href="">web design</a></li>
              <li><a href="">photography</a></li>
            @else
              @foreach ($tags as $tag)
                <li><a href="">{{$tag->name}}</a></li>
              @endforeach
            @endif
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Quote</h2>
          <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
          </div>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Ad</h2>
          <div class="add">
            <a href=""><img src="img/add.jpg" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>