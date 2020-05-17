@component('mail::message')
# {{$message_model ? $message_model->title : "Merci de votre inscription !"}}

{{$message_model ? $message_model->content : "Félicitations, vous êtes maintenant inscrit à notre newsletter et ne manquerez plus un seul article sur notre blog !"}}

{{$message_model ? $message_model->end : "Merci et à très bientôt,"}}
{{"L'équipe ".config('app.name').'.'}}

@endcomponent
