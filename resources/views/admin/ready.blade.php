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
            <label for="titre">Titre :</label>
            <input name="titre" id="titre" value="{{$ready ? $ready->title : 'Are you ready to stand out?'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre') ? " is-invalid" : " is-valid" : "")}}">
          </div>
          <div class="form-group">
            <label for="sous-titre">Sous-titre :</label>
            <input name="sous-titre" id="sous-titre" value="{{$ready ? $ready->subtitle : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('sous-titre') ? " is-invalid" : " is-valid" : "")}}">
          </div>
          <div class="form-group">
            <label for="bouton">Bouton :</label>
            <input name="bouton" id="bouton" value="{{$ready ? $ready->button : 'parcourir'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('bouton') ? " is-invalid" : " is-valid" : "")}}">
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('ready')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection