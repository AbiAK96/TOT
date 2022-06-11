@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img style="text-align: left" src="{{ asset('img/email.png') }}" class="email_logo" alt="logo">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© Test Our Teacher {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
