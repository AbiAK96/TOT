@component('mail::message')

Dear <strong>@php echo $first_name @endphp</strong>,<br>

Thank you for choosing <strong>{{ config('app.name') }}</strong>, click the below button to launch a campaign and start testing your users today. 

@component('mail::button', ['url' => config('services.frontend_base_url') .'/auth/login'])
Click here
@endcomponent

Thank you,<br>
Sincerely,<br>
TMU Support Team
@endcomponent
