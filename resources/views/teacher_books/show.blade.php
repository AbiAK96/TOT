@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('teacher_books.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
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
                </div>
                {!! Form::open(['route' => ['teacher_books.download', $book->id], 'method' => 'post']) !!}
                {!! Form::submit('Download',['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
