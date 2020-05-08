@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('carousel.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Nouvelle image de carousel</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="img">Image :</label>
            <input type="file" name="img" id="img" class="form-control-file" required>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('carousel.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection