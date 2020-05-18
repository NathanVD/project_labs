<header class="header-section">
  <div class="logo">
    <img src="{{$logo ? asset('storage/'.$logo->logo_path) : "img/logo.png"}}" class="little_logo" alt="logo"><!-- Logo -->
  </div>
  <!-- Navigation -->
  <div class="responsive"><i class="fa fa-bars"></i></div>
  <nav>
    <ul class="menu-list">
      <li class="active"><a href="#" class="text-capitalize">{{$navlinks ? $navlinks->link_1 : 'home'}}</a></li>
      <li><a href="/services" class="text-capitalize">{{$navlinks ? $navlinks->link_2 : 'services'}}</a></li>
      <li><a href="/blog" class="text-capitalize">{{$navlinks ? $navlinks->link_3 : 'blog'}}</a></li>
      <li><a href="/contact" class="text-capitalize">{{$navlinks ? $navlinks->link_4 : 'contact'}}</a></li>
      <li class="dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu" data-toggle="dropdown" aria-expanded="false">
          {{Auth::check() ? Auth::user()->name : 'Se connecter'}}
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
          <a class="dropdown-item" href="/profil_page/{{Auth::user()->id}}">
            <i class="fas fa-user"></i>
            Profil
          </a>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off"></i>
            Déconnexion
          </a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="_token" value="{{Auth::user()->rememberToken}}">
          </form>
        </div>
      </li>
      @if (Auth::check() && Auth::user()->role !== 'member')
        <li><a href="/admin">Backoffice</a></li>
      @endif
    </ul>
  </nav>
</header>