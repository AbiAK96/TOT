<!-- Account Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School:') !!}
    {{-- {!! Form::number('school_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('school_id', $schools,'0',['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mobile Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_number', 'Mobile Number:') !!}
    {!! Form::text('mobile_number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Profile Image Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('profile_image', 'Profile Image:') !!}
    {!! Form::text('profile_image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> --}}

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Zip Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip_code', 'Zip Code:') !!}
    {!! Form::number('zip_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Activated Field -->
{{-- <div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_activated', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_activated', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_activated', 'Is Activated', ['class' => 'form-check-label']) !!}
    </div>
</div> --}}


<!-- Tfa Enabled Field -->
{{-- <div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('tfa_enabled', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('tfa_enabled', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('tfa_enabled', 'Tfa Enabled', ['class' => 'form-check-label']) !!}
    </div>
</div> --}}


<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::number('email_verified_at', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Mobile Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('mobile_verified_at', 'Mobile Verified At:') !!}
    {!! Form::number('mobile_verified_at', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
    {{-- {!! Form::number('role_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('role_id', $roles,'0',['class' => 'form-control']) !!}
</div>

<!-- Teacher Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_type_id', 'Teacher Type:') !!}
    {{-- {!! Form::number('teacher_type_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('teacher_type_id', $teacher_types,'0',['class' => 'form-control']) !!}
</div>