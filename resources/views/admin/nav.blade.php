@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('nav.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Nom des pages</h3>
          <p class="card-text"><small>Ces noms apparaitront dans : les liens de la navbar, les bannières des pages.</small></p>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="page_1">Page 1 :</label>
            <input name="page_1" class="form-control" id="page_1" value="{{$links ? $links->link_1 : 'Home'}}">
          </div>
          <div class="form-group">
            <label for="page_2">Page 2 :</label>
            <input name="page_2" class="form-control" id="page_2" value="{{$links ? $links->link_2 : 'Services'}}">
          </div>
          <div class="form-group">
            <label for="page_3">Page 3 :</label>
            <input name="page_3" class="form-control" id="page_3" value="{{$links ? $links->link_3 : 'Blog'}}">
          </div>
          <div class="form-group">
            <label for="page_4">Page 4 :</label>
            <input name="page_4" class="form-control" id="page_4" value="{{$links ? $links->link_4 : 'Contact'}}">
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