<div class="table-responsive">
    <table class="table" id="books-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
            <td>{{ $book->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('books.show', [$book->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('books.edit', [$book->id]) }}"
                           class='btn btn-default btn-sm'>
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
