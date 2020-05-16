@extends('adminlte::page')

@section('content')

  <a href="{{route('articles.create')}}" class="btn btn-lg btn-success text-white mb-4">
    <i class="fas fa-feather-alt"></i> Rédiger un article
  </a>

  {{-- Index validés / en attente --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Articles validés</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <table id="articles_1_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Titre</th>
              <th class="text-center text-nowrap">Catégorie</th>
              <th class="text-center text-nowrap">Auteur</th>
              <th class="text-center text-nowrap">Commentaires</th>
              <th class="text-center text-nowrap">Date de création</th>
              <th class="text-center text-nowrap">Validé ?</th>
              <th class="text-center text-nowrap">Actions</th>
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
                  <td class="text-center text-nowrap">{{$article->title}}</td>
                  <td class="text-center">{{$article->category ? $article->category->name : "Pas de catégorie"}}</td>
                  <td class="text-center">{{$article->author ? $article->author->name : "Auteur supprimé"}}</td>
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

    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Articles en attente</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <table id="articles_2_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Titre</th>
              <th class="text-center text-nowrap">Catégorie</th>
              <th class="text-center text-nowrap">Auteur</th>
              <th class="text-center text-nowrap">Date de création</th>
              <th class="text-center text-nowrap">Validé ?</th>
              <th class="text-center text-nowrap">Actions</th>
            </tr>
          </thead>

          <tbody>
            @if (!$articles || $articles->where('approved',false)->isEmpty())
                <tr>
                  <td colspan="6" class="text-center text-nowrap"><b>Aucun article en attente</b></td>
                </tr>
            @else 
              @foreach ($articles->where('approved',false)->sortByDesc('created_at') as $article)
                <tr>
                  <td class="text-center text-nowrap">{{$article->title}}</td>
                  <td class="text-center">{{$article->category ? $article->category->name : "Supprimée"}}</td>
                  <td class="text-center">{{$article->author ? $article->author->name : "Supprimé"}}</td>
                  <td class="text-center text-nowrap">{{$article->created_at->format('d M Y')}}</td>
                  <td class="text-center text-nowrap">
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
  {{-- Index fin --}}

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#articles_1_table').DataTable({
        "order": [], 
      });
    } );
    $(document).ready( function () {
      $('#articles_2_table').DataTable({
        "order": [], 
      });
    } );
  </script>
@endsection