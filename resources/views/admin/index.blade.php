@extends('adminlte::page')

@section('title','Labs - BackOffice')

@section('content_header')
  <h1>Dashboard Admin</h1>
@endsection

@section('content')
  <div class="col-lg-3 col-6">
    {{-- Nombre de témoignages --}}
    <div class="small-box bg-primary">
      <div class="inner">
        <div class="mb-4">
          <h3 class="d-inline mr-3">{{$testimonials_count}}</h3>
          <h5 class="d-inline">Témoignages</h5> 
        </div>
        
        <p class="mb-0"><small>Dernier ajouté : {{$testimonials_count != 0 ? $last_testimonial->created_at : '---'}}</small></p>
      </div>
      <div class="icon">
        <i class="far fa-comments"></i>
      </div>
      <a href="{{route('testimonials.index')}}" class="small-box-footer">
        Plus d'infos <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
@endsection