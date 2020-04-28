<table class="table table-bordered" id="laravel_crud">
 <thead>
    <tr>
       <th>Id</th>
       <th>Title</th>
       <th>name</th>
       <th>age</th>
       <th>Created at</th>
        
    </tr>
 </thead>
 <tbody>
  
    @foreach($data as $note)
    <tr>
       <td>{{ $note->id }}</td>
       <td>{{ $note->title }}</td>
       <td>{{ $note->name }}</td>
       <td>{{ $note->age }}</td>
       <td>{{ date('d m Y', strtotime($note->created_at)) }}</td>
         
    </tr>
    @endforeach
 </tbody>
</table>