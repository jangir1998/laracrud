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

<form method="post" action="{{route('create.store')}}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Enter First Name:</label>
  <div class="col-md-8">
   <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Enter Last Name:</label>
  <div class="col-md-8">
   <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control input-lg" />
  </div>
 </div>
  <br />
  <br />

 <div class="form-group">
  <label class="col-md-4 text-right">Select File Name:</label>
  <div class="col-md-8">
   <input type="file" name="image[]" multiple/>
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary btn-lg" value="Submit " />
 </div>
</form>
@endsection
