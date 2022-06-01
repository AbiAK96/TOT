<div class="table-responsive">
        <table class="table" id="teacher_groups-table">
			<thead>
				<tr>        
                    <th>Id</th>
                    <th>Name</th>
                    <th>View</th>
                    <th>Delete</th>
				</tr>
			</thead>
			<tbody>
				        <?php $index = 1; ?>
                    @foreach($teacher_groups as $teacher_group)
					<tr>
                        <td>{{ $teacher_group->id }}</td>
                        <td>{{ $teacher_group->name }}</td>
                        <td>
                            {!! Form::open(['route' => ['teacher_groups.target', $teacher_group->id], 'method' => 'get']) !!}
                            {!! Form::button('<i class="far fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['route' => ['teacher_groups.delete', 'id='.$teacher_group->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
					</tr>
                        
						<?php $index++ ?> 
                        @endforeach
					</tbody>
				</table>
				<br>