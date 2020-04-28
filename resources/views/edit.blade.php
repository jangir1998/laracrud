@extends('parent')

@section('main')


@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<div align="right">
	<a href="/index" class="btn btn-success btn-lg ">Back</a>
</div>
	
<form method="post" action="{{route('index.update',$data->id)}}" enctype="multipart/form-data">
	<h3 class="text-center" > Update Page </h3>
	<br><br>
	@csrf
	{{ method_field('POST') }}
	 

	 <div class="form-group">
	  <label class="col-md-4 text-right">Enter First Name</label>
	  <div class="col-md-8">
	   <input type="text" name="first_name" value="{{$data->first_name}}" class="form-control input-lg" />
	  </div>
	 </div>
	 <br /><br />
	 <div class="form-group">
	  <label class="col-md-4 text-right">Enter Last Name</label>
	  <div class="col-md-8">
	   <input type="text" name="last_name" value="{{$data->last_name}}" class="form-control input-lg" />
	  </div>
	 </div>
	  <br />
	  <br />
	  
	 
	 <div class="form-group">
	  <label class="col-md-4 text-right">Select Profile Image</label>
	  <div class="col-md-8">
	   <input type="file" name="image"/>
	   <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="120"/>
	   <input type="hidden" name="hidden_image" value="{{$data->image}}">
	  </div>
	 </div>

	 <br /><br /><br />
	 
	 <div class="form-group text-center">
	  <input type="submit" name="edit" class="btn btn-primary btn-lg" value="Edit " />
	 </div>
</form>
@endsection



