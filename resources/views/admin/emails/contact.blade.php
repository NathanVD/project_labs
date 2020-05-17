@component('mail::message')
# {{$message_model ? $message_model->title : "Confirmation d'envoi"}}

{{$message_model ? $message_model->greeting : "Bonjour"}} {{$sent_message ? $sent_message->name : "#Nom"}},

{{$message_model ? $message_model->intro : "Merci pour votre message :"}}

"{{$sent_message ? $sent_message->message : "#Message"}}"

{{$message_model ? $message_model->outro : "Il sera lu et traité dans les plus brefs délais."}}

{{$message_model ? $message_model->farewell : "Bien à vous,"}}<br>
{{ config('app.name') }}
@endcomponent
