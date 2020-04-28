@extends('website.main.master')

@section('title','Add new Student')

@section('body')
    <div class="container">
     <a href="/student" class="btn btn-outline-warning btn-lg">Back To Student List</a>

     {{--error sms--}}
     	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
     {{--end error sms--}}
    

        <form action="{{url('student/store')}} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            	<br>
              <label for="">UserName :</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter your name" value="{{old('name')}}" >
            </div>
            <div class="form-group">
              <label for="">Email :</label>
              <input type="text" name="email" id="" class="form-control" placeholder="Enter your email" value="{{old('email')}}" >
            </div>
            <div class="form-group">
              <label for="">Address :</label>
              <input type="text" name="address" id="" class="form-control" placeholder="Enter your Address" value="{{old('address')}}" >   
            </div>
          
            <br>
            <input type="submit" value="Submit Form" class="btn btn-info btn-lg">

        </form>
    </div>
@endsection