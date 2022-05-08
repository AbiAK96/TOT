<div class="table-responsive">
	<form method="post" action="{{url('selectedquestionsdeleteAll')}}">
		{{ csrf_field() }}
		<br>
        {{-- <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th> --}}
		<a style="padding-left: 30px;"></a><input class="btn btn-danger" type="submit" name="submit" value="Delete All Selected Questions"/>
		<br><br>
        <table class="table" id="selected_questions-table">
			<thead>
				<tr>        
                    <th>Id</th>
                    <th>Question Type Id</th>
                    <th>Question</th>
                    <th>Answer One</th>
                    <th>Answer Two</th>
                    <th>Answer Three</th>
                    <th>Answer Four</th>
                    <th>Correct Answer</th>
                    <th colspan="3">Action</th>
                    <th>Select </th>
					
				</tr>
			</thead>
			<tbody>
				        <?php $index = 1; ?>
                    @foreach($selected_questions as $selected_question)
					<tr>
                        <td class="text-center">{{ $selected_question->id }}</td>
                        <td class="text-center">{{ $selected_question->question_type_id }}</td>
                        <td class="text-center">{{ $selected_question->question }}</td>
                        <td class="text-center">{{ $selected_question->answer_one }}</td>
                        <td class="text-center">{{ $selected_question->answer_two }}</td>
                        <td class="text-center">{{ $selected_question->answer_three }}</td>
                        <td class="text-center">{{ $selected_question->answer_four }}</td>
                        <td class="text-center">{{ $selected_question->correct_answer }}</td>
                        <td class="text-center"width="120">
                            {!! Form::open(['route' => ['selected_question.destroy', $selected_question->id], 'method' => 'post']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                        </td>
						<td class="text-center"><input name='ids[]' type="checkbox" id="checkItem" 
                         value="<?php echo $selected_question->id; ?>"></td>
						</tr>
                        
						<?php $index++ ?> 
                        @endforeach
					</tbody>
				</table>
				<br>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script language="javascript">
			$("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		</script>