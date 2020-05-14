@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('articles.index')}}" class="btn btn-primary btn-block mb-3">Retour à l'index</a>
    <div class="row">
      <div class="col-md-4">
        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-app">
          <i class="fas fa-edit"></i> Éditer
        </a>        
      </div>
      <div class="col-md-4">
        <form action="{{route('articles.destroy',$article->id)}}" method="POST" class="d-inline-block">
          @csrf
          @method('delete')
          <button class="btn btn-app">
            <i class="fas fa-trash-alt"></i> Supprimer
          </button>
        </form>
      </div>
      <div class="col-md-4">
        <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
          @csrf
          <button type="submit" class="btn btn-app">
            <i class="{{$article->approved ? 'far fa-check-square text-success' : 'far fa-square'}}"></i> Valider
          </button>
        </form>
      </div>

    </div>
  </div>
  <div class="col-md-9">
    <div class="card card-cyan card-outline">

      <div class="card-header">
        <h3 class="card-title">"{{$article->title}}" <span>par</span> {{$article->author->name}}</h3>
      </div>

      <div class="card-body">
        <div class="single-post">

          <div class="post-thumbnail">

            <img class="img-fluid w-100" src="{{substr( $article->img_path, 0, 4 ) === "http" ? $article->img_path : asset('storage/'.$article->img_path)}}" alt="">
            <div class="post-date">
              <h2>{{$article->created_at->format('d')}}</h2>
              <h3>{{$article->created_at->format('M Y')}}</h3>
            </div>

          </div>

          <div class="post-content">
            <h2 class="post-title">{{$article->title}}</h2>
            <div class="post-meta">
              <a href="">{{$article->category->name}}</a>
              <a href="">{{$tags}}</a>
              <a href="">{{$article->comments->count()}} Comments</a>
            </div>
            <p>
              {!! nl2br(e($article->content)) !!}
            </p>
          </div>
          <!-- Post Author -->
          <div class="author">
            <div class="avatar">
              <img src="{{substr( $article->author->img_path, 0, 4 ) === "http" ? $article->author->img_path : asset('storage/'.$article->author->img_path)}}" alt="">
            </div>
            <div class="author-info">
              <h2>{{$article->author->name}}, <span>Author</span></h2>
              <p>{{$article->author->description}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  

@endsection

{{-- @section('js')
<script>
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  $("#tags").select2({
    tags: true
  });
</script>
@stop --}}