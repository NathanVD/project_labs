@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('about.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Présentation</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="form-group">
                <label for="line">Titre <small>(partie 1)</small> :</label>
                <input name="title_1" class="form-control" id="title_1" value="{{$about ? $about->title_1 : 'Get in'}}">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="line">Surlignement :</label>
                <input name="highlight" class="form-control" id="highlight" value="{{$about ? $about->highlight : 'the lab'}}">
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="title_2">Titre <small>(partie 2)</small> :</label>
                <input name="title_2" class="form-control" id="title_2" value="{{$about ? $about->title_2 : 'and discover the world'}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="col_1">Colonne 1 :</label>
                <textarea name="col_1" class="form-control" id="col_1" rows="5" required>{{$about ? $about->col_1 : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.'}}</textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="col_2">Colonne 2 :</label>
                <textarea name="col_2" class="form-control" id="col_2" rows="5" required>{{$about ? $about->col_2 : 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.'}}</textarea>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="button">Bouton :</label>
            <input name="button" class="form-control" id="button" value="{{$about ? $about->button : 'browse'}}" required>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('admin')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>


      </div>
    </form>
  </div>

@endsection