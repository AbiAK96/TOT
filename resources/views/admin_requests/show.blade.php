@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $request->teacher }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('teacher', 'Teacher Name:') !!}
                        <p>{{ $request->teacher }}</p>
                    </div>

                    <div class="col-sm-12">
                        {!! Form::label('subject', 'Subject:') !!}
                        <p>{{ $request->subject }}</p>
                    </div>

                    <div class="col-sm-12">
                        {!! Form::label('description', 'Description:') !!}
                        <p>{{ $request->description }}</p>
                    </div>
                </div>
                <div class="card-footer clearfix">
                <div class="float-right">
                    {!! Form::open(['route' => ['admin_requests.approve', 'id='.$request->id], 'method' => 'post']) !!}
                    {!! Form::button(' Approve<i class="btn btn-primary"></i>', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}<a href="{{ route('admin_requests.index') }}" class="btn btn-default">Cancel</a>
                    {!! Form::close() !!}
                </div>
                </div>
                 
            </div>
        </div>
    </div>
@endsection
