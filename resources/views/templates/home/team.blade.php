<div class="team-section spad">
  <div class="overlay"></div>
  <div class="container">
    <div class="section-title">
      @if (!$team_title)
        <h2>Get in <span>the Lab</span> and  meet the team</h2>
      @else
        @if ($team_title->highlight)
          <h2>{{$team_title->title_1}} <span>{{$team_title->highlight}}</span> {{$team_title->title_2}}</h2>
        @else
          <h2>{{$team_title->title_1}} {{$team_title->title_2}}</h2>
        @endif
      @endif
    </div>
    <div class="row d-flex justify-content-center">
      @if (!$team || $team->isEmpty())
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="img/team/1.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Project Manager</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="img/team/2.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Junior developer</h3>
          </div>
        </div>
        <!-- single member -->
        <div class="col-sm-4">
          <div class="member">
            <img src="img/team/3.jpg" alt="">
            <h2>Christinne Williams</h2>
            <h3>Digital designer</h3>
          </div>
        </div>
      @else
        @foreach ($team as $team_member)
          <div class="col-sm-4">
            <div class="member">
              <img src="{{asset('storage/'.$team_member->photo_path)}}" alt="">
              <h2>{{$team_member->name}}</h2>
              <h3>{{$team_member->roles()->get()->implode('name', ', ')}}</h3>
            </div>
          </div>
        @endforeach
      @endif

    </div>
  </div>
</div>