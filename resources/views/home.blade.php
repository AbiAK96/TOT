@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Auth::user()->role_id == 1)
        Super Admin
        @elseif(Auth::user()->role_id == 3)
        Teacher
        @endif  
    </div>
</div>
@endsection
