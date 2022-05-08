@component('mail::message')
# Password Reset

Dear Sir,

If you have lost your password or wish to reset it, use the link below to get started.

@component('mail::button', ['url' => 'http://127.0.0.1:8081/auth/reset-password/?token=' . $token . '&email=' . $email])
Reset Password
@endcomponent

Thank you,<br>
Sincerely,<br>
@endcomponent
