<div class="table-responsive">
    <table class="table" id="teacher_exams-table">
        <thead>
        <tr>
        <th>Name</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
            <td>{{ $exam->name }}</td>
            <td>{{ date('y-m-d h:m:s',$exam->start_time) }}</td>
            <td>{{ date('y-m-d h:m:s',$exam->end_time) }}</td>
            <td width="150">
                    <a class="btn btn-primary float-right"
                       href="{{ route('teacher_exams.start') }}">
                        Start Now
                    </a>
            </td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
