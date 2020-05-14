@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  {{-- Titre --}}
    <form action="{{route('testimonial.title.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Titre de la section</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="title">Titre :</label>
            <input name="title" class="form-control" id="title" value="{{$title ? $title->title : 'what our clients say'}}" required>
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
  {{-- Titre fin --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Liste des témoignages <a href="{{route('testimonials.create')}}" class="badge bg-success align-top ml-3">Nouveau <i class="fas fa-plus"></i></a></h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover">

          <thead>
            <tr>
              <th>Photo</th>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Poste</th>
              <th>Témoignage</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            @if ($testimonials->isEmpty())
                <tr>
                  <td colspan="6" class="text-center"><b>Aucun témoignage enrégistré</b></td>
                </tr>
            @else 
              @foreach ($testimonials as $testimonial)
                <tr>
                  <td>
                    <img src="{{substr( $testimonial->profile_picture_path, 0, 4 ) === "http" ? $testimonial->profile_picture_path : asset('storage/'.$testimonial->profile_picture_path)}}" class="mini rounded-circle" alt="img">
                  </td>
                  <td class="text-capitalize">{{$testimonial->first_name}}</td>
                  <td class="text-capitalize">{{$testimonial->last_name}}</td>
                  <td class="text-capitalize">{{$testimonial->job_title}}</td>
                  <td>{{$testimonial->testimony}}</td>
                  <td class="text-center text-nowrap">
                    <a href="{{route('testimonials.edit',$testimonial->id)}}" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{route('testimonials.destroy',$testimonial->id)}}" method="POST" class="d-inline-block">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>

        </table>
      </div>
    </div>
  {{-- Index fin --}}

@endsection