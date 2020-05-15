@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-cyan">

      <div class="card-header">
        <h3 class="card-title">Commentaires</h3>

        <div class="card-tools">
          <a href="{{route('articles.show',$article->id)}}" class="btn btn-primary">Retour</a>
        </div>
      </div>

      <div class="card-body" style="height: 800px; overflow: auto;">
        <div class="tab-content" id="myTabContent">
          @foreach ($article->comments->sortByDesc('created_at') as $comment)
            <div class="row">
              <div class="col-10 pl-5">
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('storage/'.$comment->img_path)}}" alt="user image">
                    <span class="username">
                      <a href="#">{{$comment->name}}</a>
                    </span>
                    <span class="description">{{$comment->created_at->format('d M')}}, {{$comment->created_at->format('Y')}} - {{$comment->created_at->format('H:i')}}</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    {{$comment->content}}
                  </p>
                </div>            
              </div>
              <div class="col-2 d-flex justify-content-center">
                <form action="{{route('comments.destroy',$comment->id)}}" method="POST" class="d-inline-block">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-app">
                    <i class="fas fa-trash-alt"></i> Supprimer
                  </button>
                </form>
              </div>
            </div>
            @if (!$loop->last)
              <hr>
            @endif
          @endforeach
        </div>
      </div>
    </div>  
  </div>

@endsection
