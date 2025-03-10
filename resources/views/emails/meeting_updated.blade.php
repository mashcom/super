@component('mail::message')
@if($meeting->accepted == 1)
    {{ __("Your meeting has been marked as accepted. Please find the details of the meeting below:") }}
@endif

@if($meeting->accepted == 2)
    {{ __("The other participant of the meeting cannot attend the meeting. Please find the details of the meeting below:") }}
@endif

@php
    $student = $meeting?->message?->conversation?->student;
    $supervisor = $meeting?->message?->conversation?->supervisor;
@endphp

{{ __("The meeting is between student $student->firstname $student->surname ($student->regnum@msuas.ac.zw) and supervisor $supervisor->name ($supervisor->email)") }}<br />
{{ __("Date: $meeting->scheduled_date") }}<br />
{{ __("Start Time: $meeting->start_time") }}<br />
{{ __("End Time: $meeting->end_time") }}<br />

{{ __("Message") }}<br />
{{ __($meeting->additional_details) }}<br />

@component('mail::button', ['url' => env('APP_URL')])
{{ __('View Details') }}
@endcomponent

@endcomponent