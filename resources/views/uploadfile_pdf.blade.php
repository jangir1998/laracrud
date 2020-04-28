@extends('parent')
@section('title','index page')
@section('main')
  <table class="table table-bordered table-striped">
   <tr>
      <th>Id</th>
      <th >Image</th>
      <th >First Name</th>
      <th >Last Name</th>
   </tr>
  
    <tr>
        <td>{{ $data->id }}</td>
         <td>
          <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="75" />
         </td>
         <td>{{ $data->first_name }}</td>
         <td>{{ $data->last_name }}</td>
    </tr>
  
  </table>
@endsection