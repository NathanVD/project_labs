@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

@include('templates.preloader')

@include('templates.home_nav')

@include('templates.home_banner')

@include('templates.about')

@include('templates.testimonials')

@include('templates.services')

@include('templates.team')

@include('templates.ready')

@include('templates.contact')

@include('templates.footer')

@endsection
