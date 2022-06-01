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
                    <div class="card-body" style="padding-left: 38px;">
                        @include('teacher_groups.search') 
                    </div>
                    <form method="post" action="{{url('teacher_groups/store')}}">
                        {{ csrf_field() }}
                        <br>
                        <a style="padding-left: 30px;"></a><input class="btn btn-success" type="submit" name="submit" value="Create Groups"/><br><br>

                        <div style="padding-left: 30px;" class="form-group col-sm-6">
                            {!! Form::label('group_name', 'Group Name:') !!}
                            {!! Form::text('group_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>
                        <br>
                        <table class="table" id="teacher_groups-table">
                            <thead>
                                <tr>        
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php $index = 1; ?>
                                    @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->first_name }}</td>
                                        <td>{{ $teacher->last_name }}</td>
                                        <td class="text-center"><input name='ids[]' type="checkbox" id="checkItem" 
                                            value="<?php echo $teacher->id; ?>"></td>
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

