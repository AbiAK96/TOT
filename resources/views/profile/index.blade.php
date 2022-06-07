@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('profile.edit') }}">
                        Edit Profile
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
                            <a>  <br>&emsp; </a>
                            <div class="col-lg-12 mb-4 mb-sm-5">
                                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                @if($teacher->profile_image == null)
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                                @else()
                                                <a style="padding-left: 30px;"></a><img src="{{$teacher->profile_image}}" alt="..." class="avatar img-circle img-thumbnail">
                                                @endif
                                                
                                            </div>
                                            <div class="col-lg-6 px-xl-10">
                                                <div>
                                                    <h3>{{$teacher->first_name .' '.$teacher->last_name}}</h3>
                                                </div>
                                                <ul class="list-unstyled mb-1-9">
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">First Name:</span> {{$teacher->first_name}}</li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Last Name:</span> {{$teacher->last_name}}</li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Position:</span> {{$teacher->role}}</li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">School:</span> {{$teacher->school}}</li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$teacher->email}}</li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> {{$teacher->mobile_number}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="float-right">
                                            <a class="btn btn-warning" style="float: left"
                                            href="{{ route('profile.password-show') }}">
                                             Change Password
                                         </a>
                                        </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-4 mb-sm-5">
                                <div>
                                    <span class="section-title text-primary mb-3 mb-sm-4">About Me</span>
                                    <p>Edith is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
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
                            </div> --}}
                        </div>
                    </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

