@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exams</h1>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="showimages"></div>
                            </div>
                            <div class="col-md-12 lg-12">
                                <div>
        
                                    <div class="card-body">

                                        <form method="post" action="{{ route('teacher_exams.store') }}" enctype="multipart/form-data">
                                            @csrf 
                                            <?php $index = 1; ?>
                                            @foreach($questions as $question)
                                            <div class="form-group">
                                                <label><input hidden type="checkbox" id="checkItem" checked></label>
                                                <label> {{ $index }}. <a class="question"> {{ $question->question }} </a></label><br>
                                                <label><input type="radio" id="checkItem" name="ids[{{$question->id}}]" value="1"> <a class="answer" onclick="return false"> {{ $question->answer_one }} </a></label><br>
                                                <label><input type="radio" id="checkItem" name="ids[{{$question->id}}]" value="2"> <a class="answer" onclick="return false"> {{ $question->answer_two }} </a></label><br>
                                                <label><input type="radio" id="checkItem" name="ids[{{$question->id}}]" value="3"> <a class="answer" onclick="return false"> {{ $question->answer_three }} </a></label><br>
                                                <label><input type="radio" id="checkItem" name="ids[{{$question->id}}]" value="4"> <a class="answer" onclick="return false"> {{ $question->answer_four }} </a></label><br>
                                                

                                            </div>
                                            <?php $index++ ?> 
                                            @endforeach  

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-footer clearfix">
                    <div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Finish</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script language="javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection

