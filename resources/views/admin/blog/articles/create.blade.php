@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Nouvel article</h3>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="img">Image :</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="img" id="img">
                  <label class="custom-file-label" for="img" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="category">Catégorie :</label>
                <select class="form-control text-capitalize" name="category" id="category" required>
                  <option value="">-- Choisissez la catégorie de votre article --</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="tags">Tags :</label>
                <select class="form-control" multiple="multiple" name="tags[]" id="tags">
                  <option value="" selected="selected">Sélectionnez des tags ou écrivez pour en créer des nouveaux</option>
                  @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="content">Contenu de l'article :</label>
              <textarea name="content" id="content" class="w-100" rows="20"></textarea>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('articles.index')}}" class="btn btn-secondary">Annuler</a>
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
  $("#tags").select2({
    tags: true
  });
</script>
@stop