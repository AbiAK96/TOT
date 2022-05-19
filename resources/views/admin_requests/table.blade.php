<div class="table-responsive">
    <table class="table" id="admin_requests-table">
        <thead>
        <tr>
        <th>Teacher</th>
        <th>Subject</th>
        <th>Status</th>
        <th>View</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
            <td>{{ $request->teacher->first_name .' '.$request->teacher->last_name }}</td> 
            <td>{{ $request->subject }}</td>
            <td> @if($request->status == 1) <i class="far fa-thumbs-up"> @elseif($request->status == 0) <i class="far fa-thumbs-down">@endif </i></td>
            <td>
            {!! Form::open(['route' => ['admin_requests.show', 'id='.$request->id], 'method' => 'post']) !!}
            {!! Form::button('<i class="far fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm']) !!}
            {!! Form::close() !!}
            </td>
            <td class="text-center"width="220">
            @if($request->status == 1)
            {!! Form::open(['route' => ['admin_requests.approve', 'id='.$request->id], 'method' => 'post']) !!}
            {!! Form::button('<i class="far fa-thumbs-up"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm' ,'hidden']) !!}
            {!! Form::close() !!}
            @elseif($request->status == 0)
            <div class='btn-group'>
            {!! Form::open(['route' => ['admin_requests.approve', 'id='.$request->id], 'method' => 'post']) !!}
            {!! Form::button('<i class="far fa-thumbs-up"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
            </div>
            @endif    
            </td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
