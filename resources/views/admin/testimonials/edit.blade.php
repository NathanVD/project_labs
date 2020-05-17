@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  <div class="container">
    <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card card-warning">

        <div class="card-header">
          <h3 class="card-title">Modification d'un témoignage</h3>
        </div>

        <div class="card-body">
          <div class="row">

            <div class="col d-flex align-items-center">
              <div class="form-group">
                <label for="photo">Photo de profil :</label>
                <div class="custom-file">
                  <input type="file" name="photo" id="photo" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('photo') ? " is-invalid" : " is-valid" : "")}}">
                  <label class="custom-file-label" for="photo" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>
            </div>
            
            <div class="col">
              <img src="{{substr( $testimonial->profile_picture_path, 0, 4 ) === "http" ? $testimonial->profile_picture_path : asset('storage/'.$testimonial->profile_picture_path)}}" class="thumbnail img-thumbnail float-right" alt="Current Picture">
            </div>
            
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="prénom">Prénom :</label>
                <input type="text" name="prénom" id="prénom" class="form-control{{($errors->isNotEmpty() ? $errors->first('prénom') ? " is-invalid" : " is-valid" : "")}}" value="{{$testimonial->first_name}}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control{{($errors->isNotEmpty() ? $errors->first('nom') ? " is-invalid" : " is-valid" : "")}}" value="{{$testimonial->last_name}}">
              </div>              
            </div>
          </div>

          <div class="form-group">
            <label for="profession">Profession :</label>
            <input type="text" name="profession" id="profession" class="form-control{{($errors->isNotEmpty() ? $errors->first('profession') ? " is-invalid" : " is-valid" : "")}}" value="{{$testimonial->job_title}}">
          </div>

          <div class="form-group">
            <label for="témoignage">Témoignage :</label>
            <textarea name="témoignage" id="témoignage" class="form-control{{($errors->isNotEmpty() ? $errors->first('témoignage') ? " is-invalid" : " is-valid" : "")}}" rows="4" maxlength="175">{{$testimonial->testimony}}</textarea>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('testimonials.index')}}" class="btn btn-secondary">Annuler</a>
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