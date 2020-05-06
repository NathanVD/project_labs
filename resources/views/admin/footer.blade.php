@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Footer</h3>
      </div>

      <form action="{{route('footer.update')}}" method="POST">

        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="line">Ligne :</label>
            <input name="line" class="form-control" id="line" value="{{$footer ? $footer->line : '2017 All rights reserved.'}}" required>
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