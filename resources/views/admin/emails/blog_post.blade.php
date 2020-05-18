@component('mail::message')

# {{config('app.name')}}{{$message_model ? $message_model->title : " Newsletter"}}   

### {{$message_model ? $message_model->content : "Un nouvel article a été publié sur notre blog !"}}</h3>

@component('mail::panel')
![alt]({{asset('storage/'.$article->img_path)}})
## {{$article->title}}
  par *{{$article->user->name}}*

- {{$article->category->name}}
- @foreach ($article->tags as $tag)
  {{$article->tags()->inRandomOrder()->limit(3)->get()->implode('name', ', ')}}
@endforeach
    @component('mail::button', ['url' => config('app.url').'/blog_post/'.$article->id, 'color' => 'primary'])
      Lire l'article
    @endcomponent
@endcomponent
@endcomponent

{{-- <div class="card text-left">

  <img class="card-img-top" src="{{ $message->embed('storage/'.$article->img_path) }}" alt="Image de l'article">

  <div class="card-body">
    <h4 class="card-title">{{$article->title}} <small>par {{$article->author}}</small></h4>
    <p class="card-text">{{\Illuminate\Support\Str::limit($article->content,125)}}</p>
  </div>

  <div class="card-footer text-muted">
    @component('mail::button', ['url' => config('app.url').'blog_post/'.$article->id, 'color' => 'success'])
      Lire l'article
    @endcomponent
  </div>

</div> --}}