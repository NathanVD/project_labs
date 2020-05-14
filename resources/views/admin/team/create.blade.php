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
              <label for="picture">Photo :</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="picture" id="picture">
                <label class="custom-file-label" for="picture" data-browse="Parcourir">Choisissez une image</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="role">Poste :</label>
            <input type="text" name="role" id="role" class="form-control">
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