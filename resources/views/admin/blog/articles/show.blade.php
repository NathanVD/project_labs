@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('articles.index')}}" class="btn btn-primary btn-block mb-3">Retour à l'index</a>
    
    <div class="card card-teal card-outline">
      <div class="card-header">
        <h3 class="card-title">Actions</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-2">
        <div class=" row d-flex justify-content-center">
          <div class="col">
            <a href="{{route('articles.edit',$article->id)}}" class="btn btn-app">
              <i class="fas fa-edit"></i> Éditer
            </a>             
          </div>
          <div class="col">
            <form action="{{route('articles.destroy',$article->id)}}" method="POST" class="d-inline-block">
              @csrf
              @method('delete')
              <button class="btn btn-app">
                <i class="fas fa-trash-alt"></i> Supprimer
              </button>
            </form>
          </div>
          <div class="col">
            <a href="{{route('article.comments',$article->id)}}" class="btn btn-app">
              <span class="badge bg-info">{{$article->comments->count()}}</span>
              <i class="far fa-comment-dots"></i> Commentairess
            </a>
          </div>
          <div class="col">
            <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
              @csrf
              <button type="submit" class="btn btn-app">
                <i class="{{$article->approved ? 'far fa-check-square text-success' : 'far fa-square'}}"></i> Valider
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-teal card-outline">
      <div class="card-header">
        <h3 class="card-title">Infos rapides</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-2">
        <strong>Tags</strong>
        <div>
          @if ($article->tags->isEmpty())
              <p>Aucun Tag</p>
          @else
            @foreach ($article->tags as $tag)
              <span class="badge badge-pill badge-primary px-2 py-1 m-1">{{$tag->name}}</span>
            @endforeach  
          @endif
        </div>
        <hr>
        <strong>Catégorie</strong>
        <p>{{$article->category ? $article->category->name : "Supprimée"}}</p>
        <hr>
        <strong>Auteur</strong>
        <p>{{$article->user ? $article->user->name : "Supprimé"}}</p>
      </div>
    </div>

  </div>
  <div class="col-md-9">
    <div class="card card-cyan card-outline">

      <div class="card-header">
        <h3 class="card-title">"{{$article->title}}" <span>par</span> {{$article->user ? $article->user->name : "L'auteur n'existe plus"}}</h3>
      </div>

      <div class="card-body">
        <div class="single-post">

          <div class="post-thumbnail h-100">
            <img class="img-fluid w-100" src="{{asset('storage/'.$article->img_path)}}" alt="">
            <div class="post-date">
              <h2>{{$article->created_at->format('d')}}</h2>
              <h3>{{$article->created_at->format('M Y')}}</h3>
            </div>
          </div>

          <div class="post-content">
            <h2 class="post-title">{{$article->title}}</h2>
            <div class="post-meta">
              <a href="#">{{$article->category ? $article->category->name : "Pas de catégorie"}}</a>
              <a href="#">{{$tags ? $tags : "Aucun tag"}}</a>
              <a href="#">{{$article->comments->count()}} Commentaires</a>
            </div>
            <p>
              {!! nl2br(e($article->content)) !!}
            </p>
          </div>
          <!-- Post Author -->
          <div class="author">
            <div class="avatar">
              <img src="{{asset('storage/'.$article->user->photo_path)}}" alt="">
            </div>
            <div class="author-info">
              <h2>{{$article->user ? $article->user->name : "L'auteur n'existe plus"}}, <span>Auteur</span></h2>
              <p>{{$article->user->description ? $article->user->description : 'Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.'}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection