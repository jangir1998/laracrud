@extends('website.main.master')

@section('title','Student List')

@section('body')
	<div class="container">
		<div class="row mb-3">
			<div class="col-lg-6">
				<button class="btn btn-primary btn-lg">Student List</button>
			</div>
			<div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
				<a href="/student/create" class="btn btn-outline-light btn-lg">+ Add New Student</a>
			</div>
		</div>
		{{-- success msg --}}

		@if(session()->has('message'))
		    <div class="alert alert-success">
		        {{ session()->get('message') }}
		    </div>
		@endif

		{{-- end msg  --}}

		{{-- this is a table portion  --}}
		<table class="table table-bordered text-white bg-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($std as $student)
                	<tr>
                	<td>{{$student->id}}</td>
                	<td>{{$student->name}}</td>
                	<td>{{$student->email}}</td>
                	<td>{{$student->address}}</td>
                	<td>
                		{{--show button start --}}
                		<a href="/student/show/{{$student->id}}" class="btn btn-primary">Show</a>
                		{{--end show button --}}
                	</td>
                	<td>
                		<a href="#" class="btn btn-success">Edit</a>
                	</td>
                	<td>
                		<a href="#" class="btn btn-danger">Delete</a>
                	</td>
                </tr>
                @endforeach
              
            </tbody>
        </table>
        {{-- end table --}}
        <div class="d-flex justify-content-center align-items-center">
        	<div>{{$std->links()}} </div>
        </div>

	</div>

@endsection