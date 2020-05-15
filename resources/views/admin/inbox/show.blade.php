@extends('adminlte::page')

@section('content')

  <div class="row">
    <div class="col-3">
      <a href="{{route('inbox.index')}}" class="btn btn-primary btn-block mb-3">
        <i class="fas fa-inbox"></i> Retour à la boîte de réception
      </a>
      <div class="card card-teal card-outline">
        <div class="card-header">
          <h3 class="card-title">Actions</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-2">
          <form action="{{route('inbox.destroy',$message->id)}}" method="POST" class="d-inline-block">
            @csrf
            @method('delete')
            <button class="btn btn-app">
              <i class="fas fa-trash-alt"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="card card-cyan card-outline">

        <div class="card-header">
          <h3 class="card-title">{{$message->subject}}</h3>

          <div class="card-tools">
            <a href="{{$previous ? route('inbox.show',$previous) : ''}}" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
            <a href="{{$next ? route('inbox.show',$next) : ''}}" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
          </div>
        </div>

        <div class="card-body p-0">
          <div class="mailbox-read-info">
            <h6>De: {{$message->email}}
              <span class="mailbox-read-time float-right">{{$message->created_at}}</span></h6>
          </div>

          <div class="mailbox-read-message">
            <p>{{$message->message}}</p>
          </div>

        </div>    

        <div class="card-footer">
          <p>Expéditeur : {{$message->name}}</p>
          <div class="float-right">

            
          </div>
        </div>

      </div>      
    </div>
  </div>

@endsection