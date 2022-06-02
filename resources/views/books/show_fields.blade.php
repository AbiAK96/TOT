<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $book->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $book->description }}</p>
</div>

<!-- Src Field -->
<div class="col-sm-12">
    {!! Form::label('src', 'Src:') !!}
    <p><img src="{{ $book->src }}" class="img-thumbnail" alt="..."></p> 
</div>

