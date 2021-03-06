@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</section>
<div class="content px-3"> 
    <div class="row">
        @if(Auth::user()->role_id == 1)
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-success"><i class="nav-icon fa fa-school"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Schools</span>
                    <span class="info-box-number">{{$count['schools']}}</span>
                    {{-- <span class="info-box-number">{{ $model->order_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-info"><i class="nav-icon fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Teachers</span>
                    <span class="info-box-number">{{$count['teachers']}}</span>
                    {{-- <span class="info-box-number">{{ $model->product_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-danger"><i class="nav-icon fa fa-user-secret"></i></span> 
                <div class="info-box-content">
                    <span class="info-box-text">Admins</span>
                    <span class="info-box-number">{{$count['admins']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-secondary"><i class="nav-icon fa fa-book-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Books</span>
                    <span class="info-box-number">{{$count['books']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        @elseif(Auth::user()->role_id == 2)
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-info"><i class="nav-icon fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Teachers</span>
                    <span class="info-box-number">{{$count['teachers']}}</span>
                    {{-- <span class="info-box-number">{{ $model->product_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-warning"><i class="nav-icon fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Teacher Groups</span>
                    <span class="info-box-number">{{$count['teacher_groups']}}</span>
                    {{-- <span class="info-box-number">{{ $model->product_variant_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-danger"><i class="nav-icon fa fa-envelope-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Requests</span>
                    <span class="info-box-number">{{$count['requests']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-secondary"><i class="nav-icon fa fa-book-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Books</span>
                    <span class="info-box-number">{{$count['books']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        @elseif(Auth::user()->role_id == 3)
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-info"><i class="nav-icon fa fa-pen"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Upcoming Exam</span>
                    <span class="info-box-number">{{$count['upcoming_exam']}}</span>
                    {{-- <span class="info-box-number">{{ $model->product_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-secondary"><i class="nav-icon fa fa-book-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Books</span>
                    <span class="info-box-number">{{$count['books']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-danger"><i class="nav-icon fa fa-envelope-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Requests</span>
                    <span class="info-box-number">{{$count['requests']}}</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3">
            <div class="info-box" style="background-color: rgba(162,162,236,255)">
                <span class="info-box-icon bg-success"><i class="nav-icon fa fa-chart-area"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Average Result</span>
                    <span class="info-box-number">{{$count['avg_mark']}} %</span>
                    {{-- <span class="info-box-number">{{ $model->customer_count }}</span> --}}
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            @if(Auth::user()->role_id == 1)
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Recently Added</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="orderChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 444px;" width="666" height="375" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role_id == 2)
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Performance</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="orderChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 444px;" width="666" height="375" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role_id == 3)
            <div class="card card-default">
                <div class="col-sm-6">
                    <h4>Exam Results</h4>
                </div>
                <div class="table-responsive">
                    <table class="table" id="teacher_groups-table">
                        <thead>
                            <tr> 
                                <th class="text-center">#</th>       
                                <th>Question Type</th>
                                <th>Date</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php $index = 1; ?>
                                @foreach($count['results'] as $result)
                                <tr>
                                    <td class="text-center">{{ $index }}</td>
                                    <td>{{ $result->question_type }}</td>
                                    <td>{{ date('y-m-d',$result->date) }}</td>
                                    <td>{{ $result->result }}</td>
                                </tr>
                                    
                                    <?php $index++ ?> 
                                    @endforeach
                                </tbody>
                            </table>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    const ctxo = document.getElementById('orderChart');
    const orderChart = new Chart(ctxo, {
        type: 'bar',
        data: {
            datasets: [
            {
                label               : 'Orders',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',

            },
            {
                label               : 'Products',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',

            },
            {
                label               : 'Customers',
                backgroundColor     : '#00c0ef',
                borderColor         : '#00c0ef',
                pointRadius         : false,
                pointColor          : '#00c0ef',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: '#00c0ef',

            },
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
