@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('video.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('post')
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Vidéo</h3>
        </div>

        <div class="card-body">

          @if ($video)
            <div class="d-flex flex-column">
              <b>Miniature actuelle</b>
              <img src="{{$video->img_path === 'img/video.jpg' ? asset($video->img_path) : asset('storage/'.$video->img_path)}}" class="img-thumbnail w-50" alt="Current Picture">
            </div>
          @endif

          <div class="form-group">
            <label for="miniature">Miniature :</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="miniature" id="miniature">
              <label class="custom-file-label" for="miniature" data-browse="Parcourir">Choisissez une image</label>
            </div>
          </div>

          <div class="form-group">
            <label for="video">Lien de la vidéo :</label>
            <input name="video" class="form-control" id="video" value="{{$video ? $video->video_link : 'https://www.youtube.com/watch?v=JgHfx2v9zOU'}}" required>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('video')}}" class="btn btn-secondary">Annuler</a>
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