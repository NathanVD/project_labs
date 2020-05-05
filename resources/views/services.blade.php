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

@include('templates.nav')
{{-- /!\ onglet pas highligté, eut-être nécessaire de faire une blade nav par page --}}

@include('templates.services_banner')

@include('templates.services')

@include('templates.primed_services')

@include('templates.quick_blog')

@include('templates.newsletter')

@include('templates.contact')

@include('templates.footer')

@endsection
