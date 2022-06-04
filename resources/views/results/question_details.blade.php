@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Question Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">


                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                        <tr>
                        <th class="text-center" style="width: 5%">#</th>
                        <th class="text-center" style="width: 50%">Question</th>
                        <th class="text-center" style="width: 20%">Correct Answer</th>
                        <th class="text-center" style="width: 20%">Choosed Answer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($details as $detail)
                            <tr>
                            <td class="text-center">{{ $index }}</td>
                            <td class="text-center">{{ $detail->question }}</td>
                            <td class="text-center">{{ $detail->correct_answer }}</td>
                            <td class="text-center">{{ $detail->choosed_answer }}</td>
                            </tr>
                            <?php $index++ ?> 
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

