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
                <td>
                    {!! Form::open(['route' => ['teacher_books.show', $book->id], 'method' => 'get']) !!}
                    {!! Form::button('<i class="far fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
