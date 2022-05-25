<div class="table-responsive">
    <table class="table" id="schools-table">
        <thead>
        <tr>
            <th>School Name</th>
        <th>School Domain</th>
        <th>School Address</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schools as $school)
            <tr>
                <td>{{ $school->school_name }}</td>
            <td>{{ $school->school_domain }}</td>
            <td>{{ $school->school_address }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['schools.destroy', $school->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('schools.show', [$school->id]) }}"
                           class='btn btn-success btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('schools.edit', [$school->id]) }}"
                           class='btn btn-warning btn-xs'>
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
