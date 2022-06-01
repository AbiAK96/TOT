<div class="table-responsive">
<div class="table table-bordered">
	<form method="post" action="{{url('selectQuestions')}}">
		{{ csrf_field() }}
		<br>
        {{-- <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th> --}}
		<a style="padding-left: 30px;"></a><input class="btn btn-success" type="submit" name="submit" value="Select Questions"/>
		<br><br>
        <table class="table" id="questions-table">
			<thead>
				<tr>        
                    <th class="text-center" style="width: 1%">Id</th>
                    <th class="text-center" style="width: 3%">Type</th>
                    <th class="text-center" style="width: 50%">Question</th>
                    <th class="text-center" style="width: 10%">Answer One</th>
                    <th class="text-center" style="width: 10%">Answer Two</th>
                    <th class="text-center" style="width: 10%">Answer Three</th>
                    <th class="text-center" style="width: 10%">Answer Four</th>
                    <th class="text-center" style="width: 10%">Correct Answer</th>
                    <th class="text-center" style="width: 10%">Status</th>
                    <th class="text-center" style="width: 10%">Action</th>
                    <th class="text-center" style="width: 10%">Select </th>
					
				</tr>
			</thead>
			<tbody>
				        <?php $index = 1; ?>
                    @foreach($questions as $question)
					<tr>
                        <td class="text-center">{{ $question->id }}</td>
                        <td class="text-center">{{ $question->question_type_id }}</td>
                        <td class="text-center">{{ $question->question }}</td>
                        <td class="text-center">{{ $question->answer_one }}</td>
                        <td class="text-center">{{ $question->answer_two }}</td>
                        <td class="text-center">{{ $question->answer_three }}</td>
                        <td class="text-center">{{ $question->answer_four }}</td>
                        <td class="text-center">{{ $question->correct_answer }}</td> 
                        <td class="text-center"> @if($question->status == 1) <i class="far fa-thumbs-up"> @elseif($question->status == 0) <i class="far fa-thumbs-down">@endif </i></td>
                        <td class="text-center"width="120">
                            {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('questions.show', [$question->id]) }}"
                                   class='btn btn-default btn-sm'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('questions.edit', [$question->id]) }}"
                                   class='btn btn-primary btn-sm'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
						<td class="text-center"> @if($question->status == 0)<input name='ids[]' type="checkbox" id="checkItem" 
                         value="<?php echo $question->id; ?>">
                        </td> @endif
						</tr>
                        
						<?php $index++ ?> 
                        @endforeach
					</tbody>
				</table>
				<br>
			</form>
</div>
</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script language="javascript">
			$("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		</script>