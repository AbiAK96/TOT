<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textArea('description', null, ['class' => 'form-control','maxlength' => 2505,'maxlength' => 2500]) !!}
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    <br>
    {!! Form::file('file', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Src Field -->
<div class="form-group col-sm-6">
    {!! Form::label('src', 'Src:') !!}
    <br>
    {!! Form::file('src', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>