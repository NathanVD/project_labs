@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-info">

      <div class="card-header">
        <h3 class="card-title">Vidéo</h3>
      </div>

      <form action="{{route('video.update')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('post')

        <div class="card-body">

          @if ($video)
            <div class="d-flex flex-column">
              <b>Miniature actuelle :</b>
              <img src="{{$video->img_path === 'img/video.jpg' ? asset($video->img_path) : asset('storage/'.$video->img_path)}}" class="img-thumbnail w-50" alt="Current Picture">
            </div>
          @endif

          <div class="form-group">
            <label for="miniature">Miniature :</label>
            <input type="file" name="miniature" class="form-control-file" id="miniature">
          </div>

          <div class="form-group">
            <label for="video">Lien de la vidéo :</label>
            <input name="video" class="form-control" id="video" value="{{$video ? $video->video_link : 'https://www.youtube.com/watch?v=JgHfx2v9zOU'}}" required>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('admin')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </form>

    </div>
  </div>

@endsection