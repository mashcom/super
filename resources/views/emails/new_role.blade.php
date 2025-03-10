@component('mail::message')
{{ __("Hi $user->name") }}

{{ __("You have have been allocated a new role of $role in $department->name") }}


@component('mail::button', ['url' => env('APP_URL')])
{{ __('Login') }}
@endcomponent


@endcomponent