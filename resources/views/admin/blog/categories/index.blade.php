@extends('adminlte::page')

{{-- @section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop --}}

@section('content')

  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Catégories</h3>
      </div>

      <div class="card-body table-responsive p-0">

        <form action="{{route('categories.store')}}" method="POST" class="m-3">
          @csrf
          <label for="name">Nouvelle catégorie :</label>
          <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom de la catégorie">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Ajouter</button>
            </div>
          </div>
        </form>

        <hr>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nom</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            @if ($categories->isEmpty())
                <tr>
                  <td colspan="2" class="text-center"><b>Aucune catégorie</b></td>
                </tr>
            @else 
              @foreach ($categories as $category)
                <tr>
                  <td class="text-capitalize">{{$category->name}}</td>
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

@endsection