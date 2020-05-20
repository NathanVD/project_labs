<div class="page-section spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7 blog-posts">
        <div class="section-title dark">
          <h2>Résultats pour <span>{{$search}}</span></h2>
        </div>
        @if (!$articles || $articles->isEmpty())
          <div class="container">
            <img src="{{asset('storage/img/VIDE.jpg')}}" alt="">
            <p><b>Cette recherche n'a rien donné...</b></p>
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
                  <a href="{{route('cat_search',$article->category->name)}}">{{$article->category ? $article->category->name : "Pas de catégorie"}}</a>
                  <a href="">{{$article->tags ? $article->tags()->inRandomOrder()->limit(3)->get()->implode('name', ', ') : "Aucun tag"}}</a>
                  <a href="">{{$article->comments->count()}} Commentaires</a>
                </div>
                <p>{{\Illuminate\Support\Str::limit($article->content,315)}}</p>
                <a href="/blog_post/{{$article->id}}" class="read-more">Lire la suite</a>
              </div>
            </div>
          @endforeach
          {{ $articles->links('templates.blog.blog_paginator') }}
        @endif
      </div>
      <!-- Sidebar area -->
      <div class="col-md-4 col-sm-5 sidebar">
        @if (Auth::check() && Auth::user()->roles->where('name', 'Editor')->isNotEmpty())
          <div class="widget-item">
            <a href="{{route('articles.create')}}" class="btn btn-lg btn-success text-white mb-4">
              <i class="fas fa-feather-alt"></i> Rédiger un article
            </a>
          </div>
        @endif
        <!-- Single widget -->
        <div class="widget-item">
          <form action="{{route('blog_search')}}" method="GET" class="search-form">
            @csrf
            <input type="text" name="recherche" placeholder="Rechercher">
            <button class="search-btn"><i class="flaticon-026-search"></i></button>
          </form>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Catégories</h2>
          <ul>
            @if (!$categories || $categories->isEmpty())
              <p>Aucune catégorie</p>
            @else
              @foreach ($categories as $category)
                <li><a href="{{route('cat_search',$category->name)}}">{{$category->name}}</a></li>
              @endforeach
            @endif
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Instagram</h2>
          <ul class="instagram">
            <li><img src="{{asset('img/instagram/1.jpg')}}" alt=""></li>
            <li><img src="{{asset('img/instagram/2.jpg')}}" alt=""></li>
            <li><img src="{{asset('img/instagram/3.jpg')}}" alt=""></li>
            <li><img src="{{asset('img/instagram/4.jpg')}}" alt=""></li>
            <li><img src="{{asset('img/instagram/5.jpg')}}" alt=""></li>
            <li><img src="{{asset('img/instagram/6.jpg')}}" alt=""></li>
          </ul>
        </div>
        <!-- Single widget -->
        <div class="widget-item">
          <h2 class="widget-title">Tags</h2>
          <ul class="tag">
            @if (!$tags || $tags->isEmpty())
              <p>Aucun tag</p>
            @else
              @foreach ($tags as $tag)
                <li><a href="{{route('tag_search',$tag->name)}}">{{$tag->name}}</a></li>
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
            <a href=""><img src="{{asset('img/add.jpg')}}" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>