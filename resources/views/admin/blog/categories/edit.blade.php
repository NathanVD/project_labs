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
            <label for="nom">Nom :</label>
            <input name="nom" class="form-control{{($errors->isNotEmpty() ? $errors->first('nom') ? " is-invalid" : " is-valid" : "")}}" id="nom" value="{{$category->name}}" autofocus>
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