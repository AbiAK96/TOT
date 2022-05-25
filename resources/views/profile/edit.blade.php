@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <div class="container bootstrap snippets bootdey">
                  <hr>
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-3">
                    <div class="text-center">
                        @if($teacher->profile_image == null)
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">

                        @else()
                        <a> </a><img src="{{$teacher->profile_image}}" alt="..." class="avatar img-circle img-thumbnail">
                        @endif
                      <h6>Upload a different photo...</h6>
                      <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                      <input type="file" class="form-control" name="profile_image">
                        </div>
                    </div>
                  </div>
                  
                  <!-- edit form column -->
                  <div class="col-md-9 personal-info">

                    <h3>Personal info</h3>
                    
                    <div class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{$teacher->first_name}}" name="first_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{$teacher->last_name}}" name="last_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile Number:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{$teacher->mobile_number}}" name="mobile_number">
                        </div>
                      </div>
                    
                  </div>
              </div>
            </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
                <a href="{{ route('profile.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
            
        </div>
    </div>
@endsection
