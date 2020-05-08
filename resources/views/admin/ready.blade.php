@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('ready.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Section "Promotion"</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="title">Titre :</label>
            <input name="title" class="form-control" id="title" value="{{$ready ? $ready->title : 'Are you ready to stand out?'}}" required>
          </div>
          <div class="form-group">
            <label for="subtitle">Sous-titre :</label>
            <input name="subtitle" class="form-control" id="subtitle" value="{{$ready ? $ready->subtitle : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.'}}" required>
          </div>
          <div class="form-group">
            <label for="button">Bouton :</label>
            <input name="button" class="form-control" id="button" value="{{$ready ? $ready->button : 'browse'}}" required>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('admin')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection