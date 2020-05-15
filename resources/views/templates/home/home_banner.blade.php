<div class="hero-section">
  
  <div class="hero-content">
    <div class="hero-center">
      <img src="{{$logo ? asset('storage/'.$logo->logo_path) : "img/big-logo.png"}}" class="big_logo" alt="logo"><!-- Logo -->
      <p>{{$tagline ? $tagline->line : "Get your freebie template now!"}}</p>
    </div>
  </div>

  <!-- slider -->
  <div id="hero-slider" class="owl-carousel">
    @if (!$carousel || $carousel->isEmpty())
      <div class="item  hero-item" data-bg="img/01.jpg"></div>    
      <div class="item  hero-item" data-bg="img/02.jpg"></div>    
    @else
      @foreach ($carousel as $img)
        <div class="item  hero-item" data-bg="{{substr( $img->img_path, 0, 4 ) === "http" ? $img->img_path : asset('storage/'.$img->img_path)}}"></div>
      @endforeach   
    @endif
  </div>

</div>