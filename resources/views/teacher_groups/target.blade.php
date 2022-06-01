@extends('layouts.app')

@section('content')
    <section class="content-header"> 
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$teacher_group->name}}</h1>
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
                    <table class="table" id="teacher_groups-table">
                        <thead>
                            <tr>        
                                <th>Id</th>
                                <th>Teacher ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php $index = 1; ?>
                                @foreach($targets as $target)
                                <tr>
                                    <td>{{ $target->id }}</td>
                                    <td>{{ $target->teacher_id }}</td>
                                    <td>{{ $target->first_name }}</td>
                                    <td>{{ $target->last_name }}</td>
                                </tr>
                                    
                                    <?php $index++ ?> 
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        <a href="{{ route('teacher_groups.index') }}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

