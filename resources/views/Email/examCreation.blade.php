@component('mail::message')
# Exam Confirmation

Dear <strong> {{$teacher->first_name}}</strong>,<br>

You have exam has been sechduled.
<br>
Exam Subject : {{ $model->name }} <br>
Exam Date : {{ $model->start_time }}<br>
<br>

@endcomponent
