@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('map.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Carte</h3>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Lieu:</label>
                <input name="name" class="form-control" id="name"
                value="{{$map ? $map->name : 'Chez moi'}}"
                  required>
              </div>              
            </div>
            <div class="col">
              <iframe src="{{$map ? $map->url : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10083.481123887552!2d4.33603666686698!3d50.81504203924411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c451118c4027%3A0xbccfff08d1cdd2e3!2sRue%20de%20la%20Mutualit%C3%A9%2059%2C%201180%20Uccle!5e0!3m2!1sfr!2sbe!4v1589549549344!5m2!1sfr!2sbe'}}" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>


          <div class="form-group">
            <label for="url">Lien de la carte à afficher :</label>
            <input name="url" class="form-control" id="url"
             value="{{$map ? $map->url : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10083.481123887552!2d4.33603666686698!3d50.81504203924411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c451118c4027%3A0xbccfff08d1cdd2e3!2sRue%20de%20la%20Mutualit%C3%A9%2059%2C%201180%20Uccle!5e0!3m2!1sfr!2sbe!4v1589549549344!5m2!1sfr!2sbe'}}"
              required>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('map')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection