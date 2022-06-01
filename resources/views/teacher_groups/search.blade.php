
<div class="row">
    <form action="{{ route('tearcher_group.search') }}" method="GET">
        @csrf
        <div class="input-group input-group-md">
            <select class="form-control"  name="teacher_type_id">
                <option value="option_select" disabled selected>Default</option>
                @foreach($teacher_types as $teacher_type)
                    <option value="{{ $teacher_type->id }}">{{ $teacher_type->name}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-md btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>