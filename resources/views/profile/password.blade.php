@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Password</h1>
                </div>
            </div>
        </div>
    </section>
    @include('flash::message')
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form method="post" action="{{ route('profile.password-update') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputPassword1">Current Password</label>
                          <input type="password" class="form-control" name="current_password" id="myInput1" placeholder="Enter Your Current Password"> <input type="checkbox" onclick="myFunction1()"> Show Password
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="myInput2" placeholder="Enter Your New Password"> <input type="checkbox" onclick="myFunction2()"> Show Password <br>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="myInput3" placeholder="Confirm Your Current Password"> <input type="checkbox" onclick="myFunction3()"> Show Password <br>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
                
<script>
    function myFunction1() {
      var x = document.getElementById("myInput1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction2() {
      var x = document.getElementById("myInput2");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction3() {
      var x = document.getElementById("myInput3");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
            </div>
        </div>
    </div>
@endsection
