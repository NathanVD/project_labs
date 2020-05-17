@extends('adminlte::page')

@section('content')

  <div class="container d-flex justify-content-center">

    <div class="card card-cyan card-outline w-50">

      <div class="card-header">
        <h3 class="card-title">Confirmation d'envoi de message</h3>

        <div class="card-tools">
          <a href="{{route('inbox.index')}}" class="btn btn-tool">
            <i class="fas fa-chevron-circle-left"></i> Retour à l'index
          </a>
        </div>
      </div>

      <div class="card-body">

        <label for="title">Titre :</label>
        <div class="input-group mb-3">
          <input type="text" id="title" name="title" class="form-control" value="{{$message ? $message->title : "Confirmation d'envoi"}}">
        </div>  

        <label for="greeting">Salutation :</label>
        <div class="input-group mb-3">
          <input type="text" id="greeting" name="greeting" class="form-control" value="{{$message ? $message->greeting : "Bonjour"}}">
          <div class="input-group-append">
            <span class="input-group-text">#Nom,</span>
          </div>
        </div>

        <label for="intro">Intro :</label>
        <div class="input-group">
          <input type="text" id="intro" name="intro" class="form-control" value="{{$message ? $message->intro : "Merci pour votre message :"}}">
        </div>
        <input class="form-control mb-3" type="text" value="#Message" readonly>

        <label for="outro">Outro :</label>
        <div class="input-group mb-3">
          <input type="text" id="outro" name="outro" class="form-control" value="{{$message ? $message->outro : "Il sera lu et traité dans les plus brefs délais."}}">
        </div>

        <label for="farewell">Cloture :</label>
        <div class="input-group">
          <input type="text" id="farewell" name="farewell" class="form-control" value="{{$message ? $message->farewell : "Bien à vous,"}}">
        </div>
        <input class="form-control" type="text" value="{{ config('app.name') }}" readonly>

      </div>    
    </div>      
  </div>


@endsection