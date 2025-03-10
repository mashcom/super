@component('mail::message')
{{ __("You have recieved a ". $document->document_type) }}
<br/>
{{ __("Title: ". $document->file_name) }}
<br/>

{{ __("Description: ". $document->description) }}



@component('mail::button', ['url' => asset($document->file_path)])
{{ __('View Document') }}
@endcomponent

{{ __("You can download the attached document") }}

{{ __('This is an auto generated notification do not respond') }}
@endcomponent