
<div class="row">
    <form action="{{ route('questions.search') }}" method="GET">
        @csrf
        <div class="input-group input-group-md">
            <input name="question" type="search" class="form-control" placeholder="Question">
            <div class="input-group-append">
                <button type="submit" class="btn btn-md btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>