<!-- School Id Field -->
{{-- @if(Auth::user()->role_id == 1) --}}
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School:') !!}
    {!! Form::select('school_id', $schools,null,['class' => 'form-control']) !!}
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
{{-- 
@if(Auth::user()->role_id == 1) --}}
<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles,'0',['class' => 'form-control']) !!}
</div>
{{-- @endif --}}
<!-- Teacher Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_type_id', 'Teacher Type:') !!}
    {!! Form::select('teacher_type_id', $teacher_types,'0',['class' => 'form-control']) !!}
</div>