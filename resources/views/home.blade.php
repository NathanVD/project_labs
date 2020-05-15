@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.home.home_nav')

  @include('templates.home.home_banner')

  @include('templates.home.about')

  @include('templates.home.testimonials')

  @include('templates.services')

  @include('templates.home.team')

  @include('templates.home.ready')

  @include('templates.contact')

  @include('templates.footer')

@endsection
