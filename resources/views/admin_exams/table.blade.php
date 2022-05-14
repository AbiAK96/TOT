<div class="table-responsive">
    <table class="table" id="schools-table">
        <thead>
        <tr>
        <th>ID</th>    
        <th>Name</th>
        <th>Teacher Group</th>
        <th>Start Time</th>
        <th>End Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
            <td>{{ $exam->id }}</td>
            <td>{{ $exam->name }}</td>
            <td>{{ str_replace('"', '', $exam->teacher_groups); }}</td>
            <td>{{ date('y-m-d h:m:s',$exam->start_time) }}</td>
            <td>{{ date('y-m-d h:m:s',$exam->end_time) }}</td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
