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
      <li><a href="/admin">Backoffice</a></li>
    </ul>
  </nav>
</header>