@extends('app')

@section('content')
<script src="{{asset('assets/staffJS/staff.js')}}"></script>

<div class="container">
    <nav class="sub-navbar ">
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li id="staff"><a href="javascript:getStaffDetails()">Staff Details</a></li>
            <li><a href="{{ url('/studentDetails') }}">Student Details</a></li>
        </ul>
    </nav>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    You are logged in!
                  <h1><centre><bold>welcome to school management system</bold></centre></h1>
                    <h3><centre>Popular gloryland School</centre></h3>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
