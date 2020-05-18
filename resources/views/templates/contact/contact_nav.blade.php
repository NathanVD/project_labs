<header class="header-section">
  <div class="logo">
    <img src="{{$logo ? asset('storage/'.$logo->logo_path) : "img/logo.png"}}" class="little_logo" alt="logo"><!-- Logo -->
  </div>
  <!-- Navigation -->
  <div class="responsive"><i class="fa fa-bars"></i></div>
  <nav>
    <ul class="menu-list">
      <li><a href="/home" class="text-capitalize">{{$navlinks ? $navlinks->link_1 : 'home'}}</a></li>
      <li><a href="/services" class="text-capitalize">{{$navlinks ? $navlinks->link_2 : 'services'}}</a></li>
      <li><a href="/blog" class="text-capitalize">{{$navlinks ? $navlinks->link_3 : 'blog'}}</a></li>
      <li class="active"><a href="#" class="text-capitalize">{{$navlinks ? $navlinks->link_4 : 'contact'}}</a></li>
      <li class="dropdown">
      @if (Auth::check())
        <li class="dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu" data-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu">
            <a class="dropdown-item" href="/profil_page/{{Auth::user()->id}}">
              <i class="fas fa-user"></i>
              Profil
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i>
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @else
      <li><a href="{{ route('login') }}" class="nav-link">Se connecter</a></li>
      <li><a href="{{ route('register') }}" class="nav-link">S'enregistrer</a></li>
      @endif
      @if (Auth::check() && Auth::user()->roles->whereIn('name', ['Admin','Webmaster'])->isNotEmpty())
        <li><a href="/admin">Backoffice</a></li>
      @endif
    </ul>
  </nav>
</header>