@extends('parent')
@section('title','index page')

@section('main')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  <div class="row">
    <div class="pull-right">
      <a href="/index/create" class="btn btn-success btn-lg " >Add data</a>
    </div>
    <div class="pull-left">
      <a href="{{ url('pdf') }}" class="btn btn-success mb-2">Create PDF</a>
    </div>
  </div>
    <br/>
  <table class="table table-bordered table-striped">
   <tr>
      <th>Id</th>
      <th >Image</th>
      <th >First Name</th>
      <th >Last Name</th>
      <th >Action</th>
      <th >Delete</th>

   </tr>
   @foreach($data as $row)
    <tr>
        <td>{{ $row->id }}</td>
         <td>
          <img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" />
         </td>
         <td>{{ $row->first_name }}</td>
         <td>{{ $row->last_name }}</td>
         <td>
          <a href="{{route('index.show',$row->id)}}" class="btn btn-primary">show</a>
          <a href="{{route('index.edit',$row->id)}}" class="btn btn-warning">edit</a>
          <a href="{{route('index.zip',$row->id)}}" class="btn btn-success">Zip</a>
          <td>
          <form action="{{route('index.destroy',$row->id)}}" method="post">
            @csrf
            @method('DELETE')
            {{ method_field('get')}}
            <button type="submit" class="btn btn-danger" >Delete</button>
          </form>
          
          </td>
       </td>
    </tr>
   @endforeach
  </table>
  <div class="d-flex col text-center align-items-center">
        <div>{{$data->links()}} </div>
  </div>

@endsection