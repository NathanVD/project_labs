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
                <label for="titre_1">Titre <small>(partie 1)</small> :</label>
                <input name="titre_1" id="titre_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_1') ? " is-invalid" : " is-valid" : "")}}" value="{{$team_title ? $team_title->title_1 : 'Get in'}}">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="surlignement">Surlignement :</label>
                <input name="surlignement" id="surlignement" class="form-control{{($errors->isNotEmpty() ? $errors->first('surlignement') ? " is-invalid" : " is-valid" : "")}}" value="{{$team_title ? $team_title->highlight : 'the lab'}}">
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="titre_2">Titre <small>(partie 2)</small> :</label>
                <input name="titre_2" id="titre_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_2') ? " is-invalid" : " is-valid" : "")}}" value="{{$team_title ? $team_title->title_2 : 'and meet the team'}}">
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

  {{-- Membre vedette --}}
    <div class="card card-warning card-outline">
      <div class="card-header">
        <h3 class="card-title">Équipier vedette </h3>
      </div>

      <div class="card-body table-responsive">
        <table id="starred_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Photo</th>
              <th class="text-center text-nowrap">Nom</th>
              <th class="text-center text-nowrap">Role</th>
              <th class="text-center text-nowrap">Vedette</th>
            </tr>
          </thead>

          <tbody>
            @if (!$starred)
                <tr>
                  <td colspan="4" class="text-center text-nowrap"><b>Aucun équipier en vedette</b></td>
                </tr>
            @else 
              <tr>
                <td class="text-center text-nowrap">
                  <img src="{{asset('storage/'.$starred->pic_path)}}" class="mini rounded-circle" alt="img">
                </td>
                <td class="text-center text-nowrap">{{$starred->name}}</td>
                <td class="text-center text-nowrap">{{$starred->roles}}</td>
                <td class="text-center text-nowrap">
                  <form action="{{route('team.starred_member.remove')}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-warning border-0">
                      <i class="fas fa-star"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  {{-- Starred member end --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Liste des membres de l'équipe</h3>
      </div>

      <div class="card-body table-responsive">
        <table id="team_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Photo</th>
              <th class="text-center text-nowrap">Nom</th>
              <th class="text-center text-nowrap">Role</th>
              <th class="text-center text-nowrap">Vedette ?</th>
            </tr>
          </thead>

          <tbody>
            @if (!$team || $team->isEmpty())
                <tr>
                  <td colspan="4" class="text-center text-nowrap"><b>Aucun membre dans l'équipe</b></td>
                </tr>
            @else 
              @foreach ($team->sortBy('name') as $team_member)
                <tr>
                  <td class="text-center text-nowrap">
                    <img src="{{asset('storage/'.$team_member->photo_path)}}" class="mini rounded-circle" alt="img">
                  </td>
                  <td class="text-center text-nowrap">{{$team_member->name}}</td>
                  <td class="text-center text-nowrap">{{$team_member->roles()->get()->implode('name', ', ')}}</td>
                  <td class="text-center text-nowrap">
                    @if ($starred && $team_member->id === $starred->member_id)
                      <form action="{{route('team.starred_member.remove')}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-warning border-0">
                          <i class="fas fa-star"></i>
                        </button>
                      </form>
                    @else
                      <form action="{{route('team.starred_member.update',$team_member->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        <button class="btn btn-outline-warning border-0">
                          <i class="far fa-star"></i>
                        </button>
                      </form>
                    @endif
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

@section('js')
  <script>
    $(document).ready( function () {
      $('#team_table').DataTable({
        "order": [], 
      });
    } );
  </script>
@endsection