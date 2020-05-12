@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
  <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
@stop

@section('content')

  <div class="container">
    <form action="{{route('services.store')}}" method="POST">
      @csrf
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Nouveau service</h3>
        </div>

        <div class="card-body">

          <div class="form-group">
            <label>Icone :</label>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-001-picture" id="001">
                <label for="001" class="form-check-label h1"><i class="flaticon-001-picture"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-002-caliper" id="002">
                <label for="002" class="form-check-label h1"><i class="flaticon-002-caliper"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-003-energy-drink" id="003">
                <label for="003" class="form-check-label h1"><i class="flaticon-003-energy-drink"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-004-build" id="004">
                <label for="004" class="form-check-label h1"><i class="flaticon-004-build"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-005-thinking-1" id="005">
                <label for="005" class="form-check-label h1"><i class="flaticon-005-thinking-1"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-006-prism" id="006">
                <label for="006" class="form-check-label h1"><i class="flaticon-006-prism"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-007-paint" id="007">
                <label for="007" class="form-check-label h1"><i class="flaticon-007-paint"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-008-team" id="008">
                <label for="008" class="form-check-label h1"><i class="flaticon-008-team"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-009-idea-3" id="009">
                <label for="009" class="form-check-label h1"><i class="flaticon-009-idea-3"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-010-diamond" id="010">
                <label for="010" class="form-check-label h1"><i class="flaticon-010-diamond"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-011-compass" id="011">
                <label for="011" class="form-check-label h1"><i class="flaticon-011-compass"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-012-cube" id="012">
                <label for="012" class="form-check-label h1"><i class="flaticon-012-cube"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-013-puzzle" id="013">
                <label for="013" class="form-check-label h1"><i class="flaticon-013-puzzle"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-014-magic-wand" id="014">
                <label for="014" class="form-check-label h1"><i class="flaticon-014-magic-wand"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-015-book" id="015">
                <label for="015" class="form-check-label h1"><i class="flaticon-015-book"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-016-vision" id="016">
                <label for="016" class="form-check-label h1"><i class="flaticon-016-vision"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-017-notebook" id="017">
                <label for="017" class="form-check-label h1"><i class="flaticon-017-notebook"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-018-laptop-1" id="018">
                <label for="018" class="form-check-label h1"><i class="flaticon-018-laptop-1"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-019-coffee-cup" id="019">
                <label for="019" class="form-check-label h1"><i class="flaticon-019-coffee-cup"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-020-creativity" id="020">
                <label for="020" class="form-check-label h1"><i class="flaticon-020-creativity"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-021-thinking" id="021">
                <label for="021" class="form-check-label h1"><i class="flaticon-021-thinking"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-022-branding" id="022">
                <label for="022" class="form-check-label h1"><i class="flaticon-022-branding"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-023-flask" id="023">
                <label for="023" class="form-check-label h1"><i class="flaticon-023-flask"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-024-idea-2" id="024">
                <label for="024" class="form-check-label h1"><i class="flaticon-024-idea-2"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-025-imagination" id="025">
                <label for="025" class="form-check-label h1"><i class="flaticon-025-imagination"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-026-search" id="026">
                <label for="026" class="form-check-label h1"><i class="flaticon-026-search"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-027-monitor" id="027">
                <label for="027" class="form-check-label h1"><i class="flaticon-027-monitor"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-028-idea-1" id="028">
                <label for="028" class="form-check-label h1"><i class="flaticon-028-idea-1"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-029-sketchbook" id="029">
                <label for="029" class="form-check-label h1"><i class="flaticon-029-sketchbook"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-030-computer" id="030">
                <label for="030" class="form-check-label h1"><i class="flaticon-030-computer"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-031-scheme" id="031">
                <label for="031" class="form-check-label h1"><i class="flaticon-031-scheme"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-032-explorer" id="032">
                <label for="032" class="form-check-label h1"><i class="flaticon-032-explorer"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-033-museum" id="033">
                <label for="033" class="form-check-label h1"><i class="flaticon-033-museum"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-034-cactus" id="034">
                <label for="034" class="form-check-label h1"><i class="flaticon-034-cactus"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-035-smartphone" id="035">
                <label for="035" class="form-check-label h1"><i class="flaticon-035-smartphone"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-036-brainstorming" id="036">
                <label for="036" class="form-check-label h1"><i class="flaticon-036-brainstorming"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-037-idea" id="037">
                <label for="037" class="form-check-label h1"><i class="flaticon-037-idea"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-038-graphic-tool-1" id="038">
                <label for="038" class="form-check-label h1"><i class="flaticon-038-graphic-tool-1"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-039-vector" id="039">
                <label for="039" class="form-check-label h1"><i class="flaticon-039-vector"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-040-rgb" id="040">
                <label for="040" class="form-check-label h1"><i class="flaticon-040-rgb"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-041-graphic-tool" id="041">
                <label for="041" class="form-check-label h1"><i class="flaticon-041-graphic-tool"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-042-typography" id="042">
                <label for="042" class="form-check-label h1"><i class="flaticon-042-typography"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-043-sketch" id="043">
                <label for="043" class="form-check-label h1"><i class="flaticon-043-sketch"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-044-paint-bucket" id="044">
                <label for="044" class="form-check-label h1"><i class="flaticon-044-paint-bucket"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-045-video-player" id="045">
                <label for="045" class="form-check-label h1"><i class="flaticon-045-video-player"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-046-laptop" id="046">
                <label for="046" class="form-check-label h1"><i class="flaticon-046-laptop"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-047-artificial-intelligence" id="047">
                <label for="047" class="form-check-label h1"><i class="flaticon-047-artificial-intelligence"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-048-abstract" id="048">
                <label for="048" class="form-check-label h1"><i class="flaticon-048-abstract"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-049-projector" id="049">
                <label for="049" class="form-check-label h1"><i class="flaticon-049-projector"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input invisible" type="radio" name="icon" value="flaticon-050-satellite" id="050">
                <label for="050" class="form-check-label h1"><i class="flaticon-050-satellite"></i></label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="title">Nom :</label>
            <input type="text" name="title" id="title" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" rows="4" maxlength="175" required></textarea>
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
  </div>

@endsection