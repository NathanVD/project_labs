@extends('layouts.app')

@section('content')

  @include('templates.preloader')

  @include('templates.blog.blog_nav')

  @include('templates.blog.blog_banner')

  @include('templates.blog.blog_post_page')

  @include('templates.newsletter')

  @include('templates.footer')

@endsection
