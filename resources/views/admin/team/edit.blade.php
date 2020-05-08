@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  <div class="container">
    <form action="{{route('team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Modification d'un membre de l'équipe</h3>
        </div>

        <div class="card-body">
          <div class="row">

            <div class="col d-flex align-items-center">
              <div class="form-group">
                <label for="picture">Photo :</label>
                <input type="file" name="picture" id="picture" class="form-control-file">
              </div>
            </div>
            
            <div class="col">
                <img src="{{substr( $team->pic_path, 0, 4 ) === "http" ? $team->pic_path : asset('storage/'.$team->pic_path)}}" class="img-thumbnail" alt="Current Picture">
            </div>
            
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Prénom :</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{$team->first_name}}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{$team->last_name}}" required>
              </div>              
            </div>
          </div>

          <div class="form-group">
            <label for="role">Poste :</label>
            <input type="text" name="role" id="role" class="form-control" value="{{$team->role}}">
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('team.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection