<!-- Question Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('question_type_id', 'Question Type Id:') !!}
    <p>{{ $question->question_type_id }}</p>
</div>

<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>

<!-- Answer One Field -->
<div class="col-sm-12">
    {!! Form::label('answer_one', 'Answer One:') !!}
    <p>{{ $question->answer_one }}</p>
</div>

<!-- Answer Two Field -->
<div class="col-sm-12">
    {!! Form::label('answer_two', 'Answer Two:') !!}
    <p>{{ $question->answer_two }}</p>
</div>

<!-- Answer Three Field -->
<div class="col-sm-12">
    {!! Form::label('answer_three', 'Answer Three:') !!}
    <p>{{ $question->answer_three }}</p>
</div>

<!-- Answer Four Field -->
<div class="col-sm-12">
    {!! Form::label('answer_four', 'Answer Four:') !!}
    <p>{{ $question->answer_four }}</p>
</div>

<!-- Correct Answer Field -->
<div class="col-sm-12">
    {!! Form::label('correct_answer', 'Correct Answer:') !!}
    <p>{{ $question->correct_answer }}</p>
</div>

