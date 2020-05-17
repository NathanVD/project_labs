@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')

  {{-- Slogan --}}
    <form action="{{route('carousel.tagline.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Slogan de la banière</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="slogan">Slogan :</label>
            <input name="slogan" class="form-control{{($errors->isNotEmpty() ? $errors->first('slogan') ? " is-invalid" : " is-valid" : "")}}" id="slogan" value="{{$tagline ? $tagline->line : ''}}">
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
  {{-- Slogan fin --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Images du carousel <a href="{{route('carousel.create')}}" class="badge bg-success align-top ml-3">Ajouter une image <i class="fas fa-plus"></i></a></h3>
      </div>

      <div class="card-body">
        <div class="row">
          @if (!$carousels || $carousels->isEmpty())
             <p class="text-center w-100"><b>Aucune image dans le carousel.</b></p> 
          @else
            @foreach ($carousels->sortByDesc('created_at') as $image)
              <div class="col-sm-2 position-relative">

                <img src="{{substr( $image->img_path, 0, 4 ) === "http" ? $image->img_path : asset('storage/'.$image->img_path)}}" class="img-fluid mb-2" alt="carousel_item {{$image->id}}">

                <div class="carousel_list_actions">
                  <a href="{{route('carousel.edit',$image->id)}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{route('carousel.destroy',$image->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form> 
                </div>

              </div>
            @endforeach              
          @endif

        </div>
      </div>
    </div>
  {{-- Index fin --}}

@endsection