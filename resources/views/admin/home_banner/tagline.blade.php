@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Slogan de la banière</h3>
      </div>

      <form action="{{route('tagline.update')}}" method="POST">

        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="line">Slogan :</label>
            <input name="line" class="form-control" id="line" value="{{$tagline ? $tagline->line : 'Get your freebie template now!'}}" required>
          </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('admin')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </form>

    </div>
  </div>

@endsection