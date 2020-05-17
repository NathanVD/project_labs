@extends('adminlte::page')

@section('content')

  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Abonnés</h3>
      </div>

      <div class="card-body">

        <table id="subscribers_table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">Email</th>
              <th class="text-center text-nowrap">Date</th>
              <th class="text-center text-nowrap">Désabonner</th>
            </tr>
          </thead>

          <tbody>
            @if (!$subscribers || $subscribers->isEmpty())
                <tr>
                  <td colspan="3" class="text-center text-nowrap"><b>Aucun abonné</b></td>
                </tr>
            @else 
              @foreach ($subscribers->sortByDesc('created_at') as $subscriber)
                <tr>
                  <td class="text-center text-nowrap">{{$subscriber->email}}</td>
                  <td class="text-center text-nowrap">{{$subscriber->created_at}}</td>
                  <td class="text-center text-nowrap">
                    <form action="{{route('newsletter.unsubscribe',$subscriber->email)}}" method="POST" class="d-inline-block">
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
      $('#subscribers_table').DataTable({
        "order": [], 
      });
    } );  
  </script>
@endsection