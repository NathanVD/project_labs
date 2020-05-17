<div class="newsletter-section spad" id="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h2>Newsletter</h2>
      </div>
      <div class="col-md-9">
        <!-- newsletter form -->
        <form class="nl-form" action="{{route('newsletter.subscribe')}}" method="POST">
          @csrf
          <input type="text" id="email" name="email" placeholder="Entrez votre e-mail ici">
          <button class="site-btn btn-2">Newsletter</button>
        </form>
        @error('email')
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" style="margin-top: 5px">
              {{$error}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endforeach
        @enderror
      </div>
    </div>
  </div>
</div>