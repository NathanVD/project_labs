@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
@stop

@section('content')

  {{-- Titre --}}
    <form action="{{route('services.title.update')}}" method="POST">
      @csrf
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Titre de la section</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="form-group">
                <label for="line">Titre <small>(partie 1)</small> :</label>
                <input name="title_1" class="form-control" id="title_1" value="{{$title ? $title->title_1 : 'Get in'}}">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="line">Surlignement :</label>
                <input name="highlight" class="form-control" id="highlight" value="{{$title ? $title->highlight : 'the lab'}}">
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="title_2">Titre <small>(partie 2)</small> :</label>
                <input name="title_2" class="form-control" id="title_2" value="{{$title ? $title->title_2 : 'and see the services'}}">
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="btn-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="{{route('services.index')}}" class="btn btn-secondary">Annuler</a>
          </div>
        </div>

      </div>
    </form>
  {{-- Titre fin --}}

  {{-- Index --}}
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Liste des services <a href="{{route('services.create')}}" class="badge bg-success align-top ml-3">Nouveau <i class="fas fa-plus"></i></a></h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Icone</th>
              <th>Nom du service</th>
              <th>Description</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            @if ($services->isEmpty())
                <tr>
                  <td colspan="6" class="text-center"><b>Aucun service proposé</b></td>
                </tr>
            @else 
              @foreach ($services as $service)
                <tr>
                  <td class="h2"><i class="{{$service->icon}}"></i></td>
                  <td class="text-capitalize">{{$service->title}}</td>
                  <td class="text-capitalize">{{$service->description}}</td>
                  <td class="text-center text-nowrap">
                    <a href="{{route('services.edit',$service->id)}}" class="btn btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{route('services.destroy',$service->id)}}" method="POST" class="d-inline-block">
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
  {{-- Index fin --}}

@endsection