@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('categories.update',$category->id)}}" method="POST">
      @csrf
      @method('put')
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Catégorie</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="name">Nom :</label>
            <input name="name" class="form-control" id="name" value="{{$category->name}}" autofocus>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('categories.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection