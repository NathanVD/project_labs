@extends('adminlte::page')

@section('content')
  <form action="{{route('services.primed.update')}}" method="POST">
    @csrf
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Section Services Primés</h3>
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
              <input name="title_1" class="form-control" id="title_1" value="{{$title ? $title->title_1 : 'Get in'}}">
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label for="highlight">Surlignement :</label>
              <input name="highlight" class="form-control" id="highlight" value="{{$title ? $title->highlight : 'the lab'}}">
            </div>
          </div>
          <div class="col-5">
            <div class="form-group">
              <label for="title_2">Titre <small>(partie 2)</small> :</label>
              <input name="title_2" class="form-control" id="title_2" value="{{$title ? $title->title_2 : 'and discover the world'}}">
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="button">Nom du bouton :</label>
            <input name="button" class="form-control" id="button" value="{{$title ? $title->button : 'browse'}}">
          </div>
      </div>

      <div class="card-footer">
        <div class="btn-group">
          <button type="submit" class="btn btn-success">Valider</button>
          <a href="{{route('services.primed')}}" class="btn btn-secondary">Annuler</a>
        </div>
      </div>

    </div>
  </form>
@endsection