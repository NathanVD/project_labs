<div class="contact-section spad fix">
  <div class="container">
    <div class="row">
      <!-- contact info -->
      <div class="col-md-5 col-md-offset-1 contact-info col-push">
        <div class="section-title left">
          <h2>{{$contact ? $contact->title : 'contact us'}}</h2>
        </div>
        <p>{{$contact ? $contact->description : 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.'}}</p>
        <h3 class="mt60">{{$contact ? $contact->data_title : 'Main Office'}}</h3>
        <p class="con-item">{{$contact ? $contact->adress_1 : 'MC/ Libertad, 34'}}<br> {{$contact ? $contact->adress_2 : '05200 Arévalo'}} </p>
        <p class="con-item">{{$contact ? $contact->phone : '0034 37483 2445 322'}}</p>
        <p class="con-item">{{$contact ? $contact->email : 'hello@company.com'}}</p>
      </div>
      <!-- contact form -->
      <div class="col-md-6 col-pull" id="contact_form">
        <form action="{{route('inbox.store')}}" method="POST" class="form-class" id="con_form">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="name" placeholder="Your name">
            </div>
            <div class="col-sm-6">
              <input type="text" name="email" placeholder="Your email">
            </div>
            <div class="col-sm-12">
              <input type="text" name="subject" placeholder="Subject">
              <textarea name="message" placeholder="Message"></textarea>
              <button class="site-btn">{{$contact ? $contact->button : 'envoyer'}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>