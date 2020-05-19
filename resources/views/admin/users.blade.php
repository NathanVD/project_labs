@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Utilisateurs du site</h3>
    </div>

    <div class="card-body table-responsive">

      <table id="users_table" class="table table-hover">

        <thead>
          <tr>
            <th class="text-center text-nowrap">Photo</th>
            <th class="text-center text-nowrap">Nom</th>
            <th class="text-center text-nowrap">Email</th>
            <th class="text-center text-nowrap">Roles</th>
            <th class="text-center text-nowrap">Date d'inscription</th>
          </tr>
        </thead>

        <tbody>
          @if ($users->isEmpty())
              <tr>
                <td colspan="5" class="text-center text-nowrap"><b>Aucun utilisateur inscrit</b></td>
              </tr>
          @else 
            @foreach ($users->sortByDesc('created_at') as $user)
              <tr>
                <th class="text-center text-nowrap">
                  <img src="{{asset('storage/'.$user->photo_path)}}" class="mini rounded-circle" alt="img">
                </th>
                <td class="text-center text-nowrap">{{$user->name}}</td>
                <td class="text-center text-nowrap">{{$user->email}}</td>
                <td class="text-center text-nowrap">
                  <form action="{{route('users.update',$user->id)}}" method="post">
                    @csrf
                    @foreach ($roles as $role)
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="input-{{$user->id.$role->id}}" name='roles[]' value="{{$role->id}}" {{$user->roles()->find($role->id) ? 'checked' : ''}}  {{$role->name === 'Admin' && $admin && $admin->id !== $user->id ? 'disabled' : ''}}>
                        <label class="form-check-label" for="input-{{$user->id.$role->id}}">{{$role->name}}</label>
                      </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </td>
                <td class="text-center text-nowrap">{{$user->created_at ? $user->created_at->format('j M y - H:m') : '/'}}</td>
              </tr>
            @endforeach
          @endif
        </tbody>

      </table>
    </div>    
  </div>

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#users_table').DataTable({
        "order": [], 
      });
    } );
  </script>
@endsection