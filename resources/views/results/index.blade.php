@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><h1>{{$user->first_name .' '. $user->last_name}}'s Results</h1></h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('users.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a style="padding-left: 30px;"></a>
                            <div class="panel panel-default">
                                  <div class="col-lg-8" style="padding-left: 150px;">
                                    @if($chart->labels != null)
                                        <canvas id="userChart"></canvas>
                                    @else
                                    <div class="alert alert-primary" role="alert"> 
                                        Results not found
                                      </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 mb-4 mb-sm-5">
                                    <div>
                                        <span class="section-title text-primary mb-3 mb-sm-4">                <div class="col-sm-6">
                                            <h1><h1>Results</h1></h1>
                                        </div></span>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                <th class="text-center" style="width: 5%">#</th>
                                                <th class="text-center" style="width: 5%">Date</th>
                                                <th class="text-center" style="width: 5%">Result</th>
                                                <th class="text-center" style="width: 5%">Exam Type</th>
                                                <th class="text-center" style="width: 5%">Question Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 1; ?>
                                                @foreach($teacher_results as $teacher_result)
                                                    <tr>
                                                    <td class="text-center">{{ $index }}</td>
                                                    <td class="text-center">{{ date('y-m-d',$teacher_result->date) }}</td>
                                                    <td class="text-center">{{ $teacher_result->result.'%' }}</td>
                                                    <td class="text-center">{{ $teacher_result->question_type }}</td>
                                                    <td class="text-center">
                                                        {!! Form::open(['route' => ['results.question_details', $teacher_result->id], 'method' => 'get']) !!}
                                                        {!! Form::button('<i class="far fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm']) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                    </tr>
                                                    <?php $index++ ?> 
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4 mb-sm-5">
                                    <div>
                                        <span class="section-title text-primary mb-3 mb-sm-4">                <div class="col-sm-6">
                                            <h1><h1>Book Details</h1></h1>
                                        </div></span>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                <th class="text-center" style="width: 5%">#</th>
                                                <th class="text-center" style="width: 5%">Book Name</th>
                                                <th class="text-center" style="width: 5%">Download Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 1; ?>
                                                @foreach($books as $book)
                                                    <tr>
                                                    <td class="text-center">{{ $index }}</td>
                                                    <td class="text-center">{{ $book->name }}</td>
                                                    <td class="text-center">{{ date('y-m-d',$book->date) }}</td>
                                                    </tr>
                                                    <?php $index++ ?> 
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 mb-sm-5">
                                            <div class="mb-4 mb-sm-5">
                                                <span class="section-title text-primary mb-3 mb-sm-4">Skill</span>
                                                <div class="progress-text">
                                                    <div class="row">
                                                        <div class="col-6">Driving range</div>
                                                        <div class="col-6 text-end">80%</div>
                                                    </div>
                                                </div>
                                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                                </div>
                                                <div class="progress-text">
                                                    <div class="row">
                                                        <div class="col-6">Short Game</div>
                                                        <div class="col-6 text-end">90%</div>
                                                    </div>
                                                </div>
                                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                                </div>
                                                <div class="progress-text">
                                                    <div class="row">
                                                        <div class="col-6">Side Bets</div>
                                                        <div class="col-6 text-end">50%</div>
                                                    </div>
                                                </div>
                                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                                </div>
                                                <div class="progress-text">
                                                    <div class="row">
                                                        <div class="col-6">Putting</div>
                                                        <div class="col-6 text-end">60%</div>
                                                    </div>
                                                </div>
                                                <div class="custom-progress progress progress-medium" style="height: 4px;">
                                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="section-title text-primary mb-3 mb-sm-4">Education</span>
                                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                                                <p class="mb-1-9">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
              <!-- CHARTS -->
              <script>
                  var ctx = document.getElementById('userChart').getContext('2d');
                  var chart = new Chart(ctx, {
                      // The type of chart we want to create
                      type: 'bar',
              // The data for our dataset
                      data: {
                          labels:  {!!json_encode($chart->labels)!!} ,
                          datasets: [
                              {
                                  label: '',
                                  backgroundColor: {!! json_encode($chart->colours)!!} ,
                                  data:  {!! json_encode($chart->dataset)!!} ,
                              },
                          ]
                      },
              // Configuration options go here
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true,
                                      callback: function(value) {if (value % 1 === 0) {return value;}}
                                  },
                                  scaleLabel: {
                                      display: false
                                  }
                              }]
                          },
                          legend: {
                              labels: {
                                  // This more specific font property overrides the global property
                                  fontColor: '#122C4B',
                                  fontFamily: "'Muli', sans-serif",
                                  padding: 25,
                                  boxWidth: 0,
                                  fontSize: 14,
                              }
                          },
                          layout: {
                              padding: {
                                  left: 10,
                                  right: 10,
                                  top: 0,
                                  bottom: 10
                              }
                          }
                      }
                  });
              </script>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

