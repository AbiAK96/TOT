<div class="table-responsive">
	<form method="post" action="{{url('selectQuestions')}}">
		{{ csrf_field() }}
		{{-- <br> --}}
        {{-- <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th> --}}
		{{-- <a style="padding-left: 30px;"></a><input class="btn btn-success" type="submit" name="submit" value="Select Questions"/> --}}
        <table class="table" id="teacher_groups-table">
			<thead>
				<tr>        
                    <th>Id</th>
                    <th>Name</th>
					
				</tr>
			</thead>
			<tbody>
				        <?php $index = 1; ?>
                    @foreach($teacher_groups as $teacher_group)
					<tr>
                        <td>{{ $teacher_group->id }}</td>
                        <td>{{ $teacher_group->name }}</td>
                        {{-- <td class="text-center"width="120">
                            {!! Form::open(['route' => ['questions.destroy', $teacher_group->id], 'method' => 'delete']) !!}
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
                        </td> --}}
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