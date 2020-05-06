@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="card card-success">

            <div class="card-header">
                <h3 class="card-title">Modifier une image de carousel</h3>
            </div>

            <form action="{{route('home_banner.update',$image->id)}}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <img src="{{asset('storage/'.$image->img_path)}}" class="img-fluid mb-2" alt="carousel_item {{$image->id}}">

                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" id="img" class="form-control-file" required>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <a href="{{route('home_banner.index')}}" class="btn btn-secondary">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection