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
                <label for="titre_1">Titre <small>(partie 1)</small> :</label>
                <input name="titre_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_1') ? " is-invalid" : " is-valid" : "")}}" id="titre_1" value="{{$about ? $about->title_1 : ''}}">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="surlignement">Surlignement :</label>
                <input name="surlignement" class="form-control{{($errors->isNotEmpty() ? $errors->first('surlignement') ? " is-invalid" : " is-valid" : "")}}" id="surlignement" value="{{$about ? $about->highlight : ''}}">
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="titre_2">Titre <small>(partie 2)</small> :</label>
                <input name="titre_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre_2') ? " is-invalid" : " is-valid" : "")}}" id="titre_2" value="{{$about ? $about->title_2 : ''}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="colonne_1">Colonne 1 :</label>
                <textarea name="colonne_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('colonne_1') ? " is-invalid" : " is-valid" : "")}}" id="colonne_1" rows="5">{{$about ? $about->col_1 : ''}}</textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="colonne_2">Colonne 2 :</label>
                <textarea name="colonne_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('colonne_2') ? " is-invalid" : " is-valid" : "")}}" id="colonne_2" rows="5">{{$about ? $about->col_2 : ''}}</textarea>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="bouton">Bouton :</label>
            <input name="bouton" class="form-control{{($errors->isNotEmpty() ? $errors->first('bouton') ? " is-invalid" : " is-valid" : "")}}" id="bouton" value="{{$about ? $about->button : ''}}">
          </div>

          <div class="custom-control custom-switch">
            @if ($about)
              <input type="checkbox" class="custom-control-input" id="bouton_visible" name="bouton_visible" {{$about->button_visible ? 'checked' : ''}}>
            @else
              <input type="checkbox" class="custom-control-input" id="bouton_visible" name="bouton_visible" checked>
            @endif
            <label class="custom-control-label" for="bouton_visible">Rendre le bouton visible</label>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('about')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>


      </div>
    </form>
  </div>

@endsection