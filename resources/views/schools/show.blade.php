@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('schools.index') }}">
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
                    @include('schools.show_fields')
                </div>
            </div>
        </div>

                <div class="card">
                    <div class="table-responsive">
                        <table class="table" id="users-table">
                            <thead>
                            <tr>
                                <th>School Id</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile Number</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Tfa Enabled</th>
                            <th>Role Id</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->school_id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->mobile_number }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->zip_code }}</td>
                                <td>{{ $user->tfa_enabled }}</td>
                                <td>{{ $user->role_id }}</td>
                                    <td width="120">
                                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            <a href="{{ route('users.show', [$user->id]) }}"
                                               class='btn btn-default btn-xs'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('users.edit', [$user->id]) }}"
                                               class='btn btn-default btn-xs'>
                                                <i class="far fa-edit"></i>
                                            </a>
                                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
@endsection
