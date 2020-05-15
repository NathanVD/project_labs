@extends('adminlte::page')

{{-- @section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop --}}

@section('content')

  <div class="row">
    <div class="col">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Catégories</h3>
        </div>

        <div class="card-body">

          <form action="{{route('categories.store')}}" method="POST" class="m-3">
            @csrf
            <label for="name">Nouvelle catégorie :</label>
            <div class="input-group">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nom de la catégorie" autofocus>
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Ajouter</button>
              </div>
            </div>
          </form>

          <hr>

          <table id="categories_table" class="table table-hover">
            <thead>
              <tr>
                <th class="text-center text-nowrap">Nom</th>
                <th class="text-center text-nowrap">Actions</th>
              </tr>
            </thead>

            <tbody>
              @if ($categories->isEmpty())
                  <tr>
                    <td colspan="2" class="text-center text-nowrap"><b>Aucune catégorie</b></td>
                  </tr>
              @else 
                @foreach ($categories as $category)
                  <tr>
                    <td class="text-center text-nowrap">{{$category->name}}</td>
                    <td class="text-center text-nowrap">
                      <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="d-inline-block">
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
      <div class="card card-indigo">
        <div class="card-header">
          <h3 class="card-title">Tags</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">

          @if ($tags->isEmpty())
            <p class="text-center"><b>Aucun tag</b></p>
          @else 
            <div class="h3">
              @foreach ($tags as $tag)
                <span class="badge badge-pill badge-primary">
                  {{$tag->name}}
                  <form action="{{route('tags.remove',$tag->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button style="all: unset">
                      <i class="fas fa-times"></i>
                    </button>
                  </form>
                </span>
              @endforeach
            </div>
          @endif

        </div>    
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#categories_table').DataTable();
    } );  
  </script>
@endsection