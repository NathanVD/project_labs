@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Nouveau membre</h3>
        </div>

        <div class="card-body">

          <div class="form-group">
            <div class="form-group">
              <label for="photo">Photo :</label>
              <div class="custom-file">
                <input type="file" name="photo" id="photo" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('photo') ? " is-invalid" : " is-valid" : "")}}">
                <label class="custom-file-label" for="photo" data-browse="Parcourir">Choisissez une image</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="prénom">Prénom :</label>
            <input type="text" name="prénom" id="prénom" class="form-control{{($errors->isNotEmpty() ? $errors->first('prénom') ? " is-invalid" : " is-valid" : "")}}">
          </div>

          <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control{{($errors->isNotEmpty() ? $errors->first('nom') ? " is-invalid" : " is-valid" : "")}}">
          </div>

          <div class="form-group">
            <label for="role">Poste :</label>
            <input type="text" name="role" id="role" class="form-control{{($errors->isNotEmpty() ? $errors->first('role') ? " is-invalid" : " is-valid" : "")}}">
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
  </div>

@endsection

@section('js')
  <script>
    $(document).ready(function () {
      bsCustomFileInput.init()
    });
  </script>
@stop