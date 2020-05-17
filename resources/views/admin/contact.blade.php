@extends('adminlte::page')

@section('content')

  <div class="container">
    <form action="{{route('contact.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Infos de contact</h3>
        </div>

        <div class="card-body">

          <div class="row">
            <div class="col">

              <div class="form-group">
                <label for="titre">Titre :</label>
                <input name="titre" class="form-control{{($errors->isNotEmpty() ? $errors->first('titre') ? " is-invalid" : " is-valid" : "")}}" id="titre" value="{{$contact ? $contact->title : 'Contactez nous'}}">
              </div>

              <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" class="form-control{{($errors->isNotEmpty() ? $errors->first('description') ? " is-invalid" : " is-valid" : "")}}" id="description" rows="4" style="height: 124px" >{{$contact ? $contact->description : ''}}</textarea>
              </div>

              <div class="form-group">
                <label for="bouton">Bouton d'envoi du formulaire de contact :</label>
                <input name="bouton" class="form-control{{($errors->isNotEmpty() ? $errors->first('bouton') ? " is-invalid" : " is-valid" : "")}}" id="bouton" value="{{$contact ? $contact->button : 'Envoyer'}}">
              </div>

            </div>
            <div class="col">

              <div class="form-group">
                <label for="info_titre">Titre des infos :</label>
                <input name="info_titre" class="form-control{{($errors->isNotEmpty() ? $errors->first('info_titre') ? " is-invalid" : " is-valid" : "")}}" id="info_titre" value="{{$contact ? $contact->data_title : ''}}">
              </div>

              <div class="row">

                <div class="col">
                  <div class="form-group">
                    <label for="adresse_1">Adresse 1 :</label>
                    <input name="adresse_1" class="form-control{{($errors->isNotEmpty() ? $errors->first('adresse_1') ? " is-invalid" : " is-valid" : "")}}" id="adresse_1" value="{{$contact ? $contact->adress_1 : ''}}">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="adresse_2">Adresse 2 :</label>
                    <input name="adresse_2" class="form-control{{($errors->isNotEmpty() ? $errors->first('adresse_2') ? " is-invalid" : " is-valid" : "")}}" id="adresse_2" value="{{$contact ? $contact->adress_2 : ''}}">
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="téléphone">Numéro de téléphone :</label>
                <input name="téléphone" class="form-control{{($errors->isNotEmpty() ? $errors->first('téléphone') ? " is-invalid" : " is-valid" : "")}}" id="téléphone" value="{{$contact ? $contact->phone : ''}}">
              </div>

              <div class="form-group">
                <label for="email">Adresse e-mail :</label>
                <input name="email" class="form-control{{($errors->isNotEmpty() ? $errors->first('email') ? " is-invalid" : " is-valid" : "")}}" id="email" value="{{$contact ? $contact->email : ''}}">
              </div>

            </div>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('contact')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>


      </div>
    </form>
  </div>

@endsection