@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('logo.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('post')
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Logo du site :</h3>
          <p class="card-text"><small>Cette image apparaîtra dans : l'écran de préchargement', la navbar, la bannière de la page d'accueil.</small></p>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="logo">Logo :</label>
            <input type="file" name="logo" id="logo" class="form-control-file" required>
          </div>
          @if ($logo)
            <img src="{{asset('storage/'.$logo->logo_path)}}" class="img-thumbnail w-50" alt="Current Picture">
          @endif
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('logo')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection