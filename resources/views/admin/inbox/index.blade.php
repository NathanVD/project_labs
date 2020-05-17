@extends('adminlte::page')

@section('content')

  <div class="row">
    <div class="col-3">
      <div class="card card-teal card-outline">
        <div class="card-header">
          <h3 class="card-title">Réponses automatiques</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            {{-- <li class="nav-item">
              <a href="{{route('inbox.message_confirm.preview')}}" class="nav-link">
                <i class="fas fa-envelope"></i> Modèle "Envoi de message"
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{route('inbox.message_email')}}" class="nav-link">
                <i class="fas fa-envelope"></i> Modèle "Envoi de message"
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('inbox.newsletter_email')}}" class="nav-link">
                <i class="fas fa-rss"></i> Modèle "Abonnement newsletter"
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('inbox.blogPost_email')}}" class="nav-link">
                <i class="far fa-newspaper"></i> Modèle "Nouvel article"
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Inbox</h3>
        </div>

        <div class="card-body">
          <table id="messages_table" class="table">

            <thead>
              <tr>
                <th class="text-center text-nowrap">Nom</th>
                <th class="text-center text-nowrap">Sujet</th>
                <th class="text-center text-nowrap">Date</th>
                <th class="text-center text-nowrap">Heure</th>
                <th class="text-center text-nowrap">Actions</th>
              </tr>
            </thead>

            <tbody>
              @if (!$messages || $messages->isEmpty())
                  <tr>
                    <td colspan="5" class="text-center"><b>Aucun message.</b></td>
                  </tr>
              @else 
                @foreach ($messages->sortByDesc('created_at') as $message)
                  <tr>
                    <td class="text-center text-nowrap">{{$message->name}}</td>
                    <td class="text-center text-nowrap">{{$message->subject}}</td>
                    <td class="text-center text-nowrap"><span>{{$message->created_at->format('d M Y')}}</span></td>
                    <td class="text-center text-nowrap"><span>{{$message->created_at->format('H:i')}}</span></td>
                    <td class="text-center text-nowrap">
                      <a href="{{route('inbox.show',$message->id)}}" class="btn btn-info">
                        <i class="far fa-eye"></i>
                      </a>
                      <form action="{{route('inbox.destroy',$message->id)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script>
    $(document).ready( function () {
      $('#messages_table').DataTable({
        "order": [], 
      });
    } );  
  </script>
@endsection