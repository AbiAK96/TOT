
<div class="row">
    <form action="{{ route('users.search') }}" method="GET">
        @csrf
        <div class="input-group input-group-md">
            <input name="email" type="search" class="form-control" placeholder="Email">
            <input name="first_name" type="search" class="form-control" placeholder="First Name">
            @if(Auth::user()->role_id == 1)
            <select class="form-control"  name="school_id">
                <option value="option_select" disabled selected>Schools</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}">
                        {{ $school->school_name}}</option>
                @endforeach
            </select>
            @endif
            <div class="input-group-append">
                <button type="submit" class="btn btn-md btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>