@component('mail::message')


{{ __("A new message was sent on your conversation.Please login into the system for more details") }}<br />


@component('mail::button', ['url' => env('APP_URL')])
{{ __('View Details') }}
@endcomponent

@endcomponent