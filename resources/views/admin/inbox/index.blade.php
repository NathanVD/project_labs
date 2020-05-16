@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-primary">
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
                  <td colspan="4" class="text-center"><b>Aucun message.</b></td>
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