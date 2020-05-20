<div class="contact-section spad fix">

  <div class="container">
    <div class="row">

      <!-- contact info -->
      <div class="col-md-5 col-md-offset-1 contact-info col-push text-center">
        <div class="overlay"></div>
        <div class="member">
          <h2>{{$user->name}}</h2>
          <h3>{{$user->roles->implode('name', ', ')}}</h3>
          <p class="con-item">{{$user->email}}</p>
          <img src="{{asset('storage/'.$user->photo_path)}}" alt="">
        </div>
        <h3>À propos de moi :</h3>
        <p class="con-item">{{$user->description ? $user->description : 'Nada'}}</p>
      </div>

      <!-- contact form -->
      <div class="col-md-6 col-pull" id="contact_form">
        <h3>Modifier mes infos :</h3>
        <form action="{{route('profil_page.update',$user->id)}}" method="POST" class="form-class mt60" id="con_form" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="nom" placeholder="Nom" value="{{$user->name}}">
            </div>
            <div class="col-sm-6">
              <input type="text" name="email" placeholder="Email" value="{{$user->email}}">
            </div>
            <div class="col-sm-12">
              <label for="photo" class="label-file">
                <input type="file" name="photo" id="photo" placeholder="photo">
              </label>
            </div>
            <div class="col-sm-12">
              <textarea name="description" placeholder="À propos de moi">{{$user->description}}</textarea>
              <button class="site-btn">Confirmer</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>