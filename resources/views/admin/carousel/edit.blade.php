@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('carousel.update',$image->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="card card-warning">

        <div class="card-header">
          <h3 class="card-title">Modifier une image de carousel</h3>
        </div>

        <div class="card-body">
          <img src="{{substr( $image->img_path, 0, 4 ) === "http" ? $image->img_path : asset('storage/'.$image->img_path)}}" class="img-fluid mb-2" alt="carousel_item {{$image->id}}">
          <div class="form-group">
            <label for="image">Image :</label>
            <div class="custom-file">
              <input type="file" name="image" id="image" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('image') ? " is-invalid" : " is-valid" : "")}}">
              <label class="custom-file-label" for="image" data-browse="Parcourir">Choisissez une image</label>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('carousel.index')}}" class="btn btn-secondary">Annuler</a>
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