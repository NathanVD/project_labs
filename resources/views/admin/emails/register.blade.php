@component('mail::message')

# {{$message_model ? $message_model->title : "Merci de votre inscription !"}}

Félicitations, {{$new_user->name}}

{{$message_model ? $message_model->content : "Vous pourrez dorénavant commenter les articles !"}}

{{$message_model ? $message_model->end : "Merci et à très bientôt,"}}

{{"L'équipe ".config('app.name').'.'}}

@endcomponent
