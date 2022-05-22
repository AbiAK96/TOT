<div class="table-responsive">
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
                            <a href= "{{ route('selected_Questions.remove' , [$selected_question->id]) }}"  class="button btn-sm btn-warning" id="disable">                        
                                <i class="far fa-thumbs-down"></i>
                            </a>
                        </td>
						</tr>
                        
						<?php $index++ ?> 
                        @endforeach
					</tbody>
				</table>