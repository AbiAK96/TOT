<div class="table-responsive">
    <table class="table" id="questions-table">
        <thead>
        <tr>
            <th>Question Type Id</th>
        <th>Question</th>
        <th>Answer One</th>
        <th>Answer Two</th>
        <th>Answer Three</th>
        <th>Answer Four</th>
        <th>Correct Answer</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->question_type_id }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ $question->answer_one }}</td>
            <td>{{ $question->answer_two }}</td>
            <td>{{ $question->answer_three }}</td>
            <td>{{ $question->answer_four }}</td>
            <td>{{ $question->correct_answer }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questions.show', [$question->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questions.edit', [$question->id]) }}"
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
