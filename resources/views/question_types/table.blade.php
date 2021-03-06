<div class="table-responsive">
    <table class="table table-bordered" id="questionTypes-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questionTypes as $questionTypes)
            <tr>
                <td>{{ $questionTypes->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questionTypes.destroy', $questionTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionTypes.show', [$questionTypes->id]) }}"
                           class='btn btn-success btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questionTypes.edit', [$questionTypes->id]) }}"
                           class='btn btn-warning btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
