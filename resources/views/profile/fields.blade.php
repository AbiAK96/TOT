<!-- Question Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_type_id', 'Question Type Id:') !!}
    {!! Form::select('question_type_id', $question_types,null,['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Answer One Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_one', 'Answer One:') !!}
    {!! Form::text('answer_one', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Answer Two Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_two', 'Answer Two:') !!}
    {!! Form::text('answer_two', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Answer Three Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_three', 'Answer Three:') !!}
    {!! Form::text('answer_three', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Answer Four Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_four', 'Answer Four:') !!}
    {!! Form::text('answer_four', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Correct Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correct_answer', 'Correct Answer:') !!}
    {!! Form::number('correct_answer', null,['class' => 'form-control']) !!}
</div>