@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Utilisateurs du site</h3>
      </div>

      <div class="card-body">

        <table id="users_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Nom</th>
              <th class="text-center text-nowrap">Email</th>
              <th class="text-center text-nowrap" colspan="4">Roles</th>
            </tr>
          </thead>

          <tbody>
            @if ($users->isEmpty())
                <tr>
                  <td colspan="5" class="text-center text-nowrap"><b>Aucun utilisateur inscrit</b></td>
                </tr>
            @else 
              @foreach ($users->sortBy('created_at') as $user)
                <tr>
                  <td class="text-center text-nowrap">{{$user->name}}</td>
                  <td class="text-center text-nowrap">{{$user->email}}</td>
                  <td class="text-center text-nowrap" colspan="4">
                    <form action="{{route('users.update',$user->id)}}" method="post">
                      @csrf
                      @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="{{$role->id}}" name='roles[]' value="{{$role->id}}" {{$user->roles()->find($role->id) ? 'checked' : ''}}>
                          <label class="form-check-label" for="{{$role->id}}">{{$role->name}}</label>
                        </div>
                      @endforeach
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>

        </table>
      </div>    
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