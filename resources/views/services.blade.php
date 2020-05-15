@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.services.services_nav')

  @include('templates.services.services_banner')

  @include('templates.services')

  @include('templates.services.primed_services')

  @include('templates.services.quick_blog')

  @include('templates.newsletter')

  @include('templates.contact')

  @include('templates.footer')

@endsection
