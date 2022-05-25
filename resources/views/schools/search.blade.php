
<div class="row">
    <form action="{{ route('schools.search') }}" method="GET">
        @csrf
        <div class="input-group input-group-md">
            <input name="school_name" type="search" class="form-control" placeholder="School Name">
            <input name="school_domain" type="search" class="form-control" placeholder="School Domain">
            <div class="input-group-append">
                <button type="submit" class="btn btn-md btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>