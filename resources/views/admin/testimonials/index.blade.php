@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

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
                  <div class="mini-frame img-thumbnail rounded-circle">
                    <img src="{{asset('storage/'.$testimonial->profile_picture_path)}}" class="mini" alt="img">
                  </div>
                </td>
                <td class="text-capitalize">{{$testimonial->first_name}}</td>
                <td class="text-capitalize">{{$testimonial->last_name}}</td>
                <td class="text-capitalize">{{$testimonial->job_title}}</td>
                <td>{{$testimonial->testimony}}</td>
                <td class="text-center text-nowrap">
                  <a href="{{route('testimonials.edit',$testimonial->id)}}" class="btn btn-info">
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

@endsection
