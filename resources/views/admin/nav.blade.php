@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('nav.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Noms des pages</h3>
          <p class="card-text"><small>Ces noms apparaitront dans : les liens de la navbar, les bannières des pages.</small></p>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="link_1">Section 1 :</label>
            <input name="link_1" class="form-control" id="link_1" value="{{$links ? $links->link_1 : 'Home'}}" required>
          </div>
          <div class="form-group">
            <label for="link_2">Section 2 :</label>
            <input name="link_2" class="form-control" id="link_2" value="{{$links ? $links->link_2 : 'Services'}}" required>
          </div>
          <div class="form-group">
            <label for="link_3">Section 3 :</label>
            <input name="link_3" class="form-control" id="link_3" value="{{$links ? $links->link_3 : 'Blog'}}" required>
          </div>
          <div class="form-group">
            <label for="link_4">Section 4 :</label>
            <input name="link_4" class="form-control" id="link_4" value="{{$links ? $links->link_4 : 'Contact'}}" required>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('nav')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection