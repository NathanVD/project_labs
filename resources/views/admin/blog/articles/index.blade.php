@extends('adminlte::page')

{{-- @section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop --}}

@section('content')

  <a href="{{route('articles.create')}}" class="btn btn-lg btn-success text-white mb-4">
    <i class="fas fa-feather-alt"></i> Rédiger un article
  </a>

  {{-- Index validés / en attente --}}
    <div class="row">

      <div class="col">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Articles validés</h3>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Catégorie</th>
                  <th>Date de création</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                @if ($articles->where('approved',true)->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center"><b>Aucun article validé</b></td>
                    </tr>
                @else 
                  @foreach ($articles->where('approved',true) as $article)
                    <tr>
                      <td class="text-capitalize">{{$article->title}}</td>
                      <td class="text-capitalize">{{$article->author->name}}</td>
                      <td class="text-capitalize">{{$article->category->name}}</td>
                      <td class="text-capitalize">{{$article->created_at}}</td>
                      <td>
                        <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          <button type="submit" class="btn btn-outline-success border-0">
                            <i class="far fa-check-square"></i>
                          </button>
                        </form>
                      </td>
                      <td class="text-center text-nowrap">
                        <a href="{{route('articles.show',$article->id)}}" class="btn btn-info">
                          <i class="far fa-eye"></i>
                        </a>
                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-info">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('articles.destroy',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>

            </table>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Articles en attente</h3>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Catégorie</th>
                  <th>Date de création</th>
                  <th>Validé ?</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                @if ($articles->where('approved',false)->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center"><b>Aucun article en attente</b></td>
                    </tr>
                @else 
                  @foreach ($articles->where('approved',false) as $article)
                    <tr>
                      <td class="text-capitalize">{{$article->title}}</td>
                      <td class="text-capitalize">{{$article->author->name}}</td>
                      <td class="text-capitalize">{{$article->category->name}}</td>
                      <td class="text-capitalize">{{$article->created_at}}</td>
                      <td>
                        <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          <button type="submit" class="btn btn-outline-secondary border-0">
                            <i class="far fa-square"></i>
                          </button>
                        </form>
                      </td>
                      <td class="text-center text-nowrap">
                        <a href="{{route('articles.show',$article->id)}}" class="btn btn-info">
                          <i class="far fa-eye"></i>
                        </a>
                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-info">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('articles.destroy',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </>
                    </tr>
                  @endforeach
                @endif
              </tbody>

            </table>
          </div>
        </div>
      </div>

    </div>


  {{-- Index fin --}}

@endsection