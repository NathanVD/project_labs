@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="card card-warning">

        <div class="card-header">
          <h3 class="card-title">Modifier un article</h3>
        </div>

        <div class="card-body">
          <div class="d-flex flex-column align-items-center w-100 mb-3">
            <label for="">Image actuelle :</label>
            <img src="{{asset('storage/'.$article->img_path)}}" class="w-50 img-thumbnail" alt="article header">            
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre') ? " is-invalid" : " is-valid" : "")}}" value="{{$article->title}}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="image">Image :</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input{{($errors->isNotEmpty() ? $errors->first('image') ? " is-invalid" : " is-valid" : "")}}" name="image" id="image">
                  <label class="custom-file-label" for="image" data-browse="Parcourir">Choisissez une image</label>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="catégorie">Catégorie :</label>
                <select name="catégorie" id="catégorie" class="form-control{{($errors->isNotEmpty() ? $errors->first('catégorie') ? " is-invalid" : " is-valid" : "")}}">
                  <option value="">-- Choisissez la catégorie de votre article --</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$article->category ? $article->category->id === $category->id ? 'selected' : '' : ''}}>{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="tags">Tags :</label>
                <select multiple="multiple" name="tags[]" id="tags" class="form-control{{($errors->isNotEmpty() ? $errors->first('tags') ? " is-invalid" : " is-valid" : "")}}">
                  @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" {{$article->tags->contains('id',$tag->id) ? 'selected' : ''}}>{{$tag->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="contenu">Contenu de l'article :</label>
              <textarea name="contenu" id="contenu" rows="20" class="w-100{{($errors->isNotEmpty() ? $errors->first('contenu') ? " is-invalid" : " is-valid" : "")}}">{{$article->content}}</textarea>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{url()->previous()}}" class="btn btn-secondary">Annuler</a>
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