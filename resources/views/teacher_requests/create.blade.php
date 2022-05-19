@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Make Request</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <div class="table-responsive">
                <form method="post" action="{{url('teacher/request/make')}}">
                    {{ csrf_field() }}
                    <br>
                    <div style="padding-left: 30px;" class="form-group col-sm-6">
                        {!! Form::label('subject', 'Subject:') !!}
                        {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                    <br>
                    <div style="padding-left: 30px;" class="form-group col-sm-6">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                            <br>

            <div class="card-footer clearfix">
                <div class="float-right">
                    
                </div>
            </div>
        </div>

            <div class="card-footer">
            <input class="btn btn-primary" type="submit" name="submit" value="Make Request"/>
                <a style="padding-left: 10px;"> </a><a href="{{ route('teacher_requests.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
    </div>
@endsection
