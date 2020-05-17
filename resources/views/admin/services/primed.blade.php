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
              <label for="titre_1">Titre <small>(partie 1)</small> :</label>
              <input name="titre_1" id="titre_1" value="{{$title ? $title->title_1 : 'Get in'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_1') ? " is-invalid" : " is-valid" : "")}}">
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label for="surlignement">Surlignement :</label>
              <input name="surlignement" id="surlignement" value="{{$title ? $title->highlight : 'the lab'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('surlignement') ? " is-invalid" : " is-valid" : "")}}">
            </div>
          </div>
          <div class="col-5">
            <div class="form-group">
              <label for="titre_2">Titre <small>(partie 2)</small> :</label>
              <input name="titre_2" id="titre_2" value="{{$title ? $title->title_2 : 'and discover the world'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_2') ? " is-invalid" : " is-valid" : "")}}">
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="bouton">Nom du bouton :</label>
            <input name="bouton" id="bouton" value="{{$title ? $title->button : 'parcourir'}}" class="form-control{{($errors->isNotEmpty() ? $errors->first('bouton') ? " is-invalid" : " is-valid" : "")}}">
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