@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  <div class="container">
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Modification d'un témoignage</h3>
      </div>

      <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

          <div class="row">

            <div class="col d-flex align-items-center">
              <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control-file">
              </div>
            </div>
            
            <div class="col">
              <div class="thumbnail-frame img-thumbnail float-right">
                <img src="{{substr( $testimonial->profile_picture_path, 0, 4 ) === "http" ? $testimonial->profile_picture_path : asset('storage/'.$testimonial->profile_picture_path)}}" class="thumbnail" alt="Current Picture">
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Prénom</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{$testimonial->first_name}}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{$testimonial->last_name}}" required>
              </div>              
            </div>
          </div>

          <div class="form-group">
            <label for="job_title">Poste</label>
            <input type="text" name="job_title" id="job_title" class="form-control" value="{{$testimonial->job_title}}" required>
          </div>

          <div class="form-group">
            <label for="quote">Quote</label>
            <textarea name="testimony" id="testimony" class="form-control" rows="4" maxlength="175" required>{{$testimonial->testimony}} </textarea>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{route('testimonials.index')}}" class="btn btn-secondary">Cancel</a>
          </div>
        </div>

      </form>

    </div>
  </div>

@endsection