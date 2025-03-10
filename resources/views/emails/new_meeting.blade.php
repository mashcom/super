@component('mail::message')

{{ __("A new meeting has been requested") }}

{{ __("Date: $meeting->scheduled_date") }}<br />
{{ __("Start Time: $meeting->start_time") }}<br />
{{ __("End Time: $meeting->end_time") }}<br />

{{ __("Message") }}<br />
{{ __($meeting->additional_details) }}<br />

@component('mail::button', ['url' => env('APP_URL')])
{{ __('View Details') }}
@endcomponent

@endcomponent