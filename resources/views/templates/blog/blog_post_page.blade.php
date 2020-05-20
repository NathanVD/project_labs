@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
@endif

<div class="page-section spad">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7 blog-posts">
        <!-- Single Post -->
        <div class="single-post">
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
              <a href="">{{$article->tags->isNotEmpty() ? $article->tags()->inRandomOrder()->limit(3)->get()->implode('name', ', ') : "Aucun tag"}}</a>
              <a href="">{{$article->comments->count()}} Commentaires</a>
            </div>
            <p>{!! nl2br(e($article->content)) !!}</p>
          </div>
          <!-- Post Author -->
          <div class="author">
            <div class="avatar">
              <img src="{{asset('storage/'.$article->user->photo_path)}}" alt="">
            </div>
            <div class="author-info">
              <h2><a href="{{route('author_search',$article->user->name)}}">{{$article->user ? $article->user->name : "L'auteur n'existe plus"}}</a>, <span>Auteur</span></h2>
              <p>{{$article->user->description}}</p>
            </div>
          </div>
          <!-- Post Comments -->
          <div class="comments">
            <h2>Commentaires ({{$article->comments->count()}})</h2>
            <ul class="comment-list">
              @foreach ($article->comments->sortByDesc('created_at') as $comment)
                <li>
                  <div class="avatar">
                    {{-- <img src="{{asset('img/avatar/01.jpg')}}" alt=""> --}}
                    <img src="{{asset('storage/'.$comment->img_path)}}" alt="">
                  </div>
                  <div class="commetn-text">
                    <h3>{{$comment->name}} | {{$comment->created_at->format('d M')}}, {{$comment->created_at->format('Y')}} | {{$comment->created_at->format('H:i')}}</h3>
                    <p>{!! nl2br(e($comment->content)) !!}</p>
                  </div>
                </li>                  
              @endforeach
            </ul>
          </div>
          @if (Auth::check())
            <!-- Commert Form -->
            <div class="row">
              <div class="col-md-9 comment-from">
                <h2>Laissez un commentaire</h2>
                <form class="form-class" action="{{route('comments.addComment',$article->id)}}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" name="nom" placeholder="Votre nom" value="{{Auth::check() ? Auth::user()->name : ''}}" {{Auth::check() ? 'readonly' : ''}} class="{{($errors->isNotEmpty() ? $errors->first('nom') ? " is-invalid" : " is-valid" : "")}}">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="email" placeholder="Votre email" value="{{Auth::check() ? Auth::user()->email : ''}}" {{Auth::check() ? 'readonly' : ''}} class="{{($errors->isNotEmpty() ? $errors->first('email') ? " is-invalid" : " is-valid" : "")}}">
                    </div>
                    <div class="col-sm-12">
                      <textarea name="contenu" placeholder="Message" class="{{($errors->isNotEmpty() ? $errors->first('contenu') ? " is-invalid" : " is-valid" : "")}}"></textarea>
                      <button class="site-btn">Envoyer</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          @else
            <div class="row text-center">
              <p><strong>Connectez-vous pour laisser un commentaire.</strong></p>
            </div>
          @endif
        </div>
      </div>
      <!-- Sidebar area -->
      <div class="col-md-4 col-sm-5 sidebar">
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
          <h2 class="widget-title">Categories</h2>
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
          <h2 class="widget-title">Add</h2>
          <div class="add">
            <a href=""><img src="{{asset('img/add.jpg')}}" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>