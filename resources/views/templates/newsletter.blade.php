<div class="newsletter-section spad" id="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h2>Newsletter</h2>
      </div>
      <div class="col-md-9">
        <!-- newsletter form -->
        <form class="nl-form d-flex" action="{{route('newsletter.subscribe')}}" method="POST">
          @csrf
          <input type="text" id="email" name="email" placeholder="Entrez votre e-mail ici">
          <button class="site-btn btn-2">Newsletter</button>
        </form>
      </div>
    </div>
  </div>
</div>