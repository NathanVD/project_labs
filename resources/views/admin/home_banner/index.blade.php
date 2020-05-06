@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Images du carousel <a href="{{route('home_banner.create')}}" class="badge bg-success align-top ml-3">Ajouter une image <i class="fas fa-plus"></i></a></h3>

        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($carousels as $image)
                    <div class="col-sm-2 position-relative">

                        <img src="{{asset('storage/'.$image->img_path)}}" class="img-fluid mb-2" alt="carousel_item {{$image->id}}">

                        <div class="carousel_list_actions">
                            <a href="{{route('home_banner.edit',$image->id)}}" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('home_banner.destroy',$image->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                            </form> 
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection