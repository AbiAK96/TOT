<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
        <tr>
        <th>Teacher Id</th>
        <th>School Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile Number</th>
        <th>Profile Image</th>
        <th>City</th>
        <th>Zip Code</th>
        <th>Is Activated</th>
        <th>Tfa Enabled</th>
        <th>Email Verified At</th>
        <th>Mobile Verified At</th>
        <th>Role Id</th>
        <th>Teacher Type Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->school_id }}</td>
            <td>{{ $teacher->username }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->password }}</td>
            <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->last_name }}</td>
            <td>{{ $teacher->mobile_number }}</td>
            <td>{{ $teacher->profile_image }}</td>
            <td>{{ $teacher->city }}</td>
            <td>{{ $teacher->zip_code }}</td>
            <td>{{ $teacher->is_activated }}</td>
            <td>{{ $teacher->tfa_enabled }}</td>
            <td>{{ $teacher->email_verified_at }}</td>
            <td>{{ $teacher->mobile_verified_at }}</td>
            <td>{{ $teacher->role_id }}</td>
            <td>{{ $teacher->teacher_type_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['teachers.destroy', $teacher->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('teachers.show', [$teacher->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('teachers.edit', [$teacher->id]) }}"
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
