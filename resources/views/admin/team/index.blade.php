@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  {{-- Titre --}}
    <form action="{{route('team.title.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Titre de la section</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="form-group">
                <label for="line">Titre <small>(partie 1)</small> :</label>
                <input name="title_1" class="form-control" id="title_1" value="{{$team_title ? $team_title->title_1 : 'Get in'}}">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="line">Surlignement :</label>
                <input name="highlight" class="form-control" id="highlight" value="{{$team_title ? $team_title->highlight : 'the lab'}}">
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="title_2">Titre <small>(partie 2)</small> :</label>
                <input name="title_2" class="form-control" id="title_2" value="{{$team_title ? $team_title->title_2 : 'and meet the team'}}">
              </div>
            </div>
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
  {{-- Titre fin --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Liste des membres de l'équipe <a href="{{route('team.create')}}" class="badge bg-success align-top ml-3">Nouveau <i class="fas fa-plus"></i></a></h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover">

          <thead>
            <tr>
              <th>Photo</th>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Poste</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            @if ($team->isEmpty())
                <tr>
                  <td colspan="6" class="text-center"><b>Aucun membre dans l'équipe</b></td>
                </tr>
            @else 
              @foreach ($team as $team_member)
                <tr>
                  <td>
                    <img src="{{substr( $team_member->pic_path, 0, 4 ) === "http" ? $team_member->pic_path : asset('storage/'.$team_member->pic_path)}}" class="mini rounded-circle" alt="img">
                  </td>
                  <td class="text-capitalize">{{$team_member->first_name}}</td>
                  <td class="text-capitalize">{{$team_member->last_name}}</td>
                  <td class="text-capitalize">{{$team_member->role}}</td>
                  <td class="text-center text-nowrap">
                    <a href="{{route('team.edit',$team_member->id)}}" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{route('team.destroy',$team_member->id)}}" method="POST" class="d-inline-block">
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
  {{-- Index fin --}}

@endsection