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
                <label for="line">Titre :</label>
                <input name="title" class="form-control" id="title" value="{{$contact ? $contact->title : 'contact us'}}">
              </div>

              <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" class="form-control" id="description" rows="4" style="height: 124px" required>{{$contact ? $contact->description : 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.'}}</textarea>
              </div>

              <div class="form-group">
                <label for="button">Bouton d'envoi du formulaire de contact :</label>
                <input name="button" class="form-control" id="button" value="{{$contact ? $contact->button : 'send'}}" required>
              </div>

            </div>
            <div class="col">

              <div class="form-group">
                <label for="data_title">Titre des infos :</label>
                <input name="data_title" class="form-control" id="data_title" value="{{$contact ? $contact->data_title : 'Main Office'}}">
              </div>

              <div class="row">

                <div class="col">
                  <div class="form-group">
                    <label for="adress_1">Adresse 1 :</label>
                    <input name="adress_1" class="form-control" id="adress_1" value="{{$contact ? $contact->adress_1 : 'MC/ Libertad, 34'}}">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="adress_2">Adresse 2 :</label>
                    <input name="adress_2" class="form-control" id="adress_2" value="{{$contact ? $contact->adress_2 : '05200 Arévalo'}}">
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="phone">Numéro de téléphone :</label>
                <input name="phone" class="form-control" id="phone" value="{{$contact ? $contact->phone : '0034 37483 2445 322'}}">
              </div>

              <div class="form-group">
                <label for="email">Adresse e-mail 2 :</label>
                <input name="email" class="form-control" id="email" value="{{$contact ? $contact->email : 'hello@company.com'}}">
              </div>

            </div>
          </div>

        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('admin')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>


      </div>
    </form>
  </div>

@endsection