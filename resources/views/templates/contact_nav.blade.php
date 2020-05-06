<header class="header-section">
  <div class="logo">
    <img src="img/logo.png" alt=""><!-- Logo -->
  </div>
  <!-- Navigation -->
  <div class="responsive"><i class="fa fa-bars"></i></div>
  <nav>
    <ul class="menu-list">
      <li><a href="/" class="text-capitalize">{{$navlinks ? $navlinks->link_1 : 'home'}}</a></li>
      <li><a href="services" class="text-capitalize">{{$navlinks ? $navlinks->link_2 : 'services'}}</a></li>
      <li><a href="blog" class="text-capitalize">{{$navlinks ? $navlinks->link_3 : 'blog'}}</a></li>
      <li class="active"><a href="contact" class="text-capitalize">{{$navlinks ? $navlinks->link_4 : 'contact'}}</a></li>
      <li><a href="admin">Admin</a></li>
    </ul>
  </nav>
</header>