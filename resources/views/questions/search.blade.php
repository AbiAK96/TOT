
<div class="row">
    <form action="{{ route('questions.search') }}" method="GET">
        @csrf
        <div class="input-group input-group-md">
            <select class="form-control"  name="question_type_id">
                <option value="option_select" disabled></option>
                @foreach($question_types as $question_type)
                    <option value="{{ $question_type->id }}">{{ $question_type->name}}</option>
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