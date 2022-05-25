<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
        <th class="text-center" style="width: 10%">School Id</th>
        <th class="text-center" style="width: 18%">Email</th>
        <th class="text-center" style="width: 20%">First Name</th>
        <th class="text-center" style="width: 20%">Last Name</th>
        <th class="text-center" style="width: 10%">Mobile</th>
        <th class="text-center" style="width: 10%">City</th>
        <th class="text-center" style="width: 5%">Zip</th>
        <th class="text-center" style="width: 10%">Role Id</th>
        <th class="text-center" style="width: 5%" colspan="3">Action</th>
        <th class="text-center" style="width: 10%">Result</th>
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
            <td>{{ $user->role_id }}</td>
                <td width="80">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}"
                           class='btn btn-success btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', [$user->id]) }}"
                           class='btn btn-warning btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                </td>
                @if($user->role_id == 3)
                <td> 
                    <a href="{{ route('results.index', [$user->id]) }}"
                        class='btn btn-info btn-xs'>
                         <i class="far fa-edit"></i>
                     </a>
                </td>
                @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
