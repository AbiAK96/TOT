@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Groups</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <form method="post" action="{{url('admin/exams/create')}}">
                        {{ csrf_field() }}
                        <br>
                        <a style="padding-left: 30px;"></a><input class="btn btn-success" type="submit" name="submit" value="Create Exams"/><br><br>

                        <div style="padding-left: 30px;" class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}

                            {!! Form::label('start_time', 'Start Time:') !!}
                            <input type="datetime-local" id="start_time" name="start_time" class="form-control">


                            {!! Form::label('end_time', 'End Time:') !!}
                            <input type="datetime-local" id="end_time" name="end_time" class="form-control">
                        </div>
                        <br>
                        <table class="table" id="teacher_groups-table">
                            <thead>
                                <tr>        
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php $index = 1; ?>
                                    @foreach($teacher_groups as $teacher_group)
                                    <tr>
                                        <td>{{ $teacher_group->id }}</td>
                                        <td>{{ $teacher_group->name }}</td>
                                        <td class="text-center"><input name='ids[]' type="checkbox" id="checkItem" 
                                            value="<?php echo $teacher_group->id; ?>"></td>
                                           </tr>
                                        <?php $index++ ?> 
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                            </form>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script language="javascript">
                            $("#checkAll").click(function () {
                                $('input:checkbox').not(this).prop('checked', this.checked);
                            });
                        </script>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

