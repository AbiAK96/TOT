@component('mail::message')
# Email Confirmation

Dear <strong>@php echo $first_name @endphp</strong>,<br>


You have Registerd to TOT account. Please click on the button below to verify your email address and complete your registration.
<br>
Email : {{ $email }} <br>
Password : {{ $password }}<br>
<br>
@component('mail::button', ['url' => 'http://127.0.0.1:8081/auth/email-verification/?token=' . $token . '&email=' . $email])
Verify Now
@endcomponent
Thank you,<br>
Sincerely,<br>
@endcomponent
