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

          <div class="card-body">
            <table id="articles_1_table" class="table table-hover">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Catégorie</th>
                  <th>Commentaires</th>
                  <th>Date de création</th>
                  <th>Validé ?</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                @if (!$articles || $articles->where('approved',true)->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center"><b>Aucun article validé</b></td>
                    </tr>
                @else 
                  @foreach ($articles->where('approved',true)->sortByDesc('updated_at') as $article)
                    <tr>
                      <td class="text-capitalize">{{$article->title}}</td>
                      <td class="text-capitalize">{{$article->author ? $article->author->name : "Auteur supprimé"}}</td>
                      <td class="text-capitalize">{{$article->category ? $article->category->name : "Pas de catégorie"}}</td>
                      <td class="text-center text-nowrap">{{$article->comments->count()}}</td>
                      <td class="text-center text-nowrap">{{$article->created_at->format('d M Y')}}</td>
                      <td class="text-center text-nowrap">
                        <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          <button type="submit" class="btn btn-outline border-0">
                            <i class="far fa-check-square fa-lg text-success"></i>
                          </button>
                        </form>
                      </td>
                      <td class="text-center text-nowrap">
                        <a href="{{route('articles.show',$article->id)}}" class="btn btn-info">
                          <i class="far fa-eye"></i>
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

          <div class="card-body">
            <table id="articles_2_table" class="table table-hover">
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
                @if (!$articles || $articles->where('approved',false)->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center"><b>Aucun article en attente</b></td>
                    </tr>
                @else 
                  @foreach ($articles->where('approved',false) as $article)
                    <tr>
                      <td class="text-capitalize">{{$article->title}}</td>
                      <td class="text-capitalize">{{$article->author ? $article->author->name : "Supprimé"}}</td>
                      <td class="text-capitalize">{{$article->category ? $article->category->name : "Supprimée"}}</td>
                      <td class="text-capitalize">{{$article->created_at->format('d M Y')}}</td>
                      <td class="text-center">
                        <form action="{{route('article.approve',$article->id)}}" method="POST" class="d-inline-block">
                          @csrf
                          <button type="submit" class="btn btn-outline border-0">
                            <i class="far fa-square fa-lg text-secondary"></i>
                          </button>
                        </form>
                      </td>
                      <td class="text-center text-nowrap">
                        <a href="{{route('articles.show',$article->id)}}" class="btn btn-info">
                          <i class="far fa-eye"></i>
                        </a>
                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning">
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

    </div>


  {{-- Index fin --}}

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#articles_1_table').DataTable();
      $('#articles_2_table').DataTable();
    } );  
  </script>
@endsection