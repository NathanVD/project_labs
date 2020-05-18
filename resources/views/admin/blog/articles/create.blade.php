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
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre') ? " is-invalid" : " is-valid" : "")}}">
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
                <select class="form-control text-capitalize{{($errors->isNotEmpty() ? $errors->first('catégorie') ? " is-invalid" : " is-valid" : "")}}" name="catégorie" id="catégorie">
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
                <select class="form-control{{($errors->isNotEmpty() ? $errors->first('tags') ? " is-invalid" : " is-valid" : "")}}" multiple="multiple" name="tags[]" id="tags">
                  <option value="" selected="selected">Sélectionnez des tags ou écrivez pour en créer des nouveaux</option>
                  @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="contenu">Contenu de l'article :</label>
              <textarea name="contenu" id="contenu" class="form-control w-100{{($errors->isNotEmpty() ? $errors->first('contenu') ? " is-invalid" : " is-valid" : "")}}" rows="20"></textarea>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            @if (Auth::check() && Auth::user()->roles->where('name', 'Editor')->isNotEmpty())
              <a href="/blog" class="btn btn-secondary">Annuler</a>
            @else
              <a href="{{route('articles.index')}}" class="btn btn-secondary">Annuler</a>
            @endif
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