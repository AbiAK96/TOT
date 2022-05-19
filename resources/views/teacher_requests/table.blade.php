<div class="table-responsive">
    <table class="table" id="teacher_exams-table">
        <thead>
        <tr>
        <th>Subject</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
            <td>{{ $request->subject }}</td>
            <td> @if($request->status == 1) <i class="far fa-thumbs-up"> @elseif($request->status == 0) <i class="far fa-thumbs-down">@endif </i></td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
