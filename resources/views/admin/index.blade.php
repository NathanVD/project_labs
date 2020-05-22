@extends('adminlte::page')

@section('title','Labs - BackOffice')

@section('content_header')
  <h1>Dashboard Admin</h1>
@endsection

@section('content')
<div class="row">

  <div class="col-lg-3 col-6">
        {{-- Nombre de témoignages --}}
    <div class="small-box bg-primary">
      <div class="inner">
        <div class="mb-4">
          <h3 class="d-inline mr-3">{{$messages_count}}</h3>
          <h5 class="d-inline">Message(s)</h5> 
        </div>
        
        <p class="mb-0"><small>Dernier reçu : {{$messages_count != 0 ? $last_message->created_at->format('j M - H:i') : '---'}}</small></p>
      </div>
      <div class="icon">
        <i class="fas fa-envelope"></i>
      </div>
      <a href="{{route('inbox.index')}}" class="small-box-footer">
        Plus d'infos <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    {{-- Nombre de témoignages --}}
    <div class="small-box bg-primary">
      <div class="inner">
        <div class="mb-4">
          <h3 class="d-inline mr-3">{{$testimonials_count}}</h3>
          <h5 class="d-inline">Témoignage(s)</h5> 
        </div>
        
        <p class="mb-0"><small>Dernier ajouté : {{$testimonials_count != 0 ? $last_testimonial->created_at->format('j M - H:i') : '---'}}</small></p>
      </div>
      <div class="icon">
        <i class="far fa-comments"></i>
      </div>
      <a href="{{route('testimonials.index')}}" class="small-box-footer">
        Plus d'infos <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-lg-3 col-6">
    {{-- Nombre de témoignages --}}
    <div class="small-box bg-success">
      <div class="inner">
        <div class="mb-4">
          <h3 class="d-inline mr-3">{{$users_count}}</h3>
          <h5 class="d-inline">Membre(s) inscrit(s)</h5> 
        </div>
        
        <p class="mb-0"><small>Dernier inscrit : {{$users_count != 0 ? $last_user->created_at->format('j M - H:i') : '---'}}</small></p>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
      <a href="{{route('users')}}" class="small-box-footer">
        Plus d'infos <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>
@endsection